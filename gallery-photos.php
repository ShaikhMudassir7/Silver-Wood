<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gallery: SILVERWOOD - Luxary Villa at Lonavala</title>
        <meta name="description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
        <meta name="keywords" content="SILVERWOOD, luxary, villa, lonavala villa, vacation, enjoyment, bungalow, rent">
        <!-- Facebook og -->
        <meta property="og:title" content="Gallery: SILVERWOOD - Luxary Villa at Lonavala">
        <meta property="og:description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
        <!--  Non-Essential, But Recommended -->
        <meta property="og:site_name" content="SILVERWOOD - Luxary Villa at Lonavala">
        <?php require("required/header.php"); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.0/css/lightgallery.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.7.0/css/lightgallery.css" />
        <link rel="stylesheet" href="assets/css/hover-box.css" />
    </head>

<body>

    <?php require("required/menu.php");
    if (isset($_GET['album']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
        $albumID = $_GET['id'];
    } else {
        echo "<script>window.location.assign('gallery.php')</script>";
        exit();
    }
    ?>

    <section class="amenities gallery wow zoomIn">
        <h1>BEAUTY OF SILVERWOOD</h1>
        <h2>Real Photographs of the Villa</h2>
        <div class="container">
            <div class="container text-center mt-2">
                <a href="gallery" class="btn btn-warning btn-lg"><i class="fas fa-angle-double-left"></i> View Other Albums </a>
            </div>
            <div class="row mt-5 ">
                <div id="animated-thumbnails">
                    <?php
                    $sql = "SELECT * FROM `image` WHERE `category` = $albumID";
                    $result = $mysqli->query($sql);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <a href="assets/img/image/<?= $row['image']; ?>"><img src="assets/img/thumb/<?= $row['image']; ?>"  alt="SILVERWOOD" /></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="container text-center mt-2">
                <a href="gallery" class="btn btn-warning btn-lg"><i class="fas fa-angle-double-left"></i> View Other Albums </a>
            </div>
        </div>
    </section>

    <?php require("required/footer.php"); ?>
</body>

</html>