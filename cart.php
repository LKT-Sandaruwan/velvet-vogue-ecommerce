<?php 

include('functions/userfunctions.php');
include('includes/header.php');

include('authenticate.php');

?>


<style>
   a {
      text-decoration: none;
   }
</style>

<div class="py-3 bg-primary">
   <div class="container">
      <h6 class="text-white">
         <a href="index.php" class="text-white">
            Home / 
         </a>
         <a href="cart.php" class="text-white">
            Cart
         </a>
      </h6>
   </div>
</div>

<div class="">
   <img src="assets/images/cart01.jpg" class="w-100" alt="category">
</div>

<div class="container mt-5">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <span class="fs-4">Cart</span>
            </div>
            <div class="card-body"  id="mycart">
               <?php 
                  $items = getCartItems();  
                  
                  if(mysqli_num_rows($items) > 0)
                  {
                     ?>
                        <div class="row align-items-center">
                           <div class="col-md-1">
                              <h6>Product</h6>
                           </div>
                           <div class="col-md-3">
                              <h6>Product Name</h6>
                           </div>
                           <div class="col-md-2">
                              <h6>Price</h6>
                           </div>
                           <div class="col-md-2">
                              <h6>Color</h6>
                           </div>
                           <div class="col-md-2">
                              <h6>Quantity</h6>
                           </div>
                           <div class="col-md-2">
                              <h6>Remove</h6>
                           </div>
                        </div>
                        <div id="">
                           <?php
                              foreach($items as $citem)
                              {
                                 ?>
                                 <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center">
                                       <div class="col-md-1">
                                          <img src="uploads/<?= $citem['image'] ?>" alt="image" height="80px" >
                                       </div>
                                       <div class="col-md-3">
                                          <h5><?= $citem['name'] ?></h5>
                                       </div>
                                       <div class="col-md-2">
                                          <h5>Rs.<?= $citem['selling_price'] ?></h5>
                                       </div>
                                       <div class="col-md-2">
                                          <h5><?= $citem['color'] ?></h5>
                                       </div>
                                       <div class="col-md-2">
                                          <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                          <div class="input-group mb-3" style="width:130px" >
                                             <button class="input-group-text decrement-btn updateQty">-</button>
                                             <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled >
                                             <button class="input-group-text increment-btn updateQty">+</button>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                             <i class="fa fa-trash me-2"></i>
                                             Remove
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                              }
                           ?>
                        </div>
                        <div class="float-end">
                           <a href="checkout.php" class="btn btn-outline-primary">Proceed to Checkout</a>
                        </div>
                     <?php
                  }
                  else
                  {
                     ?>
                        <div class="card card-body shadow text-center">
                           <h4 class="py-3">Your cart is empty</h4>
                        </div>
                     <?php
                  }
               ?>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php'); ?>
   