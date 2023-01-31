<?php
require("../required/config.php");
if (!isLoggedIn()) {
  exit();
}

// ---------- 1. ADD IMAGE DATA ----------
if (isset($_POST['add']) && isset($_POST['category']) && is_numeric($_POST['category']) && isset($_POST['imageData'])) {
  $err = 0;
  $category = $_POST['category'];
  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  $upload_dir = '../../assets/img/image/'; // upload directory  
  $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
  $imageName = $category . '_' . time() . '.png';

  // valid image extensions
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  // Uploading Original Image
  if (in_array($imgExt, $valid_extensions) && $imgSize < 10000000) {
    move_uploaded_file($tmp_dir, $upload_dir . $imageName);
  }

  // Uploading Thumbnail
  $imageData = $_POST['imageData'];
  $image_array_1 = explode(";", $imageData);
  $image_array_2 = explode(",", $image_array_1[1]);
  $imageData = base64_decode($image_array_2[1]);
  file_put_contents("../../assets/img/thumb/" . $imageName, $imageData);

  // Uploading Image
  $sql = "INSERT INTO `image`(`image`, `category`, `date`) VALUES ('$imageName','$category',NOW())";
  $result = $mysqli->query($sql);
  if (!$mysqli->affected_rows > 0) {
    $err = 1;
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. Data was not stored.") : setFlash("success", "Great! Image Uploaded!");
  header("Location:../image");
  exit();
}

// ---------- 2. FETCH IMAGE EDIT DATA ----------
if (isset($_POST['editIDS']) && isset($_POST['category']) == false) {
  $i = 0;
  foreach ($_POST['editIDS'] as $IDS) {
    $i++;
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `image` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      if ($mysqli->affected_rows > 0) {
?>
        <div class="media">
          <div class="col-lg-12 col-xs-12">
            <div class="form-group">
              <select name="category" class="form-control" id="editAlbum" required>
                <option value="">--SELECT--</option>
                <?php
                $sql = "SELECT * FROM `album`";
                $res = $mysqli->query($sql);
                while ($row1 = $res->fetch_assoc()) {
                  echo "<option value='" . $row1['id'] . "'>" . $row1['name'] . "</option>";
                }
                ?>
              </select>
              <script>
                document.getElementById("editAlbum").value = '<?= $row['category']; ?>'
              </script>
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
          $("#imageEditForm").submit(function(event) {
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
// ---------- 3. UPDATE IMAGE DATA ----------
if (isset($_POST['edit']) && isset($_POST['editIDS']) && isset($_POST['category']) && is_numeric($_POST['category']) && isset($_POST['imageData'])) {
  echo "mai edit k andar hu!";
  $err = 0;
  $ID = $_POST['editIDS'];
  $category = $_POST['category'];

  if (isset($_FILES['upload_image'])) {
    // Delete Old Image
    $sql = "SELECT * FROM `image` WHERE `id` = $ID";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $image = "../../assets/img/thumb/" . $row['image'];     // Delete Thumbnail
    if (file_exists($image)) {
      unlink($image);
    }
    $image = "../../assets/img/image/" . $row['image'];     // Delete HD Image
    if (file_exists($image)) {
      unlink($image);
    }

    // Save New HD Image
    $imgFile = $_FILES['upload_image']['name'];
    $tmp_dir = $_FILES['upload_image']['tmp_name'];
    $imgSize = $_FILES['upload_image']['size'];
    $upload_dir = '../../assets/img/image/'; // upload directory
    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // get image extension
    $imageName = $category . time() . '.png';
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extension
    if (in_array($imgExt, $valid_extensions) && $imgSize < 10000000) {
      move_uploaded_file($tmp_dir, $upload_dir . $imageName);
    }

    // Save New Thumbnail Image
    $imageData = $_POST['imageData'];
    $image_array_1 = explode(";", $imageData);
    $image_array_2 = explode(",", $image_array_1[1]);
    $imageData = base64_decode($image_array_2[1]);
    file_put_contents("../../assets/img/thumb/" . $imageName, $imageData);
    $imageSQL = ", `image`='$imageName'";
  } else {
    $imageSQL = "";
  }
  $sql = "UPDATE `image` SET `category`='$category' $imageSQL WHERE `id`=$ID";
  $result = $mysqli->query($sql);
  if ($mysqli->errno) {
    $err = 1;
  }
  ($err) ? setFlash("danger", "Oops! Something Went Wrong. All data were not updated.") : setFlash("success", "Updated! Image updated!");
  header("Location:../image");
  exit();
}

// ---------- 4. DELETE IMAGE DATA ----------
if (isset($_POST['delete']) && isset($_POST['deleteIDS'])) {
  $err = 0;
  foreach ($_POST['deleteIDS'] as $IDS) {
    if (is_numeric($IDS)) {
      $sql = "SELECT * FROM `image` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      $row = $result->fetch_assoc();
      $imageHD = "../../assets/img/image/" . $row['image'];
      $imageTN = "../../assets/img/thumb/" . $row['image'];

      $sql = "DELETE FROM `image` WHERE `id` = $IDS";
      $result = $mysqli->query($sql);
      if ($mysqli->affected_rows == 0) {
        $err = 1;
      } else {
        if (file_exists($imageHD)) {
          unlink($imageHD);
        }
        if (file_exists($imageTN)) {
          unlink($imageTN);
        }
      }
    }
  }
  echo ($err) ? false : true;
}
?>