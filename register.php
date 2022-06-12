<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<?php 
include("./includes/header.php");
?>
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
                    <form action="./functions/authcode.php" method="POST" id="register-account">
                        <div class="mb-3">
                            <b><label class="form-label">Your Name</label></b>
                            <input type="text" name ="name" class="form-control" placeholder="Enter Your Name" >
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputEmail1" class="form-label">Email address</label></b>
                            <input type="email" name="email" class="form-control" id="InputEmail" aria-describedby="emailHelp"  placeholder="Enter Your Email">
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputEmail1" class="form-label">Phone</label></b>
                            <input type="number" name="phone" class="form-control"  placeholder="Enter Your Phone">
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputPassword1" class="form-label">Password</label></b>
                            <input type="password" name="password" id="InputPassword1" class="form-control"  placeholder="Enter Password">
                        </div>
                        <div class="mb-3">
                            <b><label for="exampleInputPassword1" class="form-label">Confirm Password</label></b>
                            <input type="password" name="cpassword" id="InputPassword2" class="form-control"  placeholder="Confirm Password">
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

<script>
    const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };
    document.getElementById("register-account").addEventListener('submit',function(e){
        let email = document.getElementById("InputEmail").value;
        let password1 = document.getElementById("InputPassword1").value;
        let password2 = document.getElementById("InputPassword2").value;
        if(!validateEmail(email)){
            alertify.set('notifier','position', 'top-right');
            alertify.success('Lỗi email không hợp lệ');
            e.preventDefault();
        }else if(password1 != password2){
            alertify.set('notifier','position', 'top-right');
            alertify.success('Lỗi passworld khoong trung');
            e.preventDefault();
        }else if(password1.length <= 6){
            alertify.set('notifier','position', 'top-right');
            alertify.success('Lỗi passworld phải trên 6 kí tự');
            e.preventDefault();
        }
    })
</script>
 

<?php include("./includes/footer.php")?>