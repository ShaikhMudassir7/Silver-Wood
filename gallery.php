<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <?php require("required/menu.php"); ?>
    <section class="amenities gallery wow zoomIn">
        <h1>BEAUTY OF SILVERWOOD</h1>
        <h2>Real Photographs of the Villa</h2>
        <div class="container">
            <div class="row mt-5">
                <?php
                $sql = "SELECT * FROM `album`";
                $result = $mysqli->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-md-4 col-sm-12 p-1 h-100">
                        <div class="hvrbox">
                            <img src="assets/img/album/<?= $row['image']; ?>" alt="<?= $row['name']; ?>" class="hvrbox-layer_bottom">
                            <div class="hvrbox-layer_top hvrbox-layer_scale">
                                <div class="hvrbox-text"> <a href="gallery-photos?album=<?= $row['name']; ?>&id=<?= $row['id']; ?>"><?= $row['name']; ?> <i class="fas fa-angle-double-right"></i></a> </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php require("required/footer.php"); ?>

</body>

</html>