<?php 

session_start();

if(isset($_SESSION['auth']))
{
   $_SESSION['message'] = "You are alredy logged In";
   header('Location: index.php');
   exit();
}

include('includes/header.php'); 

?>

<style>
   body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4; 
      margin: 0;
      padding: 0;
      color: #333;
      min-height: 100vh; /* Minimum height of the body */
      display: flex;
      flex-direction: column; /* Allow footer to stick to bottom */
   }

   .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      flex: 1; /* Push footer down */
   }

   .alert {
      background-color: #EB8317; 
      color: #fff;
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 5px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
   }

   .alert .btn-close {
      color: #fff;
   }

   .card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
   }

   .card-header {
      background-color: #10375C;
      color: #fff;
      text-align: center;
      font-size: 1.5rem;
      padding: 15px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
   }

   .card-body {
      padding: 30px;
   }

   .form-label {
      font-weight: bold;
      color: #10375C;
   }

   .form-control {
      border-radius: 5px;
      border: 1px solid #ddd;
      padding: 12px;
      font-size: 1rem;
      margin-bottom: 15px;
   }

   .form-control:focus {
      border-color: #EB8317;
      box-shadow: 0 0 5px rgba(235, 131, 23, 0.5);
   }

   .btn-primary {
      background-color: #EB8317;
      border: none;
      padding: 12px 20px;
      font-size: 1rem;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
   }

   .btn-primary:hover {
      background-color: #d67312; 
   }

   .footer {
      color: #fff;
      text-align: center;
      padding: 20px;
      position: fixed;
      bottom: 0;
      width: 100%;
   }

   .footer p {
      margin: 0;
      font-size: 1rem;
   }

</style>


<div class="py-5">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <?php
            if(isset($_SESSION['message']))
            {
               ?>
               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               <?php
               unset($_SESSION['message']);
            }
            ?>
            <div class="card">
               <div class="card-header">
                  <h4>Login Form</h4>
               </div>
               <div class="card-body">
                  <form action="functions/authcode.php" method="POST">
                     <div class="mb-3">
                       <label for="exampleInputEmail1" class="form-label">Email address</label>
                       <input type="email" name="email" class="form-control" Placeholder="Enter Your email"id="exampleInputEmail1" aria-describedby="emailHelp">
                     </div>
                     <div class="mb-3">
                       <label for="exampleInputPassword1" class="form-label">Password</label>
                       <input type="password" name="password" class="form-control" Placeholder="Enter Password"id="exampleInputPassword1">
                     </div>
                     <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                     <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Footer-->
<div class="py-2 bgh footer">
   <div class="text-center">
      <p class="mb-0 text-white">All rights reserved. Copyright @ velvet vogue - 20<?= date('y') ?></p>
   </div>
</div>

<?php include('includes/footer.php'); ?>
   