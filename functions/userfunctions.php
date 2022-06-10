<?php
include("./config/dbcon.php");

function getAllActive($table)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE status='0'";
    return $query_run= mysqli_query($conn, $query);
}
function getIDActive($table,$id)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE id='$id' AND status='0'";
    return $query_run= mysqli_query($conn, $query);
}
function getByID($table,$id)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE id='$id'";
    return $query_run= mysqli_query($conn, $query);
}
function getAll($table)
{
    global $conn;
    $query= "SELECT * FROM $table";
    return $query_run= mysqli_query($conn, $query);
}
function getBySlug($table,$slug)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE slug='$slug'";
    return $query_run= mysqli_query($conn, $query);
}
function totalValue($table){
    global $conn;
    $query= "SELECT COUNT(*) as `number` FROM $table";
    $totalValue = mysqli_query($conn, $query);
    $totalValue = mysqli_fetch_array($totalValue);
    return $totalValue['number'];
}
function getBestSelling($numberGet){
    global $conn;
    $query =    "SELECT `products`.*, COUNT(`orders`.id) as total_buy FROM `products` 
                LEFT JOIN `orders` ON `products`.`id` = `orders`.`product_id`
                GROUP BY `products`.`id`
                ORDER BY `total_buy` DESC
                LIMIT $numberGet";
    return mysqli_query($conn, $query);
}
function getLatestProducts($numberGet,$page = 0,$type = "",$search=""){
    global $conn;
    $page_extra = $numberGet * $page;

    if ($type != ""){
        $categoryId     = getBySlug("categories", $type);
        $categoryId     = mysqli_fetch_array($categoryId)['id'];
        $query =    "SELECT * FROM `products` 
                WHERE `name` LIKE '%$search%' AND `category_id` = '$categoryId'
                ORDER BY `id` DESC 
                LIMIT $numberGet OFFSET $page_extra";
    }else{
        $query =    "SELECT * FROM `products` 
                WHERE `name` LIKE '%$search%'
                ORDER BY `id` DESC 
                LIMIT $numberGet OFFSET $page_extra";
    }
    
    return mysqli_query($conn, $query);
}
function getBlogs($page, $keyWold){
    global $conn;
    $page_extra = 10 * $page;
    $query =    "SELECT * FROM `blog` 
                WHERE `title` LIKE '%$keyWold%'
                ORDER BY `id` DESC
                LIMIT 10 OFFSET $page_extra";
    return mysqli_query($conn, $query);
}
function redirect($url, $message)
 {
     $_SESSION['message']= $message;
     header('Location:'.$url);
     exit();
 }



?>