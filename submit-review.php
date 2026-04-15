<?php
include('functions/userfunctions.php');
include('authenticate.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['auth_user']['user_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $query = "INSERT INTO reviews (product_id, user_id, review_text, rating) VALUES ('$product_id', '$user_id', '$review_text', '$rating')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $_SESSION['message'] = "Review submitted successfully.";
    } else {
        $_SESSION['message'] = "Failed to submit review. Please try again.";
    }

    header("Location: product-view.php?product=" . getSlug($product_id));
    exit;
}
?>
