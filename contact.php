<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact: SILVERWOOD - Luxary Villa at Lonavala</title>
    <meta name="description" content="SILVERWOOD Villa is a modern & upscale vacation rental villa that is passionate about ‘making moments’ and recognising that small gestures make a big difference to our guests.">
    <meta name="keywords" content="SILVERWOOD, luxary, villa, lonavala villa, vacation, enjoyment, bungalow, rent">
    <!-- Facebook og -->
    <meta property="og:title" content="Contact: SILVERWOOD - Luxary Villa at Lonavala">
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
    <section class="amenities">
        <h1>CONTACT SILVERWOOD</h1>
        <h2>Book Your Villa Now!</h2>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-10 w-100 h-100 py-3 contact border border-grey equilize wow fadeInLeft">
                    <img src="assets/img/silverwood-removebg-preview.png" alt="Welcome" class="contact-img">
                    <h6 class="pt-2"> <i class="fas fa-building"></i> Address:</h6>
                    <address class="text-justify">Pangoli, Lonavala, Maharashtra 410405</address>
                    <h6 class="pt-2"> <i class="fas fa-phone"></i> Contact Number:</h6>
                    <p><a href="tel:+919999999999">+919999999999</a> / <a href="tel:+919999999999">+919999999999</a></p>
                    <h6 class="pt-2"> <i class="fas fa-envelope"></i> Email:</h6>
                    <p><a href="mailto:kaif@SILVERWOOD.com">kaif@SILVERWOOD.com</a></p>
                    <h6 class="pt-2"> <i class="fas fa-globe"></i> Website:</h6>
                    <p><a href="http://www.SILVERWOOD.com/">www.SILVERWOOD.com</a></p>
                    <h6 class="pt-2"> <i class="fas fa-mobile-alt"></i> Social Links:</h6>
                    <a href="#" target="_blank" class="social-facebook"><i class="fab fa-facebook-square fa-2x pr-3"></i></a>
                    <a href="#" target="_blank" class="social-instagram"><i class="fab fa-instagram fa-2x pr-3"></i></a>
                    <a href="#" target="_blank" class="social-whatsapp"><i class="fab fa-whatsapp fa-2x pr-3"></i></a>
                    <a href="#" target="_blank" class="social-google"><i class="fab fa-pinterest fa-2x pr-3"></i></a>
                    <a href="#" target="_blank" class="social-snapchat"><i class="fab fa-snapchat fa-2x pr-3"></i></a>
                    <a href="#" target="_blank" class="social-youtube"><i class="fab fa-youtube fa-2x pr-3"></i></a>
                    <a href="#" target="_blank" class="social-google"><i class="fab fa-google fa-2x"></i></a>
                </div>
                <div class="col-md-7 offset-md-1 offset-sm-0 col-sm-10 border border-grey equilize wow fadeInRight">
                    <form class="p-3" method="POST" id="contactForm">
                        <p class="h4 mb-4 text-center">Contact Now</p>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control mb-4 text-capitalize" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="contact">Contact:</label>
                                <input type="tel" id="contact" name="contact" class="form-control mb-4 numberOnly" placeholder="Mobile Number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control mb-4" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <label for="subject">Subject:</label>
                                <input type="text" id="subject" name="subject" class="form-control mb-4" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <label for="message">Message:</label>
                                <textarea id="message" name="message" rows="5" class="form-control mb-4" placeholder="Enter Your Message here..." required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-warning" type="submit" name="SEND"> <i class="fas fa-paper-plane"></i> SEND</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if (isset($_POST['SEND'])) {
                    $name = $_POST['name'];
                    $contactNo = $_POST['contact'];
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sql = "INSERT INTO `contact_us`(`name`, `contact`, `email`, `subject`, `message`) VALUES ('$name','$contactNo','$email','$subject','$message')";
                    $result = $mysqli->query($sql);
                    header("location: contact.php");
                }

                ?>

                <div class="col-md-12 mt-5 wow zoomIn">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6731.083905922259!2d73.4107495584413!3d18.767244666180034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be801e3bc44a131%3A0x6c6611f117cdb231!2sAshhville%20villa%20Lonavala!5e0!3m2!1sen!2sin!4v1672929564457!5m2!1sen!2sin" width="100%" height="400" frameborder="0" allowfullscreen="" class="border border-grey border-5" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- End Amenities -->

    <br><br>
    <?php require('./required/footer.php') ?>
</body>

</html>