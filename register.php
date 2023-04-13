<?php 
if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You Are Already Login";
    header('Location: index.php');
    exit();

}
include('includes/header.php'); 

?>  

    <div class="py-5" >
    


  <div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-7">
            <?php 
            if(isset($_SESSION['message'])) 
            { 
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> <?= $_SESSION['message']; ?>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['message']);
            }
            ?>
            <div class="card">
                <div class="card-header" >
                    <h4> Registration form </h4>
                </div>
                <div class="card-body" >
            <form action="functions/authcode.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Confirm Your Password">
                </div>
                <button type="send" name="register_btn" class="btn btn-primary">Send</button>
            </form>
                </div>

            </div>
            

        </div>

    </div>

  </div>

  </div>
  <?php include('includes/footer.php'); ?>  