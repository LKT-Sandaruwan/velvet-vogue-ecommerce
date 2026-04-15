<?php
include('config/dbcon.php');

// Get filter values
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';
$color = isset($_GET['color']) ? $_GET['color'] : '';
$size = isset($_GET['size']) ? $_GET['size'] : '';
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : '';
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '';

// Base query to select all products
$query = "SELECT * FROM products WHERE 1";

// Apply filters if they are set
if (!empty($gender)) {
    $query .= " AND gender = '$gender'";
}

if (!empty($color)) {
    $query .= " AND color = '$color'";
}

if (!empty($size)) {
    $query .= " AND size = '$size'";
}

// Apply price filters if they are set
if (!empty($minPrice)) {
    $query .= " AND selling_price >= $minPrice";
}

if (!empty($maxPrice)) {
    $query .= " AND selling_price <= $maxPrice";
}

// Order by ID to show the newest products first
$query .= " ORDER BY id DESC"; // Sorting by product ID in descending order

// Run the query
$result = mysqli_query($con, $query);

// Check if products are found
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-3 mb-4">
            <a href="product-view.php?product=<?= $row['slug']; ?>">
                <div class="card product-card">
                    <img src="uploads/<?= $row['image']; ?>" alt="product image">
                    <div class="product-info">
                        <h5><?= $row['name']; ?></h5>
                        <h5 class="price">Rs. <?= $row['selling_price']; ?></h5>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
} else {
    echo "<p>No products found matching your filters.</p>";
}
?>
