<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header text-center">
    <a class="navbar-brand m-0" href="index.php">
      <span class="ms-1 font-weight-bold text-white">Velvet Vogue</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse w-auto max-height-vh-100" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <?php 
        // Get current filename
        $current_page = basename($_SERVER['PHP_SELF']);
      ?>

      <!-- First Page -->
      <li class="nav-item">
        <a class="nav-link text-white <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php" style="<?php echo ($current_page == 'index.php') ? 'background: linear-gradient(90deg, #EB8317, #FF9900); color: white;' : ''; ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 me-2">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">First Page</span>
        </a>
      </li>

      <!-- All Categories -->
      <li class="nav-item">
        <a class="nav-link text-white <?php echo ($current_page == 'category.php') ? 'active' : ''; ?>" href="category.php" style="<?php echo ($current_page == 'category.php') ? 'background: linear-gradient(90deg, #EB8317, #FF9900); color: white;' : ''; ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 me-2">category</i>
          </div>
          <span class="nav-link-text ms-1">All Categories</span>
        </a>
      </li>

      <!-- Add Category -->
      <li class="nav-item">
        <a class="nav-link text-white <?php echo ($current_page == 'add-category.php') ? 'active' : ''; ?>" href="add-category.php" style="<?php echo ($current_page == 'add-category.php') ? 'background: linear-gradient(90deg, #EB8317, #FF9900); color: white;' : ''; ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 me-2">add_box</i>
          </div>
          <span class="nav-link-text ms-1">Add Category</span>
        </a>
      </li>

      <!-- All Products -->
      <li class="nav-item">
        <a class="nav-link text-white <?php echo ($current_page == 'products.php') ? 'active' : ''; ?>" href="products.php" style="<?php echo ($current_page == 'products.php') ? 'background: linear-gradient(90deg, #EB8317, #FF9900); color: white;' : ''; ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 me-2">inventory</i>
          </div>
          <span class="nav-link-text ms-1">All Products</span>
        </a>
      </li>

      <!-- Add Products -->
      <li class="nav-item">
        <a class="nav-link text-white <?php echo ($current_page == 'add-product.php') ? 'active' : ''; ?>" href="add-product.php" style="<?php echo ($current_page == 'add-product.php') ? 'background: linear-gradient(90deg, #EB8317, #FF9900); color: white;' : ''; ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 me-2">add_shopping_cart</i>
          </div>
          <span class="nav-link-text ms-1">Add Products</span>
        </a>
      </li>

      <!-- Orders -->
      <li class="nav-item">
        <a class="nav-link text-white <?php echo ($current_page == 'orders.php') ? 'active' : ''; ?>" href="orders.php" style="<?php echo ($current_page == 'orders.php') ? 'background: linear-gradient(90deg, #EB8317, #FF9900); color: white;' : ''; ?>">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10 me-2">shopping_bag</i>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
        </a>
      </li>


    </ul>
  </div>
  <div class="sidenav-footer position-absolute w-100 bottom-0">
    <div class="mx-3">
      <a class="btn mt-4 w-100 text-white" href="../logout.php" style="background: linear-gradient(90deg, #EB8317, #FF9900);">
        Logout
      </a>
    </div>
  </div>
</aside>
