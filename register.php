<?php 
session_start();
include("./includes/header.php");
?>
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<script src="../assets/js/boostrap.bundle.js"></script>

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
                  <h1> Register Form</h1>
                </div>
                <div class="card-body">
                    <form action="./functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <b><label class="form-label">Your Name</label></b>
                                <input type="text" name ="name" class="form-control" placeholder="Enter Your Name" >
                            </div>
                            <div class="mb-3">
                                <b><label for="exampleInputEmail1" class="form-label">Email address</label></b>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Enter Your Email">
                            </div>
                            <div class="mb-3">
                                <b><label for="exampleInputEmail1" class="form-label">Phone</label></b>
                                <input type="number" name="phone" class="form-control"  placeholder="Enter Your Phone">
                            </div>
                            <div class="mb-3">
                                <b><label for="exampleInputPassword1" class="form-label">Password</label></b>
                                <input type="password" name="password" class="form-control"  placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <b><label for="exampleInputPassword1" class="form-label">Confirm Password</label></b>
                                <input type="password" name="cpassword" class="form-control"  placeholder="Confirm Password">
                            </div>
                            <!-- Đăng kí -->
                            <input type="hidden" name="register-btn" value="check">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>

            </div>
         </div>
     </div>
    </div> 
</div>

 

<?php include("./includes/footer.php")?>