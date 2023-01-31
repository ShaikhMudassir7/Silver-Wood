<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SILVERWOOD - 6 Bedroom Luxury Villa with a Private Pool in Lonavala</title>
    <meta name="description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <meta name="keywords" content="SILVERWOOD, luxary, villa, lonavala villa, vacation, enjoyment, bungalow, rent">
    <!-- Facebook og -->
    <meta property="og:title" content="SILVERWOOD - 6 Bedroom Luxury Villa with a Private Pool in Lonavala">
    <meta property="og:description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="SILVERWOOD - Luxary Villa at Lonavala">
    <?php require('./required/header.php') ?>
</head>

<body>

    <?php require('./required/menu.php') ?>
    <!--  Slider -->
    <section class="slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $sql = "SELECT * FROM `index_carousel` WHERE `isDeleted`= '0'";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) { ?>
                    <div class="swiper-slide"> <img src="assets/img/slider/<?= $row['imageName'] ?>" class="slider-image" alt="#"> </div>
                <?php
                }
                ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- End Slider -->

    <!-- Amenities FOR PC-->
    <section class="amenities wow zoomIn d-none d-md-block">
        <h1>WELCOME TO SILVERWOOD</h1>
        <h2>Luxury Redefined</h2>
        <hr>
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="fas fa-bed"></i>
                                <h4>6 Master Bedrooms</h4>
                                <hr>
                                <p>Air conditioned with an attached balcony</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="fas fa-couch"></i>
                                <h4>Spacious Living Room</h4>
                                <hr>
                                <p>Sofa Set | Dining Area | Fully Air Conditioned</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="fas fa-users"></i>
                                <h4>25-30 guests</h4>
                                <hr>
                                <p>Suitable for family, friends and corporate getaways</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-swimming-pool"></i>
                                <h4>Private Swimming Pool</h4>
                                <hr>
                                <p>Full size | Waterfall | Patio loungers | Underwater LED Lighting</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/meal.svg" class="icon-image" alt="">
                                <h4>Meals</h4>
                                <hr>
                                <p>Vegetarian | Non-Vegetarian | Jain <br> Meal Plan (Breakfast, Lunch, High Tea, Dinner)</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-music"></i>
                                <h4>Music System</h4>
                                <hr>
                                <p>Bluetooth, USB &amp; AUX connectivity | Karaoke</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-wifi"></i>
                                <h4>High-Speed WiFi</h4>
                                <hr>
                                <p>Speed upto 30 MBPS</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-tv"></i>
                                <h4>Smart Television</h4>
                                <hr>
                                <p>Full HD 50 inch LED</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-blog"></i>
                                <h4>Online Streaming</h4>
                                <hr>
                                <p>Netflix | Disney + Hotstar | Amazon Prime</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-drumstick-bite"></i>
                                <h4>Barbeque</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/hookah.svg" class="icon-image" alt="">
                                <h4>Sheesha</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fab fa-free-code-camp"></i>
                                <h4>Bonfire</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/water-bottle.svg" class="icon-image" alt="">
                                <h4>Packaged Drinking Water</h4>
                                <hr>
                                <p>Complimentary</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/staff.svg" class="icon-image" alt="">
                                <h4>Concierge and Housekeeping Staff</h4>
                                <hr>
                                <p>Professional, Highly trained & Experienced</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-book-reader"></i>
                                <h4>Mini-Library</h4>
                                <hr>
                                <p>Fiction | Biography | Children | Fantasy</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-chess-king"></i>
                                <h4>Indoor Activities</h4>
                                <hr>
                                <p>Carrom | Chess | UNO | Jenga | Scrabble | Monopoly</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-futbol"></i>
                                <h4>Outdoor Sports</h4>
                                <hr>
                                <p>Cricket Kit | Badminton Set | Football</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-cocktail"></i>
                                <h4>Mocktails on arrival</h4>
                                <hr>
                                <p>Piña Colada | Mojito | Blue Curaçao</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fab fa-buffer"></i>
                                <h4>High quality Mattresses, Towels and Linens</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-parking"></i>
                                <h4>Secure Car Park</h4>
                                <hr>
                                <p>Under CCTV Surveillance</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-user-lock"></i>
                                <h4>24×7 Security</h4>
                                <hr>
                                <p>CCTV Cameras | Security Guard | Fire Extinguishers</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-phone-volume"></i>
                                <h4>Intercom</h4>
                                <hr>
                                <p>Room to Room | Room to Housekeeping</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-building"></i>
                                <h4>Terrace</h4>
                                <hr>
                                <p>Large sit out area on Level 1</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-restroom"></i>
                                <h4>8 Washrooms</h4>
                                <hr>
                                <p>Modern fittings and amenities</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-paw"></i>
                                <h4>Pet friendly</h4>
                                <hr>
                                <p>We love our four-legged friends</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-ban"></i>
                                <h4>Swimming pool timings</h4>
                                <hr>
                                <p>No restriction</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-birthday-cake"></i>
                                <h4>Events, Functions and Parties</h4>
                                <hr>
                                <p>Planning | Organizing | Execution</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-utensils"></i>
                                <h4>Fully stocked Kitchen</h4>
                                <hr>
                                <p>Refrigerator | Microwave | Cookware | Gas Stove & Cyinder</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/toiletries.svg" class="icon-image" alt="">
                                <h4>Toiletries<br><small>Ignis Range by Five Elements&reg;</small></h4>
                                <hr>
                                <p class="text-sm">Shampoo | Hair Conditioner | Body Lotion | Soap | Comb | Dental Kit | Hand Wash<br>Paraben Free | PETA Certified | Vegan | ISO 22716 GMP | FDA Approved</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-person-booth"></i>
                                <h4>Wardrobes and garment hangers</h4>
                                <hr>
                                <p>In all bedrooms</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-first-aid"></i>
                                <h4>First Aid kit</h4>
                                <hr>
                                <p>Emergency supplies</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fab fa-buffer"></i>
                                <h4>Extra Mattresses</h4>
                                <hr>
                                <p>For additional guests</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-user-md"></i>
                                <h4>Doctor on call</h4>
                                <hr>
                                <p>24×7</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-car"></i>
                                <h4>Airport Transfers</h4>
                                <hr>
                                <p>Pickup and drop off services</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-handshake"></i>
                                <h4>24×7 Guest Care</h4>
                                <hr>
                                <p>+91 9667555554</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-hotel"></i>
                                <h4>Driver's Quarters</h4>
                                <hr>
                                <p>Accommodation | Meals</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-ruler-combined"></i>
                                <h4>Total area spread over</h4>
                                <hr>
                                <p>8,000 sq feet</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-clock"></i>
                                <h4>Check-in and Check-Out Timings</h4>
                                <hr>
                                <p>Flexible</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/inverter.svg" class="icon-image" alt="">
                                <h4>Inverter</h4>
                                <hr>
                                <p>Incase of electric cut-out</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-virus"></i>
                                <h4>Covid-19 Safety Practices</h4>
                                <hr>
                                <p>WHO Recommended</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <i class="icon fas fa-user-tie"></i>
                                <h4>In House Caretaker</h4>
                                <hr>
                                <p>24 Hours</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/laundry.svg" class="icon-image" alt="">
                                <h4>Laundry & Dry Cleaning Services</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/water-purifier.svg" class="icon-image" alt="">
                                <h4>UV Water Purifier</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Amenities -->

    <!-- Amenities FOR MOBILE -->
    <section class="amenities wow zoomIn d-block d-md-none">
        <h1>WELCOME TO SILVERWOOD</h1>
        <h2>Luxury Redefined</h2>
        <hr>
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="fas fa-bed"></i>
                                <h4>6 Master Bedrooms</h4>
                                <hr>
                                <p>Air conditioned with an attached balcony</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="fas fa-couch"></i>
                                <h4>Spacious Living Room</h4>
                                <hr>
                                <p>Sofa Set | Dining Area | Fully Air Conditioned</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="fas fa-users"></i>
                                <h4>25-30 guests</h4>
                                <hr>
                                <p>Suitable for family, friends and corporate getaways</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-swimming-pool"></i>
                                <h4>Private Swimming Pool</h4>
                                <hr>
                                <p>Full size | Waterfall | Patio loungers | Underwater LED Lighting</p>
                            </div>
                            <div class="col-12 amenity">
                                <img src="assets/icons/meal.svg" class="icon-image" alt="">
                                <h4>Meals</h4>
                                <hr>
                                <p>Vegetarian | Non-Vegetarian | Jain <br> Meal Plan (Breakfast, Lunch, High Tea, Dinner)</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-music"></i>
                                <h4>Music System</h4>
                                <hr>
                                <p>Bluetooth, USB &amp; AUX connectivity | Karaoke</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-wifi"></i>
                                <h4>High-Speed WiFi</h4>
                                <hr>
                                <p>Speed upto 30 MBPS</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-tv"></i>
                                <h4>Smart Television</h4>
                                <hr>
                                <p>Full HD 50 inch LED</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-blog"></i>
                                <h4>Online Streaming</h4>
                                <hr>
                                <p>Netflix | Disney + Hotstar | Amazon Prime</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-drumstick-bite"></i>
                                <h4>Barbeque</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-12 amenity">
                                <img src="assets/icons/hookah.svg" class="icon-image" alt="">
                                <h4>Sheesha</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fab fa-free-code-camp"></i>
                                <h4>Bonfire</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <img src="assets/icons/water-bottle.svg" class="icon-image" alt="">
                                <h4>Packaged Drinking Water</h4>
                                <hr>
                                <p>Complimentary</p>
                            </div>
                            <div class="col-12 amenity">
                                <img src="assets/icons/staff.svg" class="icon-image" alt="">
                                <h4>Concierge and Housekeeping Staff</h4>
                                <hr>
                                <p>Professional, Highly trained & Experienced</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-book-reader"></i>
                                <h4>Mini-Library</h4>
                                <hr>
                                <p>Fiction | Biography | Children | Fantasy</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-chess-king"></i>
                                <h4>Indoor Activities</h4>
                                <hr>
                                <p>Carrom | Chess | UNO | Jenga | Scrabble | Monopoly</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-futbol"></i>
                                <h4>Outdoor Sports</h4>
                                <hr>
                                <p>Cricket Kit | Badminton Set | Football</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-cocktail"></i>
                                <h4>Mocktails on arrival</h4>
                                <hr>
                                <p>Piña Colada | Mojito | Blue Curaçao</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fab fa-buffer"></i>
                                <h4>High quality Mattresses, Towels and Linens</h4>
                                <hr>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-parking"></i>
                                <h4>Secure Car Park</h4>
                                <hr>
                                <p>Under CCTV Surveillance</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-user-lock"></i>
                                <h4>24×7 Security</h4>
                                <hr>
                                <p>CCTV Cameras | Security Guard | Fire Extinguishers</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-phone-volume"></i>
                                <h4>Intercom</h4>
                                <hr>
                                <p>Room to Room | Room to Housekeeping</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-building"></i>
                                <h4>Terrace</h4>
                                <hr>
                                <p>Large sit out area on Level 1</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-restroom"></i>
                                <h4>8 Washrooms</h4>
                                <hr>
                                <p>Modern fittings and amenities</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-paw"></i>
                                <h4>Pet friendly</h4>
                                <hr>
                                <p>We love our four-legged friends</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-ban"></i>
                                <h4>Swimming pool timings</h4>
                                <hr>
                                <p>No restriction</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-birthday-cake"></i>
                                <h4>Events, Functions and Parties</h4>
                                <hr>
                                <p>Planning | Organizing | Execution</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-utensils"></i>
                                <h4>Fully stocked Kitchen</h4>
                                <hr>
                                <p>Refrigerator | Microwave | Cookware | Gas Stove & Cyinder</p>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6">
                                <img src="assets/icons/toiletries.svg" class="icon-image" alt="">
                                <h4>Toiletries<br><small>Ignis Range by Five Elements&reg;</small></h4>
                                <hr>
                                <p class="text-sm">Shampoo | Hair Conditioner | Body Lotion | Soap | Comb | Dental Kit | Hand Wash<br>Paraben Free | PETA Certified | Vegan | ISO 22716 GMP | FDA Approved</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-person-booth"></i>
                                <h4>Wardrobes and garment hangers</h4>
                                <hr>
                                <p>In all bedrooms</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-first-aid"></i>
                                <h4>First Aid kit</h4>
                                <hr>
                                <p>Emergency supplies</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fab fa-buffer"></i>
                                <h4>Extra Mattresses</h4>
                                <hr>
                                <p>For additional guests</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-user-md"></i>
                                <h4>Doctor on call</h4>
                                <hr>
                                <p>24×7</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-car"></i>
                                <h4>Airport Transfers</h4>
                                <hr>
                                <p>Pickup and drop off services</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-handshake"></i>
                                <h4>24×7 Guest Care</h4>
                                <hr>
                                <p>+91 9667555554</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-hotel"></i>
                                <h4>Driver's Quarters</h4>
                                <hr>
                                <p>Accommodation | Meals</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-ruler-combined"></i>
                                <h4>Total area spread over</h4>
                                <hr>
                                <p>8,000 sq feet</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-clock"></i>
                                <h4>Check-in and Check-Out Timings</h4>
                                <hr>
                                <p>Flexible</p>
                            </div>
                            <div class="col-12 amenity">
                                <img src="assets/icons/inverter.svg" class="icon-image" alt="">
                                <h4>Inverter</h4>
                                <hr>
                                <p>Incase of electric cut-out</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <i class="icon fas fa-virus"></i>
                                <h4>Covid-19 Safety Practices</h4>
                                <hr>
                                <p>WHO Recommended</p>
                            </div>
                            <div class="col-12 amenity">
                                <i class="icon fas fa-user-tie"></i>
                                <h4>In House Caretaker</h4>
                                <hr>
                                <p>24 Hours</p>
                            </div>
                            <div class="col-12 amenity">
                                <img src="assets/icons/laundry.svg" class="icon-image" alt="">
                                <h4>Laundry & Dry Cleaning Services</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide grey lighten-5">
                        <div class="row container-fluid">
                            <div class="col-12 amenity">
                                <img src="assets/icons/water-purifier.svg" class="icon-image" alt="">
                                <h4>UV Water Purifier</h4>
                                <hr>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Amenities -->


    <section class="enquiry-form" id="enquiryForm">
        <h1 class="mt-4">Interested to make your life memorable with SILVERWOOD?</h1>
        <h2 class="text-white">Fill the below details and our support team will contact you soon</h2>
        <div class="container-fluid wow fadeInUp">
            <div class="col-md-6 offset-md-3 mt-4">
                <form class="border border-white p-3 text-white" method="POST">
                    <p class="h4 mb-4 text-center">Enquiry Form</p>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control mb-4 text-capitalize" placeholder="Full Name" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Phone:</label>
                            <input type="tel" id="phone" name="phone" class="form-control mb-4 numberOnly" pattern="[0-9]*" placeholder="Contact Number" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="guests">No. of Guests:</label>
                            <input type="tel" id="guests" name="guests" class="form-control mb-4 numberOnly" placeholder="No. of Guests" value="1">
                        </div>
                        <div class="col-lg-6">
                            <label for="checkin">Check-In Date:</label>
                            <input type="text" id="checkin" name="checkin" class="datepicker form-control mb-4" autcomplete="off">
                        </div>
                        <div class="col-lg-6">
                            <label for="checkout">Check-Out Date:</label>
                            <input type="text" id="checkout" name="checkout" class="datepicker form-control mb-4" autcomplete="off">
                        </div>
                        <div class="col-lg-12">
                            Amenities: <br>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="aminity[]" id="aminity1" value="Meals">
                                <label class="custom-control-label" for="aminity1">Meals</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="aminity[]" id="aminity2" value="Barbeque">
                                <label class="custom-control-label" for="aminity2">Barbeque</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="aminity[]" id="aminity3" value="Sheesha">
                                <label class="custom-control-label" for="aminity3">Sheesha</label>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" class="form-control mb-4" placeholder="Type your message here..."></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-warning my-4" type="submit" name="ezdehaar"> <i class="fas fa-paper-plane"></i> Send Enquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    if (isset($_POST['ezdehaar'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $guests = $_POST['guests'];
        $checkin = $_POST['checkin'];
        $checkin1 = date("Y-m-d", strtotime($checkin));
        $checkout = $_POST['checkout'];
        $checkout1 = date("Y-m-d", strtotime($checkout));
        $aminity = $_POST['aminity'];
        $aminity1 = implode(",", $aminity);
        $message = $_POST['message'];
        $sql = "INSERT INTO `enquiry_form`(`name`, `phoneNumber`, `noOfGuests`, `checkInDate`, `checkOutDate`, `ameneties`, `message`) VALUES ('$name','$phone','$guests','$checkin1','$checkout1','$aminity1','$message')";
        $result = $mysqli->query($sql);
    }
    ?>
    <section class="amenities gallery">
        <h1>BEAUTY OF SILVERWOOD</h1>
        <h2>Live the moment, create memories and cherish them forever!</h2>
        <div class="container wow zoomIn">
            <div class="row mt-5">
                <div class="col-md-8 offset-md-2">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php
                        $sql = "SELECT * FROM `index_iframe` WHERE`isDeleted` = '0'";
                        $result = $mysqli->query($sql);
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <iframe class="embed-responsive-item" src="<?= $row['iframePath'] ?>" allowfullscreen></iframe>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="container text-center mt-2">
                <a href="gallery" class="btn btn-warning btn-lg">View Photos <i class="fas fa-angle-double-right"></i></a>
            </div>
        </div>
    </section>
    <br><br>
    <?php require('./required/footer.php') ?>
</body>

</html>