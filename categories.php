<?php 
include('functions/userfunctions.php');
include('includes/header.php'); 
?>

<style>
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

    .category-section {
        padding: 40px 0;
        background-color: #fff;
    }

    .category-section h1 {
        font-size: 32px;
        color: #333;
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
    }

    .category-card {
        position: relative;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .category-card:hover {
        transform: scale(1.05);
    }

    .category-card img {
        width: 100%;
        height: auto;
        display: block;
    }

    .category-card .overlay {
        position: absolute;
        top: 10px; 
        left: 10px; 
        width: calc(100% - 20px); 
        height: calc(100% - 20px); 
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .category-card h4 {
        font-size: 24px;
        color: white;
        font-weight: 600;
    }

    .category-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

    .products-section {
        background-color: #f2f2f2;
        padding: 40px 0;
    }

    .product-card {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        background-color: #fff;
        transition: transform 0.3s ease;
        cursor: pointer;
        border-radius: 10px;
    }

    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .product-card img {
        width: 100%;
        height: 350px;
        object-fit: contain;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .product-card .product-info {
        padding: 15px;
        text-align: center;
    }

    .product-card h5 {
        font-size: 18px;
        color: #333;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .product-card h5.price {
        font-size: 20px;
        font-weight: bold;
        color: #EB8317;
    }

    .filter-section {
        background-color: #fff;
        padding: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        text-align: center;
    }

    .filter-section select{
        padding: 6px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background-color: #f8f8f8;
        transition: all 0.3s ease;
        width: auto;
        min-width: 150px;
        max-width: 200px;
    }

    .filter-section button{
        padding: 6px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background-color: #f8f8f8;
        transition: all 0.3s ease;
        width: auto;
        min-width: 100px;
        max-width: 150px;
    }

    .filter-section input[type="number"]{
        padding: 4px;
        font-size: 16px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background-color: #f8f8f8;
        transition: all 0.3s ease;
        width: auto;
        min-width: 150px;
        max-width: 200px;
    }

    .filter-section select:hover,
    .filter-section input[type="number"]:hover,
    .filter-section button:hover {
        background-color: #f0f0f0;
        border-color: #ccc;
    }

    .filter-section button {
        background-color: #EB8317;
        color: white;
        cursor: pointer;
        border: none;
    }

    .filter-section button:hover {
        background-color: #d77c10;
    }

    .filter-section input[type="number"] {
        width: 100px;
    }

    .footer {
        background-color: #333;
        padding: 50px 0;
        color: white;
    }

    .footer .footer-section {
        margin-bottom: 30px;
    }

    .footer h4 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .footer a {
        color: #ccc;
        text-decoration: none;
        font-size: 16px;
        margin-bottom: 10px;
        display: block;
    }

    .footer a:hover {
        color: white;
    }

    .footer .footer-bottom {
        text-align: center;
        font-size: 14px;
        padding: 20px;
        background-color: #222;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .category-container {
            flex-direction: column;
            align-items: center;
        }

        .product-card {
            width: 100%;
        }

        .filter-section {
            flex-direction: column;
        }
        .filter-section select,
        .filter-section input[type="number"],
        .filter-section button {
            width: 100%;
            max-width: 100%;
        }
    }
</style>

<!-- Breadcrumb Section -->
<div class="breadcrumb-container">
    <div class="container">
        <a href="index.php">Home</a> / 
        <a href="categories.php">Categories</a>
    </div>
</div>

<!-- Category Section -->
<div class="category-section">
    <div class="container">
        <h1>Our Categories</h1>
        <div class="category-container">
            <?php
                $categories = getAllActive("categories");

                if (mysqli_num_rows($categories) > 0) {
                    foreach ($categories as $item) {
                        ?>
                        <div class="col-md-3">
                            <a href="products.php?category=<?= $item['slug']; ?>">
                                <div class="category-card">
                                    <img src="uploads/<?= $item['image']; ?>" alt="category image">
                                    <div class="overlay">
                                        <h4><?= $item['name']; ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    echo "No Category Available";
                }
            ?>
        </div>
    </div>
</div>

<!-- Products Section -->
<div class="products-section">
    <div class="container">
        <div class="row">
        <div class="col-md-3">
                <h1>All Products</h1>
            </div>
            <!-- filter section -->
            <div class="col-md-9">
                <div class="filter-section float-end">
                    <form id="productFilterForm" method="GET">
                        <select name="gender" id="genderFilter">
                            <option value="" selected>Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unisex">Unisex</option>
                        </select>
                        <select name="color" id="colorFilter">
                            <option value="" selected>Colour</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                            <option value="yellow">Yellow</option>
                        </select>
                        <select name="size" id="sizeFilter">
                            <option value="" selected>Size</option>
                            <option value="s">Small</option>
                            <option value="m">Medium</option>
                            <option value="l">Large</option>
                        </select>
                        <input type="number" name="minPrice" id="minPrice" placeholder="Min Price" step="1">
                        <input type="number" name="maxPrice" id="maxPrice" placeholder="Max Price" step="1">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Filtered Products Section -->
        <div id="filteredProductsSection" class="py-5">
            <div class="container">
                <div class="row" id="productResults">
                    <!-- Filtered products will load here -->
                </div>
            </div>
        </div>

        <!-- All Products Section -->
        <div id="allProductsSection">
            <div class="row">
                <?php
                $products = getAllProduct("products");

                if (mysqli_num_rows($products) > 0) {
                    foreach ($products as $item) {
                        ?>
                        <div class="col-md-3 mb-4">
                            <a href="product-view.php?product=<?= $item['slug']; ?>">
                                <div class="card product-card">
                                    <img src="uploads/<?= $item['image']; ?>" alt="product image">
                                    <div class="product-info">
                                        <h5><?= $item['name']; ?></h5>
                                        <h5 class="price">Rs. <?= $item['selling_price']; ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                } else {
                    echo "No Products Available";
                }
                ?>
            </div>
        </div>
    </div>
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

<script>
document.getElementById('productFilterForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting normally

    const gender = document.getElementById('genderFilter').value;
    const color = document.getElementById('colorFilter').value;
    const size = document.getElementById('sizeFilter').value;
    const minPrice = document.getElementById('minPrice').value;
    const maxPrice = document.getElementById('maxPrice').value;

    fetch(`filter.php?gender=${gender}&color=${color}&size=${size}&minPrice=${minPrice}&maxPrice=${maxPrice}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('productResults').innerHTML = data;

            // Show filtered products section and hide "All Products"
            document.getElementById('filteredProductsSection').style.display = 'block';
            document.getElementById('allProductsSection').style.display = 'none';
        });
});
</script>


<?php include('includes/footer.php'); ?>

