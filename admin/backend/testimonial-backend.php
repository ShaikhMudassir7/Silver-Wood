<?php
require("../required/config.php");
if (!isLoggedIn()) {
  exit();
}

// ---------- 1. ADD TESTIMONIAL DATA ----------
if (isset($_POST['add']) && isset($_POST['testimonial'])) {
  $err = 0;
  $testimonial = $_POST['testimonial'];
  foreach ($testimonial as $index => $value) {
    $single_testimonial = secure($testimonial[$index]);

    $sql = "INSERT INTO `testimonial`(`testimonial`, `time`) VALUES ('$single_testimonial',NOW())";
    $result = $mysqli->query($sql);
    if (!$mysqli->affected_rows > 0) {
      $err = 1;
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not inserted.") : setFlash("success", "Great! Testimonials added!");
  header("Location:../testimonial");
  exit();
}


// ---------- 2. FETCH TESTIMONIAL EDIT DATA ----------
if (isset($_POST['editIDS'])) {
  $i = 0;
  foreach ($_POST['editIDS'] as $IDS) {
    $i++;
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `testimonial` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      if ($mysqli->affected_rows > 0) {
?>
        <div class="repeater">
          <div class="alert alert-primary">
            # Edit Record:
          </div>
          <div class="media">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label for="lname">Testimonial:</label><br>
                <input type="hidden" id="id[]" name="ID[]" value="<?= $row['id']; ?>">
                <textarea id="testimonial[]" name="testimonial[]" class="form-control" placeholder="Your Last Name" required><?= $row['testimonial']; ?></textarea>
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

// ---------- 3. UPDATE TESTIMONIAL DATA ----------
if (isset($_POST['edit']) && isset($_POST['ID']) && isset($_POST['testimonial'])) {
  $err = 0;
  $ID = $_POST['ID'];
  $testimonial = $_POST['testimonial'];
  $names = "";
  foreach ($title as $index => $value) {
    $single_ID = secure($ID[$index]);
    $single_testimonial = secure($testimonial[$index]);

    $sql = "UPDATE `testimonial` SET `testimonial`='$single_testimonial' WHERE `id`=$single_ID";
    $result = $mysqli->query($sql);
    if ($mysqli->errno) {
      $err = 1;
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not updated.") : setFlash("success", "Testimonials updated!");
  header("Location:../testimonial");
  exit();
}

// ---------- 4. DELETE TESTIMONIAL DATA ----------
if (isset($_POST['delete']) && isset($_POST['deleteIDS'])) {
  $err = 0;
  foreach ($_POST['deleteIDS'] as $IDS) {
    if (is_numeric($IDS)) {
      $sql = "DELETE FROM `testimonial` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      if (!$mysqli->affected_rows > 0) {
        $err = 1;
      }
    }
  }
  echo ($err) ? false : true;
}
?>