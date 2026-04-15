-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 05:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velvet_vogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(20, 5, 1, 1, '2024-12-08 13:07:09'),
(21, 5, 5, 1, '2024-12-08 13:58:17'),
(22, 4, 1, 1, '2024-12-08 16:33:51'),
(23, 4, 2, 3, '2024-12-08 16:35:41'),
(24, 4, 5, 3, '2024-12-09 03:52:30'),
(26, 5, 14, 1, '2024-12-09 20:07:46'),
(27, 4, 17, 1, '2024-12-10 03:18:30'),
(28, 5, 10, 1, '2024-12-10 10:01:49'),
(29, 5, 20, 5, '2024-12-11 19:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `popular` tinyint(4) NOT NULL,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(2, 'Mens Formal Wear', 'mens-formal-wear', 'Explore an exclusive collection of men’s formal wear, perfect for any professional or elegant occasion. From tailored suits to dress shirts, trousers, and blazers, elevate your style with premium-quality outfits designed for comfort and sophistication. Shop now to create a lasting impression!', 0, 0, '1733568712.jpg', 'Suits, Shirts, & Blazers for Every Occasion', 'Discover the latest in mens formal wear. Shop stylish suits, shirts, trousers, and blazers for weddings, office, or formal events. Premium quality, unmatched elegance!', 'mens formal wear, formal suits, dress shirts, mens blazers, trousers for men, mens elegant outfits, formal wear collection, premium mens clothing', '2024-12-07 10:51:52'),
(3, 'Womens Formal Wear', 'womens-formal-wear', 'Explore our womens formal wear collection, featuring elegant and sophisticated outfits for any occasion. From tailored suits and dresses to skirts and blouses, find the perfect ensemble to make a statement at your next event.', 0, 0, '1733569239.jpg', 'Womens Formal Wear | Elegant and Sophisticated Clothing for Women', 'Shop the latest womens formal wear collection, including dresses, suits, skirts, and blouses. Perfect for professional settings and formal events. Discover timeless styles that exude elegance and confidence.', 'womens formal wear, formal clothing for women, womens suits, formal dresses, womens blouses, elegant womens fashion, professional wear for women, womens skirts, sophisticated clothing for women', '2024-12-07 11:00:39'),
(4, 'Mens Casual Wear', 'mens-casual-wear', 'Dive into our mens casual wear collection, featuring comfortable and stylish options for every day. From trendy t-shirts and polos to jeans, chinos, and hoodies, redefine your casual wardrobe with our versatile outfits.', 0, 0, '1733569300.jpg', 'Mens Casual Wear | Stylish Everyday Clothing for Men', 'Shop the latest mens casual wear collection with t-shirts, jeans, polos, and hoodies. Perfect for relaxed outings or daily comfort. Explore now and elevate your casual style.', 'mens casual wear, casual clothing for men, mens t-shirts, jeans for men, mens polos, stylish casual outfits, hoodies for men, everyday wear for men, relaxed mens fashion', '2024-12-07 11:01:23'),
(5, 'Womens Casual Wear', 'womens-casual-wear', 'Discover the latest collection of womens casual wear, featuring comfortable yet stylish clothing perfect for everyday wear. From casual t-shirts, jeans, and skirts to relaxed dresses, find versatile pieces that blend comfort with fashion.', 0, 0, '1733569587.jpg', 'Womens Casual Wear | Comfortable and Stylish Clothing for Women', 'Shop womens casual wear for trendy, everyday outfits. Find casual t-shirts, jeans, dresses, and skirts for a relaxed and fashionable look. Perfect for weekends and casual outings.', 'womens casual wear, casual clothing for women, womens t-shirts, casual jeans for women, womens skirts, casual dresses for women, comfortable clothing for women, womens everyday fashion', '2024-12-07 11:06:27'),
(6, 'Accessories', 'accessories', 'Discover a wide range of stylish and trendy accessories that complement your outfit and lifestyle. From bags, jewelry, watches, to hats, find the perfect pieces to enhance your look and add that finishing touch.', 0, 0, '1733988750.jpg', 'Trendy Accessories Online | Bags, Jewelry, Watches & More', '', 'accessories, bags, jewelry, watches, trendy accessories, fashion accessories, online accessories store, stylish accessories', '2024-12-12 07:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(6, 'sl2509vr', 5, 'Kalana', 'test02@gmail.com', 'vevr', '52/c Obesekara Mawatha ,daraluwa,bemmulla', 11040, 12950, 'COD', '', 0, NULL, '2024-12-06 06:03:07'),
(7, 'sl4884345', 5, 'sc', 'verv@gmail.com', '12345', 'dsvwe wvewv', 234324, 12950, 'COD', '', 1, NULL, '2024-12-06 06:08:28'),
(8, 'sl209635896471', 5, 'KalanaT', 'k@gmail.com', '0235896471', '25/n bollon baward gaj, bsat ', 11040, 7600, 'COD', '', 0, NULL, '2024-12-06 06:44:35'),
(9, 'sl4597345', 5, 'AF', 'FHG@gmail.com', '12345', 'JYHTGRFD', 435, 1900, 'COD', '', 0, NULL, '2024-12-06 09:35:46'),
(10, 'sl4545vr', 4, 'Kumuduni wipulasuriya', 'test02@gmail.com', 'vevr', '52/c Obesekara Mawatha ,daraluwa,bemmulla', 234324, 25650, 'COD', '', 2, NULL, '2024-12-06 15:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(11, 6, 3, 5, 1450, '2024-12-06 06:03:07'),
(12, 6, 5, 3, 1900, '2024-12-06 06:03:07'),
(13, 7, 3, 5, 1450, '2024-12-06 06:08:28'),
(14, 7, 5, 3, 1900, '2024-12-06 06:08:28'),
(15, 8, 5, 4, 1900, '2024-12-06 06:44:35'),
(16, 9, 5, 1, 1900, '2024-12-06 09:35:46'),
(17, 10, 10, 10, 1850, '2024-12-06 15:01:21'),
(18, 10, 5, 3, 1900, '2024-12-06 15:01:21'),
(19, 10, 8, 1, 1450, '2024-12-06 15:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `gender` varchar(191) NOT NULL,
  `color` varchar(191) NOT NULL,
  `size` varchar(255) NOT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `trending` tinyint(1) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `qty`, `gender`, `color`, `size`, `meta_keywords`, `status`, `trending`, `image`) VALUES
(10, 2, 'Tailored Fit Black Stretch Suit', 'tailored-fit-black-stretch-suit', 'A sophisticated black formal suit featuring a tailored fit for a sharp and professional look. Perfect for business meetings, formal events, and special occasions.', 'This premium black formal suit is the epitome of elegance and professionalism. Designed with precision, it includes a perfectly tailored blazer and matching trousers crafted from high-quality fabric for durability and comfort. The suit comes with a crisp white shirt and a classic black tie to complete the ensemble. Whether it is a corporate meeting, a wedding, or an upscale event, this formal suit ensures a refined appearance. The blazer features a single-breasted design with a notched lapel, while the trousers offer a slim fit for a modern silhouette. Easy to pair with polished shoes and minimal accessories, this suit is a must-have for anyone looking to make a confident statement.', 0.00, 5700.00, 10, 'Male', 'Black', 'M & L', '', 0, 1, '1733735030.jpg'),
(11, 4, 'Chaos T-Shirt', 'chaos-t-shirt', 'A premium-quality black t-shirt with a stylish \"Chaos in the Park\" design, blending comfort and fashion for everyday wear.', 'This black t-shirt is made with high-quality fabric for ultimate comfort and durability. Featuring a bold \"Chaos in the Park\" graphic design, it’s perfect for casual outings, concerts, or a laid-back day with friends. The unisex style ensures it suits anyone looking for a trendy and versatile wardrobe essential. Whether paired with jeans or shorts, this t-shirt guarantees a standout look while providing all-day comfort.', 2000.00, 1850.00, 10, 'Male', 'Black', 'S & M', 'chaos, t-shirt, unisex, trendy, black', 0, 0, '1733733481.jpg'),
(14, 3, 'Elegant Formal Suit', 'elegant-formal-suit', 'A chic and professional formal suit designed for women, perfect for business meetings and formal events.', 'This elegant womens formal suit is crafted to offer both style and sophistication. Made from premium fabric, it features a tailored fit that flatters the feminine silhouette. Ideal for business meetings, formal events, and special occasions, this suit combines elegance with comfort. The classic design includes a single-breasted blazer with notched lapels, matching trousers or a skirt, and a stylish blouse. Elevate your professional wardrobe with this timeless piece that exudes confidence and grace.', 5000.00, 4900.00, 15, 'Female', 'White', 'S', 'womens formal suit, business attire, elegant suit, womens formal wear, tailored suit, business meetings, formal events, professional attire', 0, 1, '1733740657.jpg'),
(15, 5, 'Modern Chic Attire', 'modern-chic-attire', 'A stylish and contemporary outfit perfect for various occasions, blending comfort with modern fashion.', 'This modern chic attire is designed to offer a perfect blend of style and comfort. Made from high-quality, breathable fabric, it features a contemporary design that is ideal for various occasions. Whether you are heading out for a casual outing, a weekend get-together, or a relaxed setting, this outfit ensures you look fashionable and feel comfortable. The versatile design includes a chic top paired with either comfortable trousers or a skirt, making it a must-have addition to your wardrobe. Elevate your everyday style with this fashionable and practical ensemble.', 3100.00, 2950.00, 12, 'Female', 'Red', 'S,M,L', 'modern attire, chic outfit, stylish wear, contemporary fashion, versatile clothing, comfortable fashion, trendy outfit, everyday style', 0, 1, '1733741611.jpg'),
(16, 2, 'Classic Mens Formal Pant', 'classic-mens-formal-pant', 'A timeless and sophisticated formal pant designed for men, perfect for business and formal occasions.', 'These classic mens formal pants are crafted to offer both style and comfort. Made from high-quality fabric, they feature a tailored fit that enhances your professional look. Ideal for business meetings, formal events, and special occasions, these pants combine elegance with practicality. The design includes a flat front, straight leg, and a comfortable waistband, making them a versatile addition to your formal wardrobe. Elevate your professional attire with these timeless formal pants.', 2800.00, 2500.00, 10, 'Male', 'Almond', 'S,M,L', 'mens formal pant, business attire, elegant pants, mens formal wear, tailored pants, business meetings, formal events, classic design', 0, 1, '1733742466.jpg'),
(17, 4, 'Skyshade Long-Sleeve Tee', 'skyshade-long-sleeve-tee', 'Stay stylish and comfortable with this sleek slate-gray long-sleeve top, perfect for everyday wear.', 'This slim-fit slate-gray long-sleeve tee is crafted for both style and comfort, making it the perfect choice for any casual outing. Its minimalist design pairs effortlessly with jeans, chinos, or shorts, while the soft fabric ensures all-day comfort. A versatile wardrobe essential that combines modern aesthetics with practicality', 2400.00, 2380.00, 15, 'Male', 'Sky Blue', 'S,M,L', 'long-sleeve tee, mens casual wear, slate gray top, everyday wear, stylish long-sleeve shirt, versatile mens clothing, modern casual outfit', 0, 0, '1733743184.jpg'),
(18, 5, 'PureEase Lounge Set', 'pureease-lounge-set', 'Effortless comfort meets modern style with a clean white casual set, perfect for lounging or casual outings.', 'Redefine casual wear with an all-white ensemble combining a timeless short-sleeve t-shirt with tailored shorts. Made for versatility and comfort, the outfit seamlessly transitions from relaxing at home to casual day outings. Its sleek and modern design complements a wide range of accessories and footwear for a polished yet laid-back look.', 2200.00, 2000.00, 20, 'Female', 'White', 'S,L,M', 'women casual set, white lounge set, relaxed-fit outfit, minimalist casual wear, white t-shirt and shorts, summer casual wear, modern women outfit, comfortable lounge outfit', 0, 1, '1733743469.jpg'),
(19, 4, 'Sandstone Chino Shorts', 'sandstone-chino-shorts', 'Lightweight and versatile, these neutral chino shorts offer a clean and casual look for everyday comfort.', 'Upgrade your summer wardrobe with these lightweight chino shorts in a neutral tone. Designed with a clean silhouette and functional side pockets, they pair effortlessly with t-shirts, polos, or casual shirts. Made from breathable fabric, these shorts ensure comfort throughout the day, whether youre relaxing at home or stepping out for a casual outing.', 1800.00, 1500.00, 15, 'Male', 'Cornsilk Yellow', 'S,M,L', 'men chino shorts, neutral summer shorts, lightweight shorts for men, casual men shorts, tailored fit shorts, breathable summer wear, men fashion shorts, versatile casual shorts', 0, 0, '1733751547.jpg'),
(20, 3, 'Ivory Crest Blazer', 'ivory-crest-blazer', 'A sleek and tailored white blazer that adds elegance and sophistication to any outfit.', 'This tailored white blazer is designed for effortless elegance, making it a standout addition to your wardrobe. Its double-breasted design and structured silhouette offer a modern take on classic outerwear. Perfect for both formal occasions and casual layering, the blazer provides a refined finish to dresses, trousers, or even jeans.', 5200.00, 5000.00, 11, 'Female', 'White', 'M,L', 'women white blazer, double-breasted coat, tailored outerwear, formal women coat, casual white coat, versatile blazer for women, elegant women fashion, structured women coat', 0, 1, '1733752062.jpg'),
(21, 4, 'Monochrome Maze Shirt', 'monochrome-maze-shirt', 'A bold black-and-white patterned shirt for standout style and effortless comfort.', 'Step into contemporary fashion with this bold black-and-white patterned shirt, perfect for making a statement. Featuring an abstract geometric print and crafted with lightweight, breathable fabric, this shirt ensures both comfort and style. Ideal for casual outings or evening events, it pairs seamlessly with jeans or tailored trousers for a sharp and confident look.', 2000.00, 1900.00, 20, 'Male', 'Black , White', 'S,M,L', 'black-and-white shirt, abstract pattern shirt, men casual wear, geometric print shirt, bold monochrome shirt, stylish casual shirt, lightweight printed shirt, men modern fashion', 0, 1, '1733752910.jpg'),
(22, 5, 'Monochrome Muse Shirt', 'monochrome-muse-shirt', 'A stylish black and white patterned shirt that blends comfort and modern elegance for any casual occasion.', 'Elevate your casual wardrobe with this black and white patterned shirt, featuring an artistic abstract design. Designed for both comfort and style, it is crafted from soft, breathable fabric, making it perfect for day-to-day wear or relaxed outings. Pair it with jeans or skirts for a chic, contemporary look that is versatile and timeless.', 1800.00, 1750.00, 15, 'Female', 'White', 'S, M', 'womens black and white shirt, casual monochrome shirt, abstract print top, lightweight womens shirt, patterned casual wear, modern women casual shirt, stylish black and white shirt, versatile everyday top', 0, 0, '1733889974.jpg'),
(24, 3, 'Elegant Black Womens Wear', 'elegant-black-womens-wear', 'Elegant womes formal wear in black, perfect for any occasion.', 'Discover our stunning black womens formal wear, designed to offer a perfect blend of sophistication and style. Ideal for professional settings or formal gatherings, this attire will enhance your confidence and elegance.', 3500.00, 3450.00, 15, 'Female', 'Black', 'S', 'womens formal wear, black formal wear, elegant womens attire, formal outfits for women, black formal dress', 0, 0, '1733989458.jpg'),
(25, 6, 'Acnos', 'acnos', 'Sleek black and white watches with a minimalist design, offering a perfect balance of style and practicality for any occasion.', ' These Simple Black and White Watches offer a clean and understated design, ideal for anyone who appreciates minimalism. With a modern and sleek look, these watches are perfect for both casual and formal settings. The black and white color scheme adds a sophisticated touch, making them versatile enough to pair with any outfit. Whether youre at work, out for a dinner, or attending an event, these timepieces keep you on time while complementing your personal style. Designed with durability in mind, they are the perfect blend of simplicity and functionality.', 2000.00, 1800.00, 18, 'Male', 'Black', '.', 'black and white watches, minimalist watches, modern wristwatches, simple watches for women, elegant timepieces, stylish black and white watches', 0, 1, '1733990457.jpg'),
(26, 4, 'Oversized Graphic T-Shirt', 'oversized-graphic-t-shirt', 'Bold oversized graphic t-shirt with a fun design, perfect for a relaxed, casual look.', 'This Oversized Graphic T-Shirt combines comfort with style, featuring a striking design on the back. The loose fit and soft fabric make it ideal for casual wear, whether youre hanging out with friends or enjoying a day off. The bold graphic adds personality and flair, while the high-quality material ensures comfort throughout the day. Pair it with jeans or shorts for an effortlessly cool, laid-back look. Perfect for those who want to make a statement with their casual fashion.', 2100.00, 2000.00, 15, 'Unisex', 'Gray', 'M', 'oversized graphic t-shirt, casual graphic tee, relaxed t-shirt, trendy graphic shirt, bold graphic design, comfortable oversized shirt', 0, 0, '1733990958.jpg'),
(28, 5, 'Round Neck Half Sleeve Tee', 'round-neck-half-sleeve-tee', 'Comfortable round-neck half-sleeve graphic tee with bold design, perfect for casual and stylish everyday wear.', 'This Round Neck Half Sleeve Graphic Tee combines a classic design with modern appeal. The round neck offers a comfortable fit, while the half-sleeve cut makes it a versatile choice for warm weather or layering. The bold graphic design on the front adds a touch of personality and style, making it an essential piece for any casual wardrobe. Made from soft, breathable fabric, this tee ensures comfort all day long, whether youre lounging at home or out with friends. Pair it with jeans or shorts for a simple, stylish look.', 2000.00, 1800.00, 10, 'Female', 'Yellow', 'S', 'round neck graphic tee, half sleeve t-shirt, casual graphic t-shirt, comfortable graphic tee, trendy round-neck tee, bold graphic shirt', 0, 0, '1733991807.jpg'),
(29, 3, 'Scarlet Blazer', 'scarlet-blazer', ' Bold and stylish scarlet blazer, perfect for adding a pop of color to any formal or semi-formal outfit.', 'The Scarlet Blazer is designed to make a statement with its rich red hue and tailored fit. Ideal for both professional and semi-formal occasions, this blazer adds a touch of sophistication and boldness to your wardrobe. Whether youre pairing it with trousers for a business meeting or dressing it down with jeans for a night out, its versatility ensures it will elevate any look. Crafted from high-quality fabric, this blazer provides comfort and style, making it an essential piece for fashion-forward individuals looking to stand out.', 3500.00, 3450.00, 8, 'Female', 'Red', 'M', 'scarlet blazer, red blazer, stylish blazers, formal blazers, tailored blazer, chic scarlet jacket, women’s blazers', 0, 1, '1733992338.jpg'),
(30, 6, 'Sterling Silver Ring', 'sterling-silver-ring', 'Elegant sterling silver ring, crafted to offer timeless beauty and durability for any occasion.', 'This Sterling Silver Ring is a perfect blend of sophistication and durability. Crafted with high-quality sterling silver, it features a polished finish that enhances its timeless design. Whether worn daily or for special occasions, this ring adds a touch of elegance to any outfit. Its versatile style makes it suitable for both casual and formal wear, while its lasting quality ensures it remains a cherished piece in your collection for years to come. Ideal as a gift or a personal statement piece, this ring is a must-have for those who appreciate classic beauty.', 1800.00, 1750.00, 20, 'Female', 'Silver', '.', 'sterling silver ring, elegant silver ring, high-quality silver ring, timeless sterling ring, silver jewelry, women’s sterling silver ring, durable silver ring', 0, 1, '1733992728.jpg'),
(31, 4, 'Red Track Down Jacket', 'red-track-down-jacket', ' Stylish and warm red track down jacket, perfect for cold weather while offering a sporty and trendy look.', 'The Red Track Down Jacket is designed for both warmth and style. Filled with high-quality down insulation, this jacket offers superior warmth while remaining lightweight and breathable. The bold red color adds a pop of vibrancy to your outdoor attire, making it perfect for cold weather activities or casual wear. Whether you\'re hitting the trails, heading out for a winter jog, or simply looking to stay warm during colder months, this jacket combines function and fashion seamlessly. With its sporty design and durable construction, it’s an essential piece for your winter wardrobe.', 3650.00, 3600.00, 10, 'Male', 'Red', 'L', 'red track down jacket, winter down jacket, sporty down jacket, warm red jacket, outdoor down jacket, cold weather jacket, insulated track jacket', 0, 1, '1733994149.jpg'),
(32, 4, 'Fear Of God Essentials Mockneck', ' fear-of-god-essentials-mockneck', 'Premium Fear Of God Essentials relaxed mockneck in light oatmeal, offering a blend of comfort and minimalistic style for a casual yet sophisticated look.', ' The Fear Of God Essentials Relaxed Mockneck in Light Oatmeal (SS22) is designed for those who appreciate high-quality, effortless style. This mockneck sweater features a relaxed fit for maximum comfort, perfect for layering or wearing on its own. The soft light oatmeal color adds a subtle elegance, while the mockneck provides warmth and a modern silhouette. Made with attention to detail and craftsmanship, this piece from the SS22 collection combines streetwear aesthetics with luxury materials, making it a versatile addition to any wardrobe. Whether for casual outings or relaxed workdays, this mockneck offers both comfort and sophistication.', 3400.00, 3350.00, 12, 'Male', 'White', 'M', 'Fear Of God Essentials mockneck, relaxed mockneck, SS22 collection, light oatmeal mockneck, luxury streetwear, comfortable mockneck sweater, minimalist mockneck', 0, 1, '1733995254.jpg'),
(33, 2, 'Modafe Men’s Slim Fit Pant', 'modafe-mens-slim-fit-pant', 'Stylish and modern Modafe men’s slim fit pant, designed for a sleek silhouette and ultimate comfort.', 'The Modafe Men’s Slim Fit Pant is crafted to offer a sharp and contemporary look, featuring a tailored slim fit that enhances your figure while ensuring comfort. Made with high-quality materials, these pants provide a perfect balance of style and durability, ideal for both formal and casual settings. The versatile design pairs well with shirts or casual tees, making them a great option for both workdays and weekend outings. Whether you\'re dressing up or down, these slim fit pants will give you a polished and refined look.', 3000.00, 2900.00, 15, 'Male', 'Black', 'S', 'Modafe slim fit pant, men’s slim pants, stylish slim pants, modern men’s pants, tailored pants, slim fit trousers, men’s casual slim fit', 0, 1, '1733996262.jpg'),
(34, 5, 'Women\'s Long Sleeve Shirt', 'womens-long-sleeve-shirt', 'Classic and versatile women’s long sleeve shirt, perfect for both casual and formal occasions.', 'The Women’s Long Sleeve Shirt is a timeless wardrobe staple that combines comfort and style. Made from soft, breathable fabric, this shirt offers a flattering fit and versatile design that can easily be dressed up or down. Whether paired with jeans for a casual look or tucked into a skirt or trousers for a more formal setting, this shirt adapts to any occasion. The long sleeves provide extra warmth and coverage, making it a great option for cooler weather. Its simple yet elegant design ensures it will remain a favorite in your wardrobe for years to come.', 2000.00, 2000.00, 18, 'Female', 'White', 'S', 'women’s long sleeve shirt, classic women’s shirt, versatile shirt for women, long sleeve blouse, casual women’s shirt, women’s formal shirt, comfortable long sleeve shirt', 0, 0, '1733996739.jpg'),
(35, 5, 'Cotton Round Neck T-Shirt', 'cotton-round-neck-t-shirt', 'Soft and breathable cotton round neck t-shirt, designed for comfort and everyday wear.', ' The Cotton Round Neck T-Shirt is a must-have essential in any wardrobe. Made from 100% high-quality cotton, it offers a soft, breathable feel that ensures comfort throughout the day. The classic round neck design provides a timeless, versatile look that pairs easily with jeans, shorts, or skirts. Ideal for casual outings, workouts, or lounging at home, this t-shirt is perfect for all-day wear. Its simple yet stylish design makes it easy to layer with jackets or sweaters, making it a versatile piece for every season.', 1800.00, 1450.00, 10, 'Unisex', 'Red', 'M', 'cotton round neck t-shirt, breathable cotton t-shirt, casual round neck shirt, comfortable cotton tee, basic cotton shirt, everyday wear t-shirt, soft cotton tee', 0, 0, '1733997135.jpg'),
(36, 3, 'Women Blazer Rena', 'women-blazer-rena', 'Stylish and sophisticated women’s blazer Rena, designed for a chic and modern look.', 'The Women Blazer Rena offers a sleek and elegant silhouette, perfect for both professional and evening wear. Crafted with attention to detail, this blazer provides a tailored fit that enhances your shape while ensuring comfort throughout the day. Its versatile design makes it an excellent choice for office meetings, formal events, or dressing up a casual outfit. The high-quality fabric offers both durability and style, while the sharp lines and refined cut give it a sophisticated touch. Available in classic colors, this blazer is a must-have piece in any modern woman’s wardrobe.', 4500.00, 4350.00, 8, 'Male', 'Brown', 'M', 'women’s blazer Rena, stylish women’s blazer, tailored women’s blazer, modern women’s jacket, chic women’s blazer, formal women’s blazer, professional women’s blazer', 0, 0, '1733997368.jpg'),
(37, 6, 'Bamboo Wood Watch', 'bamboo-wood-watch', 'Eco-friendly and stylish bamboo wood watch, offering a unique and sustainable look for any occasion.', 'The Bamboo Wood Watch is a perfect combination of nature and craftsmanship. Made from high-quality, eco-friendly bamboo, this watch offers a distinctive design that is both lightweight and durable. The natural wood texture gives each piece a one-of-a-kind look, while the sleek, minimalist design ensures it pairs well with any outfit. Ideal for those who appreciate sustainable fashion, this bamboo watch is not only a stylish accessory but also a statement of environmental consciousness. Whether worn casually or for special occasions, it adds a touch of elegance and nature to your wrist.', 2500.00, 2000.00, 15, 'Unisex', 'Brown', '.', 'bamboo wood watch, eco-friendly watch, sustainable watch, wooden watch, natural wood watch, unique bamboo timepiece, stylish wooden wristwatch', 0, 1, '1733997582.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `review_text`, `rating`, `created_at`) VALUES
(1, 22, 5, 'I had such a great experience shopping at [Your Shop Name]! The clothes are absolutely beautiful, and the quality is top-notch. I was looking for a stylish yet comfortable outfit for a night out, and I found exactly what I needed. The staff was incredibly helpful, offering personalized suggestions based on my style, and I really appreciated how they made me feel welcomed. Plus, the store has a great variety of sizes, so everyone can find something perfect for them. I’m definitely coming back for more!', 4, '2024-12-11 23:22:02'),
(4, 22, 5, 'I had such a great experience shopping at [Your Shop Name]! The clothes are absolutely beautiful, and the quality is top-notch. I was looking for a stylish yet comfortable outfit for a night out, and I found exactly what I needed. The staff was incredibly helpful, offering personalized suggestions based on my style, and I really appreciated how they made me feel welcomed. Plus, the store has a great variety of sizes, so everyone can find something perfect for them. I’m definitely coming back for more!', 4, '2024-12-11 23:26:19'),
(5, 22, 5, 'I had such a great experience shopping at [Your Shop Name]! The clothes are absolutely beautiful, and the quality is top-notch. I was looking for a stylish yet comfortable outfit for a night out, and I found exactly what I needed. The staff was incredibly helpful, offering personalized suggestions based on my style, and I really appreciated how they made me feel welcomed. Plus, the store has a great variety of sizes, so everyone can find something perfect for them. I’m definitely coming back for more!', 4, '2024-12-11 23:28:49'),
(6, 22, 5, 'I had such a great experience shopping at [Your Shop Name]! The clothes are absolutely beautiful, and the quality is top-notch. I was looking for a stylish yet comfortable outfit for a night out, and I found exactly what I needed. The staff was incredibly helpful, offering personalized suggestions based on my style, and I really appreciated how they made me feel welcomed. Plus, the store has a great variety of sizes, so everyone can find something perfect for them. I’m definitely coming back for more!', 4, '2024-12-11 23:30:19'),
(7, 22, 5, 'I had such a great experience shopping at [Your Shop Name]! The clothes are absolutely beautiful, and the quality is top-notch. I was looking for a stylish yet comfortable outfit for a night out, and I found exactly what I needed. The staff was incredibly helpful, offering personalized suggestions based on my style, and I really appreciated how they made me feel welcomed. Plus, the store has a great variety of sizes, so everyone can find something perfect for them. I’m definitely coming back for more!', 4, '2024-12-11 23:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(4, 'Admin', 'admin@gmail.com', 776243235, 'admin123', 1, '2024-11-29 16:01:12'),
(5, 'Kalana', 'usertest@gmail.com', 118043256, '1112', 0, '2024-11-29 18:30:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
