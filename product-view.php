<?php 

include('functions/userfunctions.php'); 
include('includes/header.php'); 

if(isset($_GET['product']))
{
   $product_slug = $_GET['product'];
   $product_data = getSlugActive('products', $product_slug);
   $product = mysqli_fetch_array($product_data);

   if($product)
   {
      ?>

      <style>
         a 
         {
            text-decoration: none;
         }

         .back-btn 
         {
            display: inline-block;
            background-color: #EB8317;
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 50px;
            text-decoration: none;
            cursor: pointer;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
         }

        .back-btn:hover {
            background-color: #e0790d;
         }

        .product-img-wrapper {
            position: relative;
            overflow: hidden;
            max-width: 100%;
         }

        .product-img {
            width: 100%;
            transition: transform 0.3s ease;
         }

        .product-img-wrapper:hover .product-img 
        {
            transform: scale(1.05);
         }

        .product-title {
            font-size: 30px;
            font-weight: bold;
            color: #333;
        }

        .product-price {
            font-size: 24px;
            color: #28a745;
        }

        .product-old-price {
            font-size: 18px;
            color: #dc3545;
            text-decoration: line-through;
        }

        .product-description {
            font-size: 18px;
            color: #555;
            margin-top: 20px;
        }

        .product-details {
            padding: 20px;
            background: #f8f9fa;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Button styling */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 25px;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Layout styling */
        .product-info {
            margin-top: 30px;
        }

        .price-section {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }

        .price-section .new-price {
            font-size: 22px;
            color: #28a745;
            font-weight: bold;
        }

        .price-section .old-price {
            font-size: 18px;
            color: #dc3545;
            text-decoration: line-through;
        }

        /* Container settings */
        .product-container {
            max-width: 1200px;
            margin: auto;
        }

        /* Review Section */
        .reviews-section {
            margin-top: 30px;
        }

        .review {
            margin-bottom: 20px;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .review h5 {
            margin: 0 0 5px 0;
        }
      </style>

      <!-- Back Button -->
      <div class="container">
         <a href="javascript:history.back()" class="back-btn mt-2"><i class="fa fa-arrow-left"></i> Back</a>
      </div>

      <div class="product-container">
         <div class="row product_data">
            <div class="col-md-5">
               <div class="product-img-wrapper shadow">
                  <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="product-img">
               </div>
            </div>
            <div class="col-md-6">
               <div class="product-details">
                  <h4 class="product-title"><?= $product['name']; ?>
                     <span class="float-end text-danger"><?php if($product['trending']){ echo "Trending"; } ?></span>
                  </h4>
                  <hr>

                  <p class="product-description"><?= $product['small_description']; ?></p>

                  <div class="price-section">
                     <div>
                        <h4 class="new-price">Rs. <?= $product['selling_price']; ?></h4>
                     </div>
                     <div>
                        <h5 class="old-price">Rs. <s><?= $product['original_price']; ?></s></h5>
                     </div>
                  </div>

                  <div class="row product-info mt-3">
                     <div class="col-md-6">
                        <p><strong>Available Size:</strong> <?= $product['size']; ?></p>
                        <p><strong>Available Colour:</strong> <?= $product['color']; ?></p>
                     </div>
                  </div>

                  <!-- Quantity Input -->
                  <div class="input-group mb-3" style="width: 130px;">
                     <button class="input-group-text decrement-btn">-</button>
                     <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                     <button class="input-group-text increment-btn">+</button>
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                     </div>
                  </div>

                  <hr>
                  <h6>Product Description:</h6>
                  <p class="product-description"><?= $product['description']; ?></p>
               </div>
            </div>
         </div>

         <!-- Reviews Section -->
         <div class="reviews-section mt-5">
            <h3 class="text-center mb-4" style="color: #E36A00;">Customer Reviews</h3>
            <div class="row">
               <?php
               $reviews_query = "SELECT r.*, u.name FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.product_id = {$product['id']} ORDER BY r.created_at DESC";
               $reviews_result = mysqli_query($con, $reviews_query);

               if (mysqli_num_rows($reviews_result) > 0) {
                     while ($review = mysqli_fetch_assoc($reviews_result)) {
                        ?>
                        <div class="col-md-4 mb-4">
                           <div class="review-card p-3" style="background-color: #f8f9fa; border: 1px solid #ddd; border-radius: 5px;">
                                 <h5 class="mb-0" style="color: #10375C;"><?= $review['name']; ?></h5>
                                 <p class="mb-0" style="color: #666; font-size: 14px;">Rating: <?= $review['rating']; ?>/5</p>
                                 <p class="mb-2" style="color: #666; font-size: 14px;"><?= $review['review_text']; ?></p>
                                 <small class="text-muted" style="font-size: 12px;">Reviewed on <?= date("F j, Y", strtotime($review['created_at'])); ?></small>
                           </div>
                        </div>
                        <?php
                     }
               } else {
                     echo "<p class='text-center mt-4' style='color: #666;'>No reviews yet. Be the first to review this product!</p>";
               }
               ?>
            </div>
         </div>

         <!-- Add Review Section -->
         <?php if (isset($_SESSION['auth_user'])): ?>
            <div class="add-review-section mt-5 mb-5">
               <h4 class="text-center mb-4" style="color: #E36A00;">Write a Review</h4>
               <div class="row">
                     <div class="col-md-6 offset-md-3">
                        <form action="submit-review.php" method="POST">
                           <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                           <div class="form-group mb-3">
                                 <label for="rating" style="color: #10375C;">Rating</label>
                                 <select name="rating" id="rating" class="form-control" required>
                                    <option value="">Select Rating</option>
                                    <option value="1">1 - Poor</option>
                                    <option value="2">2 - Fair</option>
                                    <option value="3">3 - Good</option>
                                    <option value="4">4 - Very Good</option>
                                    <option value="5">5 - Excellent</option>
                                 </select>
                           </div>
                           <div class="form-group mb-3">
                                 <label for="review_text" style="color: #10375C;">Review</label>
                                 <textarea name="review_text" id="review_text" class="form-control" rows="5" required></textarea>
                           </div>
                           <button type="submit" class="btn btn-primary" style="background-color: #E36A00; border-color: #E36A00;">Submit Review</button>
                        </form>
                     </div>
               </div>
            </div>
         <?php else: ?>
            <p class="text-center mt-4" style="color: #666;"><a href="login.php" style="color: #E36A00;">Log in</a> to write a review.</p>
         <?php endif; ?>
      </div>
      <!-- footer -->
      <div class="py-5 bg-dark">
         <div class="container">
            <div class="row">
                  <div class="col-md-3">
                     <h4 class="text-white">Velvet Vogue</h4>
                     <div class="underline mb-2"></div>
                     <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a><br>
                     <a href="#" class="text-white"><i class="fa fa-angle-right"></i> About Us</a><br>
                     <a href="cart.php" class="text-white"><i class="fa fa-angle-right"></i> My Cart</a><br>
                     <a href="categories.php" class="text-white"><i class="fa fa-angle-right"></i> Our Collections</a>
                  </div>
                  <div class="col-md-3">
                     <h4 class="text-white">Address</h4>
                     <p class="text-white">
                        52/C Ground Floor,
                        2nd street,xyz layout,
                        Horowpathana,Sri Lanka.
                     </p>
                     <a href="tel:+94769696969" class="text-white"><i class="fa fa-phone"> +94769696969</i></a><br>
                     <a href="velvetvogue@gmail.com" class="text-white"><i class="fa fa-envelope"> velvetvogue@gmail.com</i></a>
                  </div>
                  <div class="col-md-6">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.0022222420127!2d79.99397121042674!3d7.008235470161834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f8c774169abf%3A0xf945a502d01976eb!2sHandiye%20Kade!5e0!3m2!1sen!2slk!4v1733537654383!5m2!1sen!2slk" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
            </div>
         </div>
      </div>
      <div class="py-2 bgh">
         <div class="text-center">
            <p class="mb-0 text-white">All rights reserved. Copyright @ velvet vogue - 20<?= date('y') ?></p>
         </div>
      </div>

      <?php
   }
   else
   {
      echo "Product Not Found";
   }
}
else
{
   echo "Something went wrong";
}



include('includes/footer.php'); ?>
