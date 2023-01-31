<?php require("required/profile.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Password | SILVERWOOD</title>
    <!-- plugins:css -->
    <?php require('required/header.php') ?>
</head>

<body>
    <div class="container-scroller">
        <?php require('required/navbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <?php require('required/sidebar.php') ?>
            <?php
            if (isset($_POST['update'])) {
                $current = Encrypt(secure($_POST['current']));
                $newPassword = Encrypt(secure($_POST['newpassword']));
                $sessionID = $_SESSION[$aid];

                $sql = "SELECT * FROM `admin` WHERE `email` = '$sessionID' AND `password`='$current'";
                $result = $mysqli->query($sql);
                if ($result->num_rows >= 1) {
                    $sql = "UPDATE `admin` SET `password`='$newPassword' WHERE `email` = '$sessionID'";
                    $result = $mysqli->query($sql);
                    setFlash("success", "Password Changed!");
                    header("Location:change-password");
                    exit();
                } else {
                    setFlash("danger", "Your current password was wrong.");
                    header("Location:change-password");
                    exit();
                }
            }
            ?>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-left media-middle col-6">
                                        <h4 class="card-title">Change Password</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xs-12">
                                    <form action="" method="POST">
                                        <?php require('required/alerts.php'); ?>
                                        <div class="form-group">
                                            <label for="current">Current Password:</label><br>
                                            <input type="password" name="current" id="current" class="form-control" placeholder="Current Password" minlength="6" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newpassword">New Password:</label><br>
                                            <input type="password" name="newpassword" onkeyup="checkpass()" id="newpassword" class="form-control" placeholder="New Password" minlength="6" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm">Confirm Password:</label><br>
                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Current Password" onkeyup="checkpass()" minlength="6" required>
                                            <div id="confirmPasswordMessage" class="ml-2 mt-2 h6"></div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit" name="update" id="update">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php require('required/footer.php') ?>
            </div>
        </div>
    </div>
</body>

</html>