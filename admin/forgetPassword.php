<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
    <link rel="icon" href="assets/img/favicon.png" type="image/gif" sizes="16x16">
    <title>Forgot Password | SILVERWOOD</title>
</head>

<body>
    <?php
    require("required/config.php");

    // If already logged in goto index.php
    if (isLoggedIn()) {
        header("location:index.php");
    }

    if (isset($_POST['submit'])) {
        $email = secure($_POST['email']);
        $verficationCode = generate_string();

        $sql = "SELECT * FROM `admin` WHERE `email`='$email'";
        $result = $mysqli->query($sql);
        if ($row = $result->fetch_assoc() && $result->num_rows > 0) {
            $sql = "UPDATE `admin` set `randomString`='$verficationCode' WHERE `email`='$email'";
            $result = $mysqli->query($sql);

            $subject = "Reset Account Password";
            $message = "Dear <b>" . $row['fname'] . " " . $row['lname']  . "</b>, <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We are sorry to hear that you lossed your account password. But we are always here to help you! Kindly reset your Password to get account access. Click the link below or copy the link and open in new tab.<br><br><a href='" . BASE_URL . "/reset-password?data=$verficationCode'>" . BASE_URL . "reset-password?data=$verficationCode</a>";
            mailSender($email, notificationEmail, $subject, $message);
            setFlash("success", "Mail sent at $email. Please check your email to reset password.");
            header("Location:forgot-password");
            exit();
        } else {
            setFlash("warning", "\"$email\" not found.");
            header("Location:forgot-password");
            exit();
        }
    }
    ?>
    <div class="container login-form">
        <div class="col-lg-6 offset-lg-3 col-sm-12 col-xs-12">
            <div class="card text-center rounded-lg">
                <div class="card-body">
                    <a href="login" data-toggle="tooltip" title="Back To Login" class="float-left"><i class="fas fa-arrow-circle-left fa-2x"></i></a>
                    <h4 class="card-title">Forgot Password?</h4>
                    <p>No Worries! Enter your email below to change your password</p>
                    <form class="p-4" method="post">
                        <?php require('required/alerts.php');

                        echo getFlashDelete("warning");
                        ?>

                        <p class="text-left">Email:</p>
                        <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">
                        <button type="submit" name="submit" class="btn btn-primary btn-block my-4">Recover Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------JavaScript Begins------------ -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
    <script src="assets/js/script.js"></script>
    <!-- ------------JavaScript Ends------------ -->

</body>

</html>