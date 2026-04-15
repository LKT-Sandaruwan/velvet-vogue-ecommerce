<?php

session_start();
include('config/dbcon.php');

// Fetch all active records from a given table
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0'";
    return mysqli_query($con, $query);
}

// Fetch all products marked as active and sort by latest
function getAllProduct($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0' ORDER BY id DESC";
    return mysqli_query($con, $query);
}

// Fetch trending products
function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending='1'";
    return mysqli_query($con, $query);
}

// Fetch latest 8 active products
function getNewArrivals()
{
    global $con;
    $query = "SELECT * FROM products WHERE status='0' ORDER BY id DESC LIMIT 8";
    return mysqli_query($con, $query);
}

// Fetch active record by slug
function getSlugActive($table, $slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1";
    return mysqli_query($con, $query);
}

// Fetch products belonging to a specific category
function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0'";
    return mysqli_query($con, $query);
}

// Fetch active record by ID
function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0'";
    return mysqli_query($con, $query);
}

// Fetch all cart items for the logged-in user
function getCartItems()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price, p.color 
              FROM carts c, products p 
              WHERE c.prod_id = p.id AND c.user_id = '$userId' 
              ORDER BY c.id DESC";
    return mysqli_query($con, $query);
}

// Fetch all orders for the logged-in user
function getOrders()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC";
    return mysqli_query($con, $query);
}

// Check if a tracking number is valid for the logged-in user
function checkTrackingNoValid($trackingNo)
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id='$userId'";
    return mysqli_query($con, $query);
}

// Handle redirection with optional message
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}

// Fetch reviews for a specific product
function getReviews($product_id)
{
    global $con;
    $query = "SELECT r.id, r.user_id, r.review_text, r.rating, r.created_at, u.name 
              FROM reviews r, users u 
              WHERE r.product_id = '$product_id' AND r.user_id = u.id 
              ORDER BY r.created_at DESC";
    return mysqli_query($con, $query);
}

// Add a new review for a product
function addReview($product_id, $user_id, $review_text, $rating)
{
    global $con;
    $query = "INSERT INTO reviews (product_id, user_id, review_text, rating, created_at) 
              VALUES ('$product_id', '$user_id', '$review_text', '$rating', NOW())";
    return mysqli_query($con, $query);
}

// Check if a user has already reviewed a specific product
function hasUserReviewed($product_id, $user_id)
{
    global $con;
    $query = "SELECT * FROM reviews WHERE product_id='$product_id' AND user_id='$user_id' LIMIT 1";
    return mysqli_query($con, $query);
}

function getSlug($product_id) {
   global $con;
   $query = "SELECT slug FROM products WHERE id = $product_id LIMIT 1";
   $result = mysqli_query($con, $query);
   if ($result) {
       $data = mysqli_fetch_assoc($result);
       return $data['slug'];
   }
   return null;
}


?>
