<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testimonials: SILVERWOOD - Luxary Villa at Lonavala</title>
    <meta name="description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <meta name="keywords" content="SILVERWOOD, luxary, villa, lonavala villa, vacation, enjoyment, bungalow, rent">
    <!-- Facebook og -->
    <meta property="og:title" content="Testimonials: SILVERWOOD - Luxary Villa at Lonavala">
    <meta property="og:description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="SILVERWOOD - Luxary Villa at Lonavala">
    <?php require("required/header.php"); ?>
</head>

<body>

    <?php require("required/menu.php"); ?>
    <section class="amenities wow zoomIn">
        <h1>What our Guests say about us?</h1>
        <h2>Every Review matters</h2>
        <hr>
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    $sql = "SELECT * FROM `testimonial`";
                    $result = $mysqli->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <div class="swiper-slide grey lighten-5 px-5 pb-5">
                            <?= $row['testimonial']; ?>
                        </div>
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
        </div>
    </section>
    <!-- End Amenities -->
    <?php require("required/footer.php"); ?>
</body>

</html>