<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offers: SILVERWOOD - Luxary Villa at Lonavala</title>
    <meta name="description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <meta name="keywords" content="SILVERWOOD, luxary, villa, lonavala villa, vacation, enjoyment, bungalow, rent">
    <!-- Facebook og -->
    <meta property="og:title" content="Offers: SILVERWOOD - Luxary Villa at Lonavala">
    <meta property="og:description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="SILVERWOOD - Luxary Villa at Lonavala">
    <meta property="og:type" content="website" />
    <meta name="Distribution" content="Global">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="7 days">
    <meta name="language" content="en-us">
    <?php require("required/header.php"); ?>
    <link rel="stylesheet" href="assets/css/hover-box.css" />
</head>

<body>
    <?php require("required/menu.php"); ?>
    <!-- Amenities -->
    <section class="amenities wow zoomIn">
        <h1>OFFERS AT SILVERWOOD</h1>
        <h2>Guest Reward Programmes</h2>
        <hr>
        <div class="container">
            <div class="row">
                <?php
                $sql = "SELECT * FROM `offer`";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-4 col-sm-12 h-100">
                        <div class="card equilize p-2 mt-2">
                            <div class="card-body text-center">
                                <h4 class="card-title text-warning"><a> <i class="fas fa-crown"></i> <?= $row['title']; ?></a></h4>
                                <hr>
                                <p class="card-text"><?= $row['offer']; ?></p>
                                <div class="text-center">
                                    <a href="contact" class="btn btn-warning"> <i class="fas fa-wallet"></i> Grab Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Amenities -->

    <?php require("required/footer.php"); ?>
</body>

</html>