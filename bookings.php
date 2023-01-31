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
    <?php require('./required/header.php') ?>
</head>

<body>
    <?php require('./required/menu.php') ?>
    <!-- Amenities -->
    <section class="amenities wow zoomIn">
        <h1>OFFERS AT SILVERWOOD</h1>
        <h2>Packages</h2>
        <hr>
        <div class="container">
            <div class="row">
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>




                <div class="col-md-4 col-sm-12 h-100">
                    <div class="card equilize p-2 mt-2" style="height: 300.141px;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning"><a> <i class="fas fa-crown"></i> Package 1</a></h4>
                            <hr>
                            <p class="card-text">Rs. 2000</p>
                            <div class="text-center">
                                <input type="textbox" name="amt" id="amt" value="2000" hidden />
                                <a class="btn btn-warning waves-effect waves-light" id="btn" onclick="pay_now()"> <i class=" fas fa-wallet"></i> Grab Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 h-100">
                    <div class="card equilize p-2 mt-2" style="height: 300.141px;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning"><a> <i class="fas fa-crown"></i>Package 2</a></h4>
                            <hr>
                            <p class="card-text">Rs. 1500</p>
                            <div class="text-center">
                                <input type="textbox" name="amt" id="amts" value="1500" hidden />
                                <a class="btn btn-warning waves-effect waves-light" id="btn" onclick="pay_nows()"> <i class=" fas fa-wallet"></i> Grab Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 h-100">
                    <div class="card equilize p-2 mt-2" style="height: 300.141px;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning"><a> <i class="fas fa-crown"></i>Package 3</a></h4>
                            <hr>
                            <p class="card-text">Rs. 1000</p>
                            <div class="text-center">
                                <input type="textbox" name="amt" id="amtss" value="1000" hidden />
                                <a class="btn btn-warning waves-effect waves-light" id="btn" onclick="pay_nowss()"> <i class=" fas fa-wallet"></i> Grab Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function pay_now() {
                        var amt = jQuery('#amt').val();
                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "amt=" + amt,
                            success: function(result) {
                                var options = {
                                    "key": "rzp_test_w6OJgfdpAVZBBK",
                                    "amount": amt * 100,
                                    "currency": "INR",
                                    "name": "SILVERWOOD",
                                    "description": "Test Transaction",
                                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                                    "handler": function(response) {
                                        jQuery.ajax({
                                            type: 'post',
                                            url: 'payment_process.php',
                                            data: "payment_id=" + response.razorpay_payment_id,
                                            success: function(result) {
                                                window.location.href = "thank_you.php";
                                            }
                                        });
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.open();
                            }
                        });


                    }

                    function pay_nows() {
                        var amt = jQuery('#amts').val();

                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "amt=" + amt,
                            success: function(result) {
                                var options = {
                                    "key": "rzp_test_w6OJgfdpAVZBBK",
                                    "amount": amt * 100,
                                    "currency": "INR",
                                    "name": "SILVERWOOD",
                                    "description": "Test Transaction",
                                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                                    "handler": function(response) {
                                        jQuery.ajax({
                                            type: 'post',
                                            url: 'payment_process.php',
                                            data: "payment_id=" + response.razorpay_payment_id,
                                            success: function(result) {
                                                window.location.href = "thank_you.php";
                                            }
                                        });
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.open();
                            }
                        });


                    }

                    function pay_nowss() {
                        var amt = jQuery('#amtss').val();

                        jQuery.ajax({
                            type: 'post',
                            url: 'payment_process.php',
                            data: "amt=" + amt,
                            success: function(result) {
                                var options = {
                                    "key": "rzp_test_w6OJgfdpAVZBBK",
                                    "amount": amt * 100,
                                    "currency": "INR",
                                    "name": "SILVERWOOD",
                                    "description": "Test Transaction",
                                    "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                                    "handler": function(response) {
                                        jQuery.ajax({
                                            type: 'post',
                                            url: 'payment_process.php',
                                            data: "payment_id=" + response.razorpay_payment_id,
                                            success: function(result) {
                                                window.location.href = "thank_you.php";
                                            }
                                        });
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.open();
                            }
                        });


                    }
                </script>
            </div>
        </div>
    </section>
    <!-- End Amenities -->

    <br><br>
    <?php require('./required/footer.php') ?>
</body>

</html>