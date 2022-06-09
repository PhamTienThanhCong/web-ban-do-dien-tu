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
function totalValue($table){
    global $conn;
    $query= "SELECT COUNT(*) as `all` FROM $table";
    return mysqli_query($conn, $query)['all'];
}
function getAllUsers($page){
    global $conn;
    // die(totalValue('user'));
    $query= "SELECT `users`.* , COUNT(`orders`.`id`) as `total_buy` FROM `users` 
            LEFT JOIN `orders` on `users`.`id` = `orders`.`user_id`
            GROUP BY `users`.`id`";
    die($query);
    return $query_run= mysqli_query($conn, $query);
}
function redirect($url, $message)
 {
     $_SESSION['message']= $message;
     header('Location:'.$url);
     exit();
 }



?>