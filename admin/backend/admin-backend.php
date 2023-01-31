<?php
require("../required/config.php");
if (!isLoggedIn()) {
  exit();
}

// ---------- 1. ADD ADMIN DATA ----------
if (isset($_POST['add']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
  $err = 0;
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $names = "";
  foreach ($fname as $index => $value) {
    $single_fname = secure($fname[$index]);
    $single_lname = secure($lname[$index]);
    $single_email = secure($email[$index]);
    $single_password = secure($password[$index]);

    $sql = "INSERT INTO `admin`(`fname`, `lname`, `email`, `password`, `superAdmin`, `date`, `randomString`) VALUES ('$single_fname','$single_lname','$single_email','$single_password',0,CURDATE(),'')";
    $result = $mysqli->query($sql);
    if (!$mysqli->affected_rows > 0) {
      $err = 1;
    } else {
      $names .= "$single_fname $single_lname, ";
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not inserted.") : setFlash("success", "Great! <b>\"$names\"</b> added as Admin!");
  header("Location:../admin");
  exit();
}

// ---------- 2. FETCH ADMIN EDIT DATA ----------
if (isset($_POST['editIDS'])) {
  $i = 0;
  foreach ($_POST['editIDS'] as $IDS) {
    $i++;
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `admin` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      if ($mysqli->affected_rows > 0) {
?>
        <div class="repeater">
          <div class="alert alert-primary">
            # Edit Record: <b><?= $row['fname'] . " " . $row['lname']; ?></b>
          </div>
          <div class="media">
            <div class="col-lg-6 col-xs-12">
              <div class="form-group">
                <label for="fname">First Name:</label><br>
                <input type="hidden" id="id[]" name="ID[]" value="<?= $row['id']; ?>">
                <input type="text" id="fname[]" name="fname[]" value="<?= $row['fname']; ?>" class="form-control" placeholder="Your First Name" required>
              </div>
              <div class="form-group">
                <label for="lname">Last Name:</label><br>
                <input type="text" id="lname[]" name="lname[]" value="<?= $row['lname']; ?>" class="form-control" placeholder="Your Last Name" required>
              </div>
            </div>
            <div class="col-lg-6 col-xs-12">
              <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="email" id="email[]" name="email[]" value="<?= $row['email']; ?>" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <label for="pass">Password:</label><br>
                <input type="password" id="password[]" name="password[]" class="form-control" placeholder="Leave empty if don't want to change">
              </div>
            </div>
          </div>
        </div>
<?php
      } else {
        $err = 1;
      }
    }
  }
}

// ---------- 3. UPDATE ADMIN DATA ----------
if (isset($_POST['edit']) && isset($_POST['ID']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password'])) {
  $err = 0;
  $ID = $_POST['ID'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $names = "";
  foreach ($fname as $index => $value) {
    $single_ID = secure($ID[$index]);
    $single_fname = secure($fname[$index]);
    $single_lname = secure($lname[$index]);
    $single_email = secure($email[$index]);
    $single_password = secure($password[$index]);

    $passSQL = ($single_password == "") ? "" : ",`password`='" . Encrypt($single_password) . "'";

    $sql = "UPDATE `admin` SET `fname`='$single_fname',`lname`='$single_lname',`email`='$single_email' $passSQL WHERE `id`=$single_ID";
    $result = $mysqli->query($sql);
    if ($mysqli->errno) {
      $err = 1;
    } else {
      $names .= "$single_fname $single_lname, ";
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not updated. $names $mysqli->errno") : setFlash("success", "Updated! <b>\"$names\"</b> record updated!");
  header("Location:../admin");
  exit();
}

// ---------- 4. DELETE ADMIN DATA ----------
if (isset($_POST['delete']) && isset($_POST['deleteIDS'])) {
  $err = 0;
  foreach ($_POST['deleteIDS'] as $IDS) {
    if (is_numeric($IDS)) {
      $sql = "DELETE FROM `admin` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      if (!$mysqli->affected_rows > 0) {
        $err = 1;
      }
    }
  }
  echo ($err) ? false : true;
}
?>