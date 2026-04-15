<?php 

include('functions/userfunctions.php'); 
include('includes/header.php'); 

if(isset($_GET['category']))
{

   $category_slug = $_GET['category'];
   $category_data = getSlugActive('categories', $category_slug);
   $category = mysqli_fetch_array($category_data);

   if($category)
   {
      $cid = $category['id'];
      ?>

<style>
    /* Basic Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    /* Header & Breadcrumb */
    .breadcrumb-container {
        background: #EB8317;
        padding: 15px 0;
        color: white;
    }

    .breadcrumb-container a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        transition: color 0.3s ease;
    }

    .breadcrumb-container a:hover {
        color: #fff;
        text-decoration: underline;
    }

</style>      


      <div class="breadcrumb-container">
         <div class="container">
            <a class="text-white" href="index.php">Home</a> /
            <a class="text-white" href="categories.php">Categories</a> /
            <?= $category['name']; ?></h6>
         </div>
      </div>
      
      <div class="py-3">
         <div class="container">
            <div class="row">
                  <div class="col-md-12">
                     <h2><?= $category['name']; ?></h2>
                     <hr>
                     <div class="row">
                        <?php
                           $products = getProdByCategory("$cid");
                           if(mysqli_num_rows($products) >0)
                           {
                              foreach($products as $item)
                              {
                                 ?>
                                    <div class="col-md-3 mb-2">
                                       <a href="product-view.php?product=<?= $item['slug']; ?>">
                                          <div class="card border-0">
                                             <img src="uploads/<?= $item['image']; ?>" alt="product image" class="w-100">
                                             <h4 class="text-center mt-3"><?= $item['name']; ?></h4>
                                             <h4 class="text-center fw-bold">Rs.<?= $item['selling_price']; ?></h4>
                                          </div>
                                       </a>
                                    </div>
                                 <?php
                              }
                           }
                           else
                           {
                              echo "No Products Available";
                           }
                        ?>
                     </div>
                  </div>
            </div>
         </div>
      </div>
         
      <?php 
   }
   else
   {
      echo "Somthing went wrong";
   }
}
else
{
   echo "Somthing went wrong";
}

include('includes/footer.php'); ?>
   