<?php
require("../required/config.php");
if (!isLoggedIn()) {
  exit();
}

// ---------- 1. ADD FAQ DATA ----------
if (isset($_POST['add']) && isset($_POST['question']) && isset($_POST['faq'])) {
  $err = 0;
  $question = $_POST['question'];
  $faq = $_POST['faq'];
  foreach ($question as $index => $value) {
    $single_question = secure($question[$index]);
    $single_faq = secure($faq[$index]);

    $sql = "INSERT INTO `faq`(`question`, `faq`, `time`) VALUES ('$single_question','$single_faq',NOW())";
    $result = $mysqli->query($sql);
    if (!$mysqli->affected_rows > 0) {
      $err = 1;
    } else {
      $names .= "$single_question, ";
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not inserted.") : setFlash("success", "Great! <b>\"$names\"</b> added as FAQs!");
  header("Location:../faq");
  exit();
}


// ---------- 2. FETCH FAQ EDIT DATA ----------
if (isset($_POST['editIDS'])) {
  $i = 0;
  foreach ($_POST['editIDS'] as $IDS) {
    $i++;
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `faq` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      if ($mysqli->affected_rows > 0) {
?>
        <div class="repeater">
          <div class="alert alert-primary">
            # Edit Record: <b><?= $row['question']; ?></b>
          </div>
          <div class="media">
            <div class="col-lg-12 col-xs-12">
              <div class="form-group">
                <label for="question">Question:</label><br>
                <input type="hidden" id="id[]" name="ID[]" value="<?= $row['id']; ?>">
                <input type="text" id="question[]" name="question[]" value="<?= $row['question']; ?>" class="form-control" placeholder="Question" required>
              </div>
              <div class="form-group">
                <label for="lname">Answer:</label><br>
                <textarea id="faq[]" name="faq[]" class="form-control" placeholder="Answer" required><?= $row['faq']; ?></textarea>
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

// ---------- 3. UPDATE FAQ DATA ----------
if (isset($_POST['edit']) && isset($_POST['ID']) && isset($_POST['question']) && isset($_POST['faq'])) {
  $err = 0;
  $ID = $_POST['ID'];
  $question = $_POST['question'];
  $faq = $_POST['faq'];
  $names = "";
  foreach ($question as $index => $value) {
    $single_ID = secure($ID[$index]);
    $single_question = secure($question[$index]);
    $single_faq = secure($faq[$index]);

    $sql = "UPDATE `faq` SET `question`='$single_question',`faq`='$single_faq' WHERE `id`=$single_ID";
    $result = $mysqli->query($sql);
    if ($mysqli->errno) {
      $err = 1;
    } else {
      $names .= "$single_question, ";
    }
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not updated. $names $mysqli->errno") : setFlash("success", "Updated! <b>\"$names\"</b> FAQs updated!");
  header("Location:../faq");
  exit();
}

// ---------- 4. DELETE FAQ DATA ----------
if (isset($_POST['delete']) && isset($_POST['deleteIDS'])) {
  $err = 0;
  foreach ($_POST['deleteIDS'] as $IDS) {
    if (is_numeric($IDS)) {
      $sql = "DELETE FROM `faq` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      if (!$mysqli->affected_rows > 0) {
        $err = 1;
      }
    }
  }
  echo ($err) ? false : true;
}
?>