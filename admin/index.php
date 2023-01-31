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
    <title>Admin | SILVERWOOD</title>
    <!-- plugins:css -->
    <?php require('required/header.php') ?>
</head>

<body>
    <div class="container-scroller">
        <?php require('required/navbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <?php require('required/sidebar.php') ?>
            <div class="main-panel">
                <div class="modal fade" id="modalAddAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add New Admin</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="backend/admin-backend">
                                <div class="container repeater-container">
                                    <!-- Repeater Starts -->
                                    <div class="repeater">
                                        <div class="alert alert-primary">
                                            # New Record:
                                            <div class="float-right">
                                                <button class="btn btn-danger btn-sm p-2 m-0 rounded-circle removeRepeater" type="button" data-toggle="tooltip" data-placement="top" title="Remove Record">&nbsp;<i class="fas fa-minus"></i>&nbsp;</button>
                                                <button class="btn btn-primary btn-sm p-2 m-0 rounded-circle addRepeater" type="button" data-toggle="tooltip" data-placement="top" title="Add Record">&nbsp;<i class="fas fa-plus"></i>&nbsp;</button>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="fname">First Name:</label><br>
                                                    <input type="text" name="fname[]" class="form-control" placeholder="Your First Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lname">Last Name:</label><br>
                                                    <input type="text" name="lname[]" class="form-control" placeholder="Your Last Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="email">Email:</label><br>
                                                    <input type="email" name="email[]" class="form-control" placeholder="Your Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass">Password:</label><br>
                                                    <input type="password" name="password[]" class="form-control" placeholder="Your Password" minlength="6" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeater Ends -->

                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" name="add" id="addadmin">Add Admin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalEditAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Edit Records</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="backend/admin-backend">
                                <div class="container repeater-container edit-container">
                                    <!-- Auto Generated Content -->
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" name="edit" id="editadmin">Edit Admin</button>
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
                                            <h4 class="card-title">Admins</h4>
                                            <p class="card-description">
                                                List of admins currently on the system
                                            </p>
                                        </div>
                                        <div class="media-right media-middle col-6">
                                            <button class="btn" style="float: right;background-color:rgb(66,133,244);color: white;" data-toggle="modal" data-target="#modalAddAdmin"><i class="fas fa-plus-circle"></i> Add Admin</button>
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
                                        <span class="selectedOptions d-none">
                                            <span data-toggle="modal" data-target="#modalEditAdmin">
                                                <button class="btn z-depth-0 border border-1 btn-white darken-4 btn-sm p-2 editAll" data-toggle="tooltip" data-placement="top" title="Edit Selected"><i class="fas fa-pencil-alt fa-2x"></i></button>
                                            </span>
                                            <button class="btn z-depth-0 border border-1 btn-white btn-sm p-2  deleteAll" data-toggle="tooltip" data-placement="top" title="Delete Selected"><i class="fas fa-trash fa-2x"></i></button>
                                        </span>
                                        <button class="btn z-depth-0 border border-1 btn-sm p-2" style="opacity:0;"><i class="fas fa-redo-alt fa-2x"></i></button>
                                    </div>
                                    <div class="col-12">
                                        <?php require('required/alerts.php'); ?>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table" id="adminTable">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="mainCheck" name="mainCheck" value="all" data-chkbox-shiftsel="type1">
                                                            <label class="custom-control-label" for="mainCheck"></label>
                                                        </div>
                                                    </th>
                                                    <th>Sr</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th>Joining Date</th>
                                                    <th>Operations</th>
                                                </tr>
                                                <?php
                                                if (isset($_GET['search'])) {
                                                    $search = "CONCAT_WS(`fname`, `lname`, `email`,DATE_FORMAT(`date`, '%d-%M-%Y')) LIKE '%" . secure($_GET['search']) . "%'";
                                                } else {
                                                    $search = "1";
                                                }
                                                $content = fetchPagination("*", "admin", "WHERE $search ORDER BY `id` DESC");
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
                                                        <tr id="<?php echo $row['id']; ?>" class="selectable" data-id="<?php echo $row['id']; ?>" data-tag="admin" data-name="<?php echo $row['fname'] . " " . $row['lname']; ?>">
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkBox" id="check<?= $i; ?>" name="data1" value="<?= $i; ?>" data-chkbox-shiftsel="type1">
                                                                    <label class="custom-control-label" for="check<?= $i; ?>"></label>
                                                                </div>
                                                            </td>
                                                            <td><?php echo (($page - 1) * $show + $i); ?></td>
                                                            <td><?php echo $row['fname']; ?></td>
                                                            <td><?php echo $row['lname']; ?></a></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo Date("d M Y", strtotime($row['date'])); ?></td>
                                                            <td>
                                                                <span data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <a class="update" data-toggle="modal" data-target="#modalEditAdmin">
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
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 15px;">
                                        <div class="col-md-6 col-sm-12">
                                            <?php if ($i == -1) { ?>
                                                <p>Showing 0 out of 0 entries.</p>
                                            <?php } else { ?>
                                                <p>Showing <?php echo (($page - 1) * $show + 1) . " - " . ((($page - 1) * $show) + $i); ?> records out of <?php echo $totalData; ?> entries <?= isset($_GET['search']) ? "for <b>'" . secure($_GET['search']) . "'</b>" : ""; ?></p>
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