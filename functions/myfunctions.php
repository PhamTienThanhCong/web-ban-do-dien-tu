<?php
include("../config/dbcon.php");
function getAll($table)
{
    global $conn;
    $query= "SELECT * FROM $table";
    return $query_run= mysqli_query($conn, $query);
}
function getByID($table,$id)
{
    global $conn;
    $query= "SELECT * FROM $table WHERE id='$id'";
    return $query_run= mysqli_query($conn, $query);
}

function totalValue($table){
    global $conn;
    $query= "SELECT COUNT(*) as `number` FROM $table";
    $totalValue = mysqli_query($conn, $query);
    $totalValue = mysqli_fetch_array($totalValue);
    return $totalValue['number'];
}
function getAllUsers($page = 0){
    global $conn;
    $query= "SELECT `users`.*, COUNT(`orders`.`id`) AS `total_buy` FROM `users`
            LEFT JOIN `orders` ON `users`.`id` = `orders`.`user_id`
            GROUP BY `users`.`id`
            ORDER BY `users`.`creat_at` DESC";
    return $query_run= mysqli_query($conn, $query);
}

function redirect($url, $message)
{
    $_SESSION['message']= $message;
    header("Location:" . $url);
    exit();
}
?>