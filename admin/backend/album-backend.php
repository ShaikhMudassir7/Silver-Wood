<?php
require("../required/config.php");
if (!isLoggedIn()) {
  exit();
}

// ---------- 1. ADD ALBUM DATA ----------
if (isset($_POST['add']) && isset($_POST['name']) && isset($_POST['imageData'])) {
  $err = 0;
  $name = secure($_POST['name']);

  $imageData = $_POST['imageData'];
  $image_array_1 = explode(";", $imageData);
  $image_array_2 = explode(",", $image_array_1[1]);
  $imageData = base64_decode($image_array_2[1]);
  $imageName = $name . time() . '.png';

  file_put_contents("../../assets/img/album/" . $imageName, $imageData);

  $sql = "INSERT INTO `album`(`name`, `image`) VALUES ('$name','$imageName')";
  echo $sql;
  $result = $mysqli->query($sql);
  if (!$mysqli->affected_rows > 0) {
    $err = 1;
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. Data was not stored.") : setFlash("success", "Great! <b>\"$name\"</b> added as Album!");
  header("Location:../album");
  exit();
}

// ---------- 2. FETCH ALBUM EDIT DATA ----------
if (isset($_POST['editIDS']) && isset($_POST['name']) == false) {
  $i = 0;
  foreach ($_POST['editIDS'] as $IDS) {
    $i++;
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `album` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      if ($mysqli->affected_rows > 0) {
?>
        <div class="media">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <br>
              <input type="text" name="name" class="form-control" value="<?= $row['name']; ?>" placeholder="Album Name" required>
            </div>
            <div class="input-group">
              <div class="custom-file">
                <label>Image:</label><br>
                <input type="file" class="custom-file-input imageCropFile" name="upload_image" id="upload_image" aria-describedby="inputGroupFile1[]">
                <label class="custom-file-label"><?= $row['image']; ?></label>
                <input type="hidden" name="imageData" id="imageEditData" required>
                <input type="hidden" name="editIDS" id="editIDS" value="<?= $IDS; ?>" required>
              </div>
            </div>
            <div id="image_demo_edit" style="margin:auto;margin-top:20px;"></div>
          </div>
        </div>
        <script>
          $('#upload_image').on(' change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
              $image_crop2.croppie('bind', {
                url: event.target.result
              }).then(function() {
                console.log('jQuery bind complete');
              });
            }
            reader.readAsDataURL(this.files[0]);
          });
          $image_crop2 = $('#image_demo_edit').croppie({
            enableExif: true,
            viewport: {
              width: 504,
              height: 284,
              type: 'square' //circle
            },
            boundary: {
              width: '100%',
              height: 300
            }
          });
          $("#albumEditForm").submit(function(event) {
            $image_crop2.croppie('result', {
              type: 'canvas',
              size: 'viewport'
            }).then(function(response) {
              $("#imageEditData").val(response);
            })
          });
        </script>
<?php
      } else {
        $err = 1;
      }
    }
  }
}

// ---------- 3. UPDATE ALBUM DATA ----------
if (isset($_POST['edit']) && isset($_POST['name']) && isset($_POST['imageData'])) {
  $err = 0;
  $ID = $_POST['editIDS'];
  $name = secure($_POST['name']);

  if (isset($_FILES['upload_image'])) {
    // Delete Old Image
    $sql = "SELECT * FROM `album` WHERE `id` = $ID";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $image = "../../assets/img/album/" . $row['image'];
    if (file_exists($image)) {
      unlink($image);
    }

    // Save New Image
    $imageData = $_POST['imageData'];
    $image_array_1 = explode(";", $imageData);
    $image_array_2 = explode(",", $image_array_1[1]);
    $imageData = base64_decode($image_array_2[1]);
    $imageName = $name . time() . '.png';
    file_put_contents("../../assets/img/album/" . $imageName, $imageData);
    $imageSQL = ", `image`='$imageName'";
  } else {
    $imageSQL = "";
  }
  $sql = "UPDATE `album` SET `name`='$name' $imageSQL WHERE `id`=$ID";
  $result = $mysqli->query($sql);
  if ($mysqli->errno) {
    $err = 1;
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not updated.") : setFlash("success", "Updated! <b>\"$name\"</b> record updated!");
  header("Location:../album");
  exit();
}

// ---------- 4. DELETE ADMIN DATA ----------
if (isset($_POST['delete']) && isset($_POST['deleteIDS'])) {
  $err = 0;
  foreach ($_POST['deleteIDS'] as $IDS) {
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `album` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      $image = "../../assets/img/album/" . $row['image'];

      $sql = "DELETE FROM `album` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      if (!$mysqli->affected_rows > 0) {
        $err = 1;
      } else {
        if (file_exists($image)) {
          unlink($image);
        }
      }
    }
  }
  echo ($err) ? false : true;
}
?>