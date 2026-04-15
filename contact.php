<?php 
include('functions/userfunctions.php');
include('includes/header.php'); 
?>

<!-- Add Font Awesome CDN in the <head> section -->
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
    }

    .contact-header {
        text-align: center;
        padding: 60px 20px;
        background-color: #003366; /* Dark Blue */
        color: #ffffff; /* White */
    }

    .contact-header h1 {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    .contact-header p {
        font-size: 1.2rem;
        line-height: 1.8;
        margin: 0 auto;
        max-width: 900px;
    }

    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px;
    }

    .contact-section {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .contact-info {
        flex: 1 1 40%;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .contact-info h2 {
        color: #ff6600; /* Orange */
        margin-bottom: 20px;
    }

    .contact-info p {
        margin: 10px 0;
        line-height: 1.8;
    }

    .contact-info a {
        color: #003366; /* Dark Blue */
        text-decoration: none;
    }

    .contact-form {
        flex: 1 1 60%;
        background-color: #f9f9f9;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .contact-form h2 {
        color: #ff6600; /* Orange */
        margin-bottom: 20px;
    }

    .contact-form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }

    .contact-form input,
    .contact-form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }

    .contact-form button {
        background-color: #ff6600; /* Orange */
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
    }

    .contact-form button:hover {
        background-color: #e65c00; /* Dark Orange */
    }

    .map-section {
        margin-top: 50px;
    }

    .map-section iframe {
        width: 100%;
        height: 400px;
        border: 0;
        border-radius: 10px;
    }

    /* Popup style */
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background: white;
        padding: 30px;
        border-radius: 10px;
        text-align: center;
    }

    .popup-content h2 {
        color: #28a745;
    }

    .popup button {
        background-color: #ff6600; /* Orange */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
    }

    .popup button:hover {
        background-color: #e65c00;
    }
</style>

<div class="contact-header">
    <h1>Contact Us</h1>
    <p>We'd love to hear from you! Feel free to reach out to us via the form below or through our contact details.</p>
</div>

<div class="contact-container">
    <div class="contact-section">
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> 52/C Ground Floor, 2nd street, xyz layout, Horowpathana, Sri Lanka.</p>
            <p><strong>Phone:</strong> <a href="tel:+94769696969">+94769696969</a></p>
            <p><strong>Email:</strong> <a href="mailto:velvetvogue@gmail.com">velvetvogue@gmail.com</a></p>
            <p>Follow us on social media for the latest updates and trends:</p>
            <p>
                <a href="#" style="margin-right: 10px;"><i class="fa fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fa fa-instagram"></i> Instagram</a>
            </p>
        </div>

        <div class="contact-form">
            <h2>Get in Touch</h2>
            <form id="contactForm" action="submit_contact.php" method="POST" onsubmit="return handleFormSubmit(event)">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>

                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message here" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </div>

    <div class="map-section">
        <h2 style="color: #ff6600; text-align: center; margin-bottom: 20px;">Find Us Here</h2>
        <iframe src="https://www.google.com/maps/embed?pb=..."></iframe>
    </div>
</div>

<!-- Popup for success message -->
<div id="popup" class="popup">
    <div class="popup-content">
        <h2>Message Sent Successfully!</h2>
        <p>Your message has been received. We will get back to you soon.</p>
        <button onclick="closePopup()">Close</button>
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

<script>
    // Function to handle form submission
    function handleFormSubmit(event) {
        event.preventDefault(); // Prevent form submission
        // Show success popup
        document.getElementById('popup').style.display = 'flex';
        // Clear the form fields
        document.getElementById('contactForm').reset();
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>
