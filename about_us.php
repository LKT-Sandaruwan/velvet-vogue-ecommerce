<?php 

include('functions/userfunctions.php');
include('includes/header.php'); 

?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .about-header {
        text-align: center;
        padding: 60px 20px;
        background-color: #003366; /* Dark Blue */
        color: #ffffff; /* White */
    }

    .about-header h1 {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .about-header p {
        font-size: 1.2rem;
        line-height: 1.8;
        margin: 0 auto;
        max-width: 900px;
    }

    .about-content {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin: 50px 0;
    }

    .about-image {
        flex: 1 1 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        order: 1; /* Places the image on the left */
    }

    .about-image img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .about-text {
        flex: 1 1 50%;
        padding: 30px;
        background-color: #ffffff; /* White */
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        order: 2; /* Places the text on the right */
    }

    .about-text h2 {
        color: #ff6600; /* Orange */
        margin-bottom: 20px;
    }

    .about-text p {
        margin: 15px 0;
        line-height: 1.8;
    }

    .vision-section, .mission-section {
        margin: 50px 0;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 15px;
    }

    .vision-section h2, .mission-section h2 {
        text-align: center;
        color: #003366; /* Dark Blue */
        margin-bottom: 20px;
    }

    .vision-mission-content {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .vision, .mission {
        flex: 1 1 45%;
        background-color: #ffffff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .vision h3, .mission h3 {
        color: #ff6600; /* Orange */
        margin-bottom: 10px;
    }

    .reviews-section {
        margin-top: 50px;
        padding: 30px;
        background-color: #f4f4f4; /* Light Gray */
        border-radius: 15px;
    }

    .reviews-section h2 {
        text-align: center;
        color: #ff6600; /* Orange */
        margin-bottom: 20px;
    }

    .reviews {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .review {
        flex: 1 1 30%;
        background-color: #ffffff; /* White */
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .review h3 {
        color: #003366; /* Dark Blue */
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    .review p {
        font-size: 1rem;
        line-height: 1.6;
        color: #555;
    }

    .review span {
        display: block;
        font-size: 0.9rem;
        color: #ff6600; /* Orange */
        margin-top: 10px;
    }
</style>

<div class="about-container">
    <div class="about-header">
        <h1>About Velvet Vogue</h1>
        <p>Your ultimate destination for style, individuality, and confidence. From trendy casualwear to chic formal attire, we redefine fashion for young adults who love to express themselves.</p>
    </div>

    <div class="about-content">
        <div class="about-text">
            <h2>Who We Are</h2>
            <p>Velvet Vogue was established by entrepreneur John Finlo with the mission of blending creativity, quality, and affordability. We believe in helping you stand out with confidence, no matter the occasion.</p>
            <p>Our collections cater to every personality, from bold statement-makers to those who love minimal, sophisticated designs. With Velvet Vogue, your wardrobe is your canvas.</p>
        </div>
    </div>

    <div class="about-image">
            <img src="assets/images/hj.jpg" alt="About Velvet Vogue">
        </div>

    <div class="vision-section">
        <h2>Our Vision & Mission</h2>
        <div class="vision-mission-content">
            <div class="vision">
                <h3>Our Vision</h3>
                <p>To inspire individuality and confidence in every customer through fashion. Velvet Vogue aims to be a global brand synonymous with style and self-expression.</p>
            </div>
            <div class="mission">
                <h3>Our Mission</h3>
                <p>To deliver top-quality, affordable fashion that empowers people to celebrate their unique personalities. We focus on innovation, customer satisfaction, and sustainability in every step.</p>
            </div>
        </div>
    </div>

    <div class="reviews-section">
        <h2>Customer Reviews</h2>
        <div class="reviews">
            <div class="review">
                <h3>Emily R.</h3>
                <p>"Velvet Vogue's clothes are a perfect blend of quality and style. I feel confident and fabulous in their designs!"</p>
                <span>⭐⭐⭐⭐⭐</span>
            </div>
            <div class="review">
                <h3>Michael T.</h3>
                <p>"The website is so easy to use, and the delivery was quick. I’ll definitely shop here again!"</p>
                <span>⭐⭐⭐⭐⭐</span>
            </div>
            <div class="review">
                <h3>Sophia L.</h3>
                <p>"Velvet Vogue has become my go-to brand for every occasion. The service is excellent too!"</p>
                <span>⭐⭐⭐⭐⭐</span>
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

<?php include('includes/footer.php'); ?>
