<style>
  .custom-navbar {
    background-color: #F4F6FF;
  }
  .custom-navbar .navbar-brand,
  .custom-navbar .dropdown-toggle {
    color: #10375C;
  }

  .custom-navbar .nav-link{
    font-size: 19px;
    font-family: calibri;
    color: #10375C;
    transition: 0.3s ease;
  }

  .custom-navbar .nav-link:hover {
    color: #EB8317;
  }
  .custom-navbar .dropdown-menu {
    background-color: #F4F6FF;
  }
  .custom-navbar .dropdown-item {
    color: #10375C;
  }
  .custom-navbar .dropdown-item:hover {
    background-color: #DCE3F9; 
    color: #0C2A4A;
  }

  .navbar-brand{
    font-size: 25px;
    font-family: calibri;
    font-weight: 600;
    color: #10375C;
  }
</style>

<nav class="navbar navbar-expand-lg sticky-top custom-navbar shadow">
  <div class="container">
    <a class="navbar-brand" href="index.php">Velvet Vogue</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php"><i class="fas fa-home nav-icon"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php" ><i class="fas fa-th-large nav-icon"></i> Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-orders.php" ><i class="fas fa-box nav-icon"></i> My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php" ><i class="fas fa-shopping-cart nav-icon"></i> Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" ><i class="fas fa-phone-alt nav-icon"></i> Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php" ><i class="fas fa-info-circle nav-icon"></i> About Us</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php
          if(isset($_SESSION['auth']))
          {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?= $_SESSION['auth_user']['name']; ?>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt nav-icon"></i>Logout</a></li>
                </ul>
              </li>
            <?php
          }
          else
          {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="register.php"><i class="fas fa-user-plus nav-icon"></i> Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt nav-icon"></i> Login</a>
              </li>
            <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
