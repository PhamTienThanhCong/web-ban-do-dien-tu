<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<?php 
include("./includes/header.php");

?>
<script src="../assets/js/boostrap.bundle.js"></script>
<link rel="stylesheet" href="./assets/css/author.css">
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <?php if(isset($_SESSION['message']))
                    {
                    ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong><?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header bg-primary">
                        <h1> Login Form</h1>
                        </div>
                        <div class="card-body">
                            <form action="./functions/authcode.php" method="POST"> 
                                    <div class="mb-3">
                                        <b><label for="exampleInputEmail1" class="form-label">Email address</label></b>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter Your Email">
                                    </div>
                                    <div class="mb-3">
                                        <b><label for="exampleInputPassword1" class="form-label">Password</label></b>
                                        <input type="password" name="password" class="form-control"  placeholder="Enter Password">
                                    </div>              
                                    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div> 
</div>
<?php include("./includes/footer.php")?>