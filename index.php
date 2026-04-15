<?php 
include('functions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');
?>

<style>
    :root {
        --main-color: #EB8317;
        --sub-color: #003366;
        --white-color: #FFFFFF;
    }

    .card img {
        transition: transform 0.3s ease;
    }

    .card:hover img {
        transform: scale(1.05);
    }

    .product-info {
        display: none;
        position: absolute;
        top: 10px;
        left: 10px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .card:hover .product-info {
        display: block;
    }

    .new-arrival-card {
        opacity: 0;
        animation: fadeIn 1s forwards;
    }

    .new-arrival-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .new-arrival-card:nth-child(2) {
        animation-delay: 0.3s;
    }

    .new-arrival-card:nth-child(3) {
        animation-delay: 0.5s;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    .about-us-btn {
        background-color: var(--main-color);
        color: var(--white-color);
        padding: 10px 20px;
        border: none;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
    }

    .about-us-btn:hover {
        background-color: var(--sub-color);
    }
</style>

<!-- Trending Products -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-4"></div>
                <div class="owl-carousel owl-theme">
                    <?php
                        $trendingProducts = getAllTrending();
                        if(mysqli_num_rows($trendingProducts) > 0)
                        {
                            foreach ($trendingProducts as $item) 
                            {
                                ?>
                                    <div class="item">
                                        <a href="product-view.php?product=<?= $item['slug']; ?>">
                                            <div class="card bg-transparent border-0 position-relative">
                                                <img src="uploads/<?= $item['image']; ?>" alt="product image" class="w-100 mb-3">
                                                <div class="product-info">
                                                    <h6><?= $item['name']; ?></h6>
                                                    <p>Rs.<?= $item['selling_price']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>   
        </div>
    </div>
</div>

<!-- New Arrivals -->
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>New Arrivals</h4>
                <div class="underline mb-4"></div>
                <div class="row">
                    <?php
                        $newArrivals = getNewArrivals();
                        if(mysqli_num_rows($newArrivals) > 0)
                        {
                            $count = 0;
                            foreach ($newArrivals as $item) 
                            {
                                ?>
                                    <div class="col-md-3 mb-3 new-arrival-card">
                                        <a href="product-view.php?product=<?= $item['slug']; ?>">
                                            <div class="card bg-transparent border-0">
                                                <img  src="uploads/<?= $item['image']; ?>" alt="product image" class="w-100 mb-3">
                                                <h6 class="text-center"><?= $item['name']; ?></h6>
                                                <h6 class="text-center">Rs.<?= $item['selling_price']; ?></h6>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                $count++;
                                
                                if ($count % 4 == 0) {
                                    echo '</div><div class="row">';
                                }
                            }
                        }
                        else
                        {
                            echo "<p>No new arrivals to display.</p>";
                        }
                    ?>
                </div>
            </div>   
        </div>
    </div>
</div>

<!-- Promotions -->
<div class="py-5">
    <img src="assets/images/promo.png" alt="Promotion Image" style="width: 100%">      
</div>

<!-- About Us -->
<div class="py-5 bg-f2f2f2 mb-5">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-5">
                    <h4>About Us</h4>
                    <div class="underline mb-2"></div>
                        <p style="text-align: justify;">
                        Welcome to Velvet Vogue, your ultimate destination for stylish and trend-forward fashion. Established by entrepreneur John Finlo, Velvet Vogue was created to inspire young adults to express their individuality and confidence through clothing. We specialize in trendy casual wear and elegant formal attire, offering a versatile range of high-quality apparel and accessories for every occasion, from casual outings to sophisticated events. Our designs focus on blending style, comfort, and affordability, ensuring that you always look and feel your best.</p>
                        <p style="text-align: justify;">
                        At Velvet Vogue, we go beyond just selling clothes—we're passionate about creating a seamless shopping experience. Our user-friendly website features detailed product pages, intuitive navigation, and responsive design, making it easy to shop from any device. With personalized user accounts and inclusive options for all sizes and styles, we aim to cater to the preferences of every individual. Whether you're looking for the perfect outfit or browsing for inspiration, Velvet Vogue is here to help you redefine your wardrobe and celebrate your unique style.</p>
                        <a href="about_us.php" class="about-us-btn">Learn More</a>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-5 mt-4">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="assets/images/about02.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="assets/images/about01.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="assets/images/about03.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
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
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    });
</script>
