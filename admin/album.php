<?php require("required/profile.php");
require('required/PaginationHelper.php');
if (isset($_GET['show']) && is_numeric($_GET['show'])) {
    $show = $_GET['show'];
} else {
    $show = RECORDS_PER_PAGE;
}
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$search = (isset($_GET['search'])) ? secure($_GET['search']) : "";
createPagination($show);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Image Album | SILVERWOOD</title>
    <!-- plugins:css -->
    <?php require('required/header.php') ?>
</head>

<body>
    <div class="container-scroller">
        <?php require('required/navbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <?php require('required/sidebar.php') ?>
            <div class="main-panel">
                <div class="modal fade" id="modalAddAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add New Album</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="backend/album-backend" id="albumForm">
                                <div class="container repeater-container">
                                    <!-- Repeater Starts -->
                                    <div class="media">
                                        <div class="col-lg-12 col-xs-12">
                                            <div class="form-group">
                                                <br>
                                                <input type="text" name="name" class="form-control" placeholder="Album Name" required>
                                            </div>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <label>Image:</label><br>
                                                    <input type="file" class="custom-file-input imageCropFile" name="image" aria-describedby="inputGroupFile[]">
                                                    <label class="custom-file-label">Album Image</label>
                                                    <input type="hidden" name="imageData" id="imageData" required>
                                                </div>
                                            </div>
                                            <div id="image_demo" style="margin:auto;margin-top:20px;"></div>
                                        </div>
                                    </div>
                                    <!-- Repeater Ends -->

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" name="add" id="addalbum">Add Album</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalEditAlbum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Edit Records</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="backend/album-backend" id="albumEditForm" enctype="multipart/form-data">
                                <div class="container repeater-container edit-container">
                                    <!-- Auto Generated Content -->
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" name="edit" id="editalbum">Edit Album</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-left media-middle col-6">
                                            <h4 class="card-title">Albums</h4>
                                            <p class="card-description">
                                                List of albums currently on the system
                                            </p>
                                        </div>
                                        <div class="media-right media-middle col-6">
                                            <button class="btn" style="float: right;background-color:rgb(66,133,244);color: white;" data-toggle="modal" data-target="#modalAddAlbum"><i class="fas fa-plus-circle"></i> Add Album</button>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left media-middle col-6">
                                            <form method="get" class="d-inline-block" id="showRecords">
                                                <p>Show
                                                    <select name="show" id="show" onchange="document.getElementById('showRecords').submit();">
                                                        <option value="5">5</option>
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                        <option value="500">500</option>
                                                    </select>
                                                    <?php if (isset($_GET['search'])) { ?>
                                                        <input type="hidden" name="search" value="<?= secure($_GET['search']); ?>">
                                                    <?php } ?>
                                                    records per page.
                                                    <script>
                                                        document.getElementById('show').value = "<?= $show; ?>";
                                                    </script>
                                                </p>
                                            </form>
                                        </div>
                                        <div class="media-right media-middle col-6">
                                            <form method="get" id="search">
                                                <?php if (isset($_GET['show'])) { ?>
                                                    <input type="hidden" name="show" value="<?= $show; ?>">
                                                <?php } ?>
                                                <p style="float: right;">Search : <span><input type="Search" name="search" value="<?= $search; ?>" class="form-control"></span></p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <b><span class="selectCount">0</span> Selected</b> -
                                        <button class="btn btn-white btn-sm p-2" onclick='window.location.reload();' data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fas fa-redo-alt fa-2x"></i></button>
                                        <span class="selectedOptions d-none">
                                            <button class="btn btn-white btn-sm p-2  deleteAll" data-toggle="tooltip" data-placement="top" title="Delete Selected"><i class="fas fa-trash fa-2x"></i></button>
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <?php require('required/alerts.php'); ?>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table" id="albumTable">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="mainCheck" name="mainCheck" value="all" data-chkbox-shiftsel="type1">
                                                            <label class="custom-control-label" for="mainCheck"></label>
                                                        </div>
                                                    </th>
                                                    <th>Sr</th>
                                                    <th>Image</th>
                                                    <th>Album Name</th>
                                                    <th>Operations</th>
                                                </tr>
                                                <?php
                                                if (isset($_GET['search'])) {
                                                    $search = "`name` LIKE '%" . secure($_GET['search']) . "%'";
                                                } else {
                                                    $search = "1";
                                                }
                                                $content = fetchPagination("*", "album", "WHERE $search ORDER BY `id` DESC");
                                                $i = -1;
                                                $totalentries = 0;
                                                if ($content > 0) {
                                                    foreach ($content as $row) {
                                                        $i++;
                                                        if ($i == 0) {
                                                            $totalentries = $row;
                                                            continue;
                                                        }
                                                ?>
                                                        <tr id="<?php echo $row['id']; ?>" class="selectable" data-id="<?php echo $row['id']; ?>" data-tag="album" data-name="<?php echo $row['name']; ?>">
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkBox" id="check<?= $i; ?>" name="data1" value="<?= $i; ?>" data-chkbox-shiftsel="type1">
                                                                    <label class="custom-control-label" for="check<?= $i; ?>"></label>
                                                                </div>
                                                            </td>
                                                            <td><?php echo (($page - 1) * $show + $i); ?></td>
                                                            <td><img src="../assets/img/album/<?php echo $row['image']; ?>" data-image="../assets/img/album/<?php echo $row['image']; ?>" width="40px" alt="" class="imageresource"></td>
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td>
                                                                <span data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <a class="update" data-toggle="modal" data-target="#modalEditAlbum">
                                                                        <i class="fas fa-edit" style="font-size: 15px;color:rgb(66,133,244); padding-right: 5px;"></i>
                                                                    </a>
                                                                </span>
                                                                <span data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <a class="delete">
                                                                        <i class="fas fa-trash-alt" style="font-size: 15px;color: red;"></i>
                                                                    </a>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                }
                                                if ($i == -1) {
                                                    echo "<tr class='grey lighten-3 text-center'><td colspan='100%'>No Entries</td></tr>";
                                                }
                                                ?>
                                            </table>
                                            <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" data-dismiss="modal">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <img src="" class="imagepreview" style="width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 15px;">
                                        <div class="col-md-6 col-sm-12">
                                            <?php if ($i == -1) { ?>
                                                <p>Showing 0 out of 0 entries.</p>
                                            <?php } else { ?>
                                                <p>Showing <?php echo (($page - 1) * $show + 1) . " - " . ((($page - 1) * $show) + $i); ?> records out of <?php echo $totalentries; ?> entries <?= isset($_GET['search']) ? "for <b>'" . secure($_GET['search']) . "'</b>" : ""; ?></p>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <span style="float: right;">
                                                <?php pagination(); ?>
                                            </span>
                                        </div>
                                    </div>
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