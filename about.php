<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About: SILVERWOOD - Luxary Villa at Lonavala</title>
    <meta name="description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <meta name="keywords" content="SILVERWOOD, luxary, villa, lonavala villa, vacation, enjoyment, bungalow, rent">
    <!-- Facebook og -->
    <meta property="og:title" content="About: SILVERWOOD - Luxary Villa at Lonavala">
    <meta property="og:description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <!--  Non-Essential, But Recommended -->
    <meta property="og:site_name" content="SILVERWOOD - Luxary Villa at Lonavala">
    <?php require('./required/header.php') ?>
</head>

<body>
    <?php require('./required/menu.php') ?>
    <!-- Section One -->
    <section class="amenities wow zoomIn">
        <h1>ABOUT US</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 w-100 h-100">
                    <?php
                    $sql = "SELECT `aboutImage` FROM `about` WHERE `id` = '1'";
                    $result1 = $mysqli->query($sql);
                    $row = $result1->fetch_assoc();
                    ?>
                    <img src="assets/img/<?= $row['aboutImage'] ?>" alt="Welcome" class="about-img">
                </div>
                <div class="col-md-8 text-justify">
                    <br>
                    <?php
                    $sql = "SELECT `aboutContent` FROM `about` WHERE `id` = '1'";
                    $result1 = $mysqli->query($sql);
                    $row = $result1->fetch_assoc();
                    ?>
                    <?= $row['aboutContent'] ?>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section One -->

    <!-- Section Two -->
    <section class="enquiry-form wow fadeInUp">
        <h1>INTUITIVE SERVICE</h1>
        <hr>
        <div class="container text-justify white-text">
            <?php
            $sql = "SELECT `aboutContent` FROM `about` WHERE `id` = '2'";
            $result1 = $mysqli->query($sql);
            $row = $result1->fetch_assoc();
            ?>
            <?= $row['aboutContent'] ?>
        </div>
    </section>
    <!-- End Section One -->

    <!-- Section Three -->
    <section class="amenities cardSection wow zoomIn">
        <h1>CORE VALUES OF SILVERWOOD</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $sql = "SELECT `aboutContent` FROM `about` WHERE `id` = '3'";
                    $result1 = $mysqli->query($sql);
                    $row = $result1->fetch_assoc();
                    ?>
                    <?= $row['aboutContent'] ?>
                </div>
                <?php
                $sql = "SELECT `aboutCardTitle`, `aboutCards` FROM `about`";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-10 offset-1 p-2">
                        <div class="card p-4 rounded-more equilizes text-center">
                            <h4 class="text-Silver mt-2"><?= $row['aboutCardTitle'] ?></h4>
                            <hr class="mx-auto">
                            <p class="text-indent"><?= $row['aboutCards'] ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- End Section One -->


    <br><br>
    <?php require('./required/footer.php') ?>
</body>

</html>