<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php');

$orders_count = 0;
include('../config/dbcon.php'); 
$query = "SELECT COUNT(*) as count FROM orders"; 
$result = mysqli_query($con, $query);
if ($row = mysqli_fetch_assoc($result)) {
    $orders_count = $row['count'];
}
?>

<style>
    body {
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
    }

    .card-header {
        background: linear-gradient(90deg, #EB8317, #FF9900);
        color: white;
        padding: 20px;
    }

    .card-body {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .btn-custom {
        background-color: #EB8317;
        color: white;
        border: none;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 150px; 
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #FF9900;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-custom i {
        font-size: 50px;
        margin-bottom: 10px;
    }

    .btn-custom h5 {
        font-size: 18px;
        margin-top: 10px;
    }

    .badge {
        background-color: #EB8317;
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .col-md-4 {
        flex: 1 1 calc(33.333% - 15px);
    }

    @media (max-width: 768px) {
        .col-md-4 {
            flex: 1 1 calc(50% - 15px);
        }
    }

    @media (max-width: 576px) {
        .col-md-4 {
            flex: 1 1 100%;
        }
    }
</style>

<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
   <div class="container">
      <div class="card shadow-lg border-0">
         <div class="card-header text-center">
            <h1>Admin Dashboard</h1>
         </div>
         <div class="card-body">
            <div class="row text-center">
               <!-- All Categories -->
               <div class="col-md-4 mb-3">
                  <a href="category.php" class="btn btn-custom">
                     <i class="material-icons">category</i>
                     <h5>All Categories</h5>
                  </a>
               </div>

               <!-- All Products -->
               <div class="col-md-4 mb-3">
                  <a href="products.php" class="btn btn-custom">
                     <i class="material-icons">inventory</i>
                     <h5>All Products</h5>
                  </a>
               </div>

               <!-- Add Category -->
               <div class="col-md-4 mb-3">
                  <a href="add-category.php" class="btn btn-custom">
                     <i class="material-icons">add_box</i>
                     <h5>Add Category</h5>
                  </a>
               </div>

               <!-- Add Products -->
               <div class="col-md-4 mb-3">
                  <a href="add-product.php" class="btn btn-custom">
                     <i class="material-icons">add_shopping_cart</i>
                     <h5>Add Products</h5>
                  </a>
               </div>

               <!-- Orders -->
               <div class="col-md-4 mb-3">
                  <a href="orders.php" class="btn btn-custom">
                     <i class="material-icons">shopping_bag</i>
                     <h5>Orders</h5>
                     <span class="badge"><?php echo $orders_count; ?></span>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php include('includes/footer.php'); ?>
