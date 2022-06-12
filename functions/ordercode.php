<?php
session_start();
include("../config/dbcon.php");
include("../functions/myfunctions.php");

if (isset($_POST['order'])){
    $user_id    = $_SESSION['auth_user']['id'];
    $product_id = $_POST['product_id'];
    $quantity   = $_POST['quantity'];

    $product = getByID("products",$product_id);
    if(mysqli_num_rows($product) >0){
        $product = mysqli_fetch_array($product);
        $slug    = $product['slug'];
        if ($quantity != "" && $quantity <= $product['qty']){
            $selling_price  = $product['selling_price'];
            $insert_query   = "INSERT INTO order_detail (`user_id`, `product_id`, `selling_price`, `quantity`) VALUES ('$user_id','$product_id','$selling_price','$quantity')";
            $insert_query_run=mysqli_query($conn,$insert_query);
            if($insert_query_run){
                $_SESSION['message']="Thêm vào giỏ hàng thành công";
                header("Location: ../product-detail.php?slug=$slug");
            }
        }else{
            $_SESSION['message']="Số lượng sản phẩm không phù hợp";
            header("Location: ../product-detail.php?slug=$slug");
        }
    }else{
        $_SESSION['message']="Đã xảy ra lỗi không đáng có";
        header("Location: ../products.php");
    }    
}else if (isset($_GET['deleteID'])){
    $user_id    = $_SESSION['auth_user']['id'];
    $order_id   = $_GET['deleteID'];
    $query =    "DELETE FROM `order_detail` 
                WHERE `id` = '$order_id' AND `user_id` = '$user_id'";
    mysqli_query($conn, $query);
    $_SESSION['message']="Xóa sản phẩm thành công";
    header("Location: ../cart.php");
}else if (isset($_POST['update_product'])){
    $user_id    = $_SESSION['auth_user']['id'];
    $product_id = $_POST['product_id'];
    $quantity   = $_POST['quantity'];
    $query =    "UPDATE `order_detail` SET `quantity` = $quantity 
                WHERE `product_id` = '$product_id' AND `user_id` = '$user_id' AND `status` = '1'";
    mysqli_query($conn, $query);
    $_SESSION['message']="Cập nhập sản phẩm thành công";
    header("Location: ../cart.php");
}else if (isset($_POST['buy_product'])){
    $user_id    = $_SESSION['auth_user']['id'];

    $insert_query       = "INSERT INTO `orders`(`user_id`) VALUES ('$user_id')";

    $insert_query_run   = mysqli_query($conn, $insert_query);

    $order_id           = $conn->insert_id;

    $query =    "UPDATE `order_detail` SET `status` = '2', `order_id` = '$order_id'
                WHERE `user_id` = '$user_id' AND `status` = '1'";
    mysqli_query($conn, $query);
    $_SESSION['message']="Mua sản phẩm thành công";
    header("Location: ../cart-status.php");
}else if(isset($_POST['rate'])){
    $user_id    = $_SESSION['auth_user']['id'];
    $id         = $_POST['id'];
    $rate       = $_POST['rating'];
    $comment    = $_POST['comment'];

    $query =    "UPDATE `order_detail` SET `rate` = '$rate', `comment` = '$comment'
                WHERE `id` = '$id' AND `user_id` = '$user_id' AND `status` = '4'";
    mysqli_query($conn, $query);

    $_SESSION['message']="Đánh giá sản phẩm thành công";
    header("Location: ../cart-status.php");
}

?>