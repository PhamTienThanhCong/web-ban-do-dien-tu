<?php
session_start();
include("./functions/userfunctions.php");
$search =   "";
$page   =   1;
$type   =   "";

if (isset($_GET["search"])){ $search    = $_GET["search"]; }
if (isset($_GET["type"])){ $type        = $_GET["type"]; }
if (isset($_GET["page"])){ $page        = $_GET["page"]; }

$page = $page - 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATShop</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- app css -->
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    
     <!-- mobile menu -->
     <div class="mobile-menu bg-second">
            <a href="./index.php" class="mb-logo">ATShop</a>
            <span class="mb-menu-toggle" id="mb-menu-toggle">
                <i class='bx bx-menu'></i>
            </span>
        </div>
        <!-- end mobile menu -->
        <!-- main header -->
        <div class="header-wrapper" id="header-wrapper">
            <span class="mb-menu-toggle mb-menu-close" id="mb-menu-close">
                <i class='bx bx-x'></i>
            </span>
            <!-- top header -->
            <div class="bg-second">
                <div class="top-header container">
                    <ul class="devided">
                        <li>
                            <a href="#">+840123456789</a>
                        </li>
                        <li>
                            <a href="#">atshop@mail.com</a>
                        </li>
                    </ul>                    
                </div>
            </div>
            <!-- end top header -->
            <!-- mid header -->
            <div class="bg-main">
                <div class="mid-header container">
                    <a href="#" class="logo">ATShop</a>
                    <?php if (!isset($type_post)) { ?>
                    <form class="search" method="get" action="./products.php">
                    <?php } else { ?>
                    <form class="search" method="get" action="./blog.php">
                    <?php } ?>
                        <input name="search" type="text" value="<?= $search ?>" placeholder="Search">
                        <button type="submit" style="display:inline" >
                            <i class='bx bx-search-alt'></i>
                        </button>
                        
                    </form>
                    
                    <ul class="user-menu">
                        <li><a href="#"><i class='bx bx-bell'></i></a></li>
                            <?php
                            if(isset($_SESSION['auth']))
                            {                                   
                                $users= getAll("users");        
                                $row= mysqli_fetch_array($users);                              
                                    ?>
                                    <li class="mega-dropdown"> 
                                    <a href="#"><i class='bx bx-user-circle'></i></a>
                                    <div class="mega-content" style="width: auto;display: inline-block;right: 0;">
                                            <div class="row">
                                                <div class="box">
                                                    <h3>Hello <?= $_SESSION['auth_user']['name'] ?>!</h3>
                                                        <ul>   
                                                            <li><a href="user-profile.php">Profile</a></li>
                                                            <li><a href="#">Order</a></li>
                                                            <li><a href="logout.php">logout</a></li>        
                                                        </ul>
                                                </div>                                          
                                            </div>  
                                        </div>       
                                    </li>      
                                    <?php                                                
                                // unset($_SESSION['auth']);
                            }
                            else{
                            ?>
                            <li class="mega-dropdown">
                            <a href="#"><i class='bx bx-user-circle'></i></a>
                                <div class="mega-content">
                                    <div class="row">
                                        <div class="box">
                                            <ul>
                                                <li><a href="login.php">Login</a></li>
                                                <li><a href="register.php">Register</a></li>                                                         
                                            </ul>
                                        </div>                                          
                                    </div>  
                                </div>       
                            </li>  
                            <?php
                            }
                            ?>
                        <li><a href="#"><i class='bx bx-cart'></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- menu-main -->
            <div class="bg-second">
                <div class="bottom-header container">
                    <ul class="main-menu">
                        <li><a href="index.php">home</a></li>
                        <!-- mega menu -->
                        <li class="mega-dropdown">
                            <a href="products.php">Categories<i class='bx bxs-chevron-down'></i></a>
                            <div class="mega-content">
                                <div class="row">                                  
                                    <div class="col-md-12">
                                        <div class="box">
                                            <ul>
                                            <?php
                                                $categories= getAllActive("categories");
                                                
                                                if(mysqli_num_rows($categories)>0)
                                                {
                                                    foreach($categories as $item)
                                                    {
                                                        ?>
                                                            <li><a href="./products.php?type=<?= $item['slug'] ?>"><?= $item['name']; ?></a></li> 
                                                        <?php
                                                    }
                                                }else
                                                {
                                                    echo "no";
                                                }
                                            ?>                                              
                                            </ul>
                                        </div>
                                    </div>                                
                                </div>                                
                            </div>
                        </li>
                        <!-- end mega menu -->
                        <li><a href="./blog.php">blog</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- end bottom header -->
        </div>
        <!-- end main header -->
</head>

