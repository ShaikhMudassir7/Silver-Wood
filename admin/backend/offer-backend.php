<?php
require("../required/config.php");
if (!isLoggedIn()) {
  exit();
}

// ---------- 1. ADD OFFER DATA ----------
if (isset($_POST['add']) && isset($_POST['title']) && isset($_POST['offer'])) {
  $err = 0;
  $title = $_POST['title'];
  $offer = $_POST['offer'];
  $titles = "";
  foreach ($title as $index => $value) {
    $single_title = secure($title[$index]);
    $single_offer = secure($offer[$index]);

    $sql = "INSERT INTO `offer`(`title`, `offer`, `time`) VALUES ('$single_title','$single_offer',NOW())";
    $result = $mysqli->query($sql);
    if (!$mysqli->affected_rows > 0) {
      $err = 1;
    } else {
      $names .= "$single_title, ";
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not inserted.") : setFlash("success", "Great! <b>\"$names\"</b> added as Offers!");
  header("Location:../offer");
  exit();
}


// ---------- 2. FETCH OFFER EDIT DATA ----------
if (isset($_POST['editIDS'])) {
  $i = 0;
  foreach ($_POST['editIDS'] as $IDS) {
    $i++;
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `offer` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      if ($mysqli->affected_rows > 0) {
?>
        <div class="repeater">
          <div class="alert alert-primary">
            # Edit Record: <b><?= $row['title']; ?></b>
          </div>
          <div class="media">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label for="title">Title:</label><br>
                <input type="hidden" id="id[]" name="ID[]" value="<?= $row['id']; ?>">
                <input type="text" id="title[]" name="title[]" value="<?= $row['title']; ?>" class="form-control" placeholder="Title" required>
              </div>
              <div class="form-group">
                <label for="lname">Offer:</label><br>
                <textarea id="offer[]" name="offer[]" class="form-control" placeholder="Your Last Name" required><?= $row['offer']; ?></textarea>
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

// ---------- 3. UPDATE OFFER DATA ----------
if (isset($_POST['edit']) && isset($_POST['ID']) && isset($_POST['title']) && isset($_POST['offer'])) {
  $err = 0;
  $ID = $_POST['ID'];
  $title = $_POST['title'];
  $offer = $_POST['offer'];
  $names = "";
  foreach ($title as $index => $value) {
    $single_ID = secure($ID[$index]);
    $single_title = secure($title[$index]);
    $single_offer = secure($offer[$index]);

    $sql = "UPDATE `offer` SET `title`='$single_title',`offer`='$single_offer' WHERE `id`=$single_ID";
    $result = $mysqli->query($sql);
    if ($mysqli->errno) {
      $err = 1;
    } else {
      $names .= "$single_title, ";
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not updated. $names $mysqli->errno") : setFlash("success", "Updated! <b>\"$names\"</b> offers updated!");
  header("Location:../offer");
  exit();
}

// ---------- 4. DELETE OFFER DATA ----------
if (isset($_POST['delete']) && isset($_POST['deleteIDS'])) {
  $err = 0;
  foreach ($_POST['deleteIDS'] as $IDS) {
    if (is_numeric($IDS)) {
      $sql = "DELETE FROM `offer` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      if (!$mysqli->affected_rows > 0) {
        $err = 1;
      }
    }
  }
  echo ($err) ? false : true;
}
?>