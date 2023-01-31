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
    <title>FAQ | SILVERWOOD</title>
    <!-- plugins:css -->
    <?php require('required/header.php') ?>
</head>

<body>
    <div class="container-scroller">
        <?php require('required/navbar.php') ?>
        <div class="container-fluid page-body-wrapper">
            <?php require('required/sidebar.php') ?>
            <div class="main-panel">
                <div class="modal fade" id="modalAddFAQ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Add New FAQ</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="backend/faq-backend">
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
                                            <div class="col-lg-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="fname">Question:</label><br>
                                                    <input type="text" name="question[]" id="question" class="form-control" placeholder="Question" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lname">Answer:</label><br>
                                                    <textarea name="faq[]" id="faq" class="form-control" placeholder="Answer" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeater Ends -->
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" name="add" id="addfaq">Add FAQ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalEditFAQ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Edit Records</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="backend/faq-backend">
                                <div class="container repeater-container edit-container">
                                    <!-- Auto Generated Content -->
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" name="edit" id="editfaq">Edit FAQ</button>
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
                                            <h4 class="card-title">FAQs</h4>
                                            <p class="card-description">
                                                List of FAQs currently on the system
                                            </p>
                                        </div>
                                        <div class="media-right media-middle col-6">
                                            <button class="btn" style="float: right;background-color:rgb(66,133,244);color: white;" data-toggle="modal" data-target="#modalAddFAQ"><i class="fas fa-plus-circle"></i> Add FAQ</button>
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
                                            <span data-toggle="modal" data-target="#modalEditFAQ">
                                                <button class="btn btn-white darken-4 btn-sm p-2 editAll" data-toggle="tooltip" data-placement="top" title="Edit Selected"><i class="fas fa-pencil-alt fa-2x"></i></button>
                                            </span>
                                            <button class="btn btn-white btn-sm p-2  deleteAll" data-toggle="tooltip" data-placement="top" title="Delete Selected"><i class="fas fa-trash fa-2x"></i></button>
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <?php require('required/alerts.php'); ?>
                                    </div>
                                    <div class="col-12 col-sm-12 col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table" id="faTable">
                                                <tr>
                                                    <th>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="mainCheck" name="mainCheck" value="all" data-chkbox-shiftsel="type1">
                                                            <label class="custom-control-label" for="mainCheck"></label>
                                                        </div>
                                                    </th>
                                                    <th>Sr</th>
                                                    <th>Question</th>
                                                    <th>FAQ</th>
                                                    <th>Date</th>
                                                    <th>Operations</th>
                                                </tr>
                                                <?php
                                                if (isset($_GET['search'])) {
                                                    $search = "CONCAT_WS(`question`, `faq`, DATE_FORMAT(`time`, '%d-%M-%Y')) LIKE '%" . secure($_GET['search']) . "%'";
                                                } else {
                                                    $search = "1";
                                                }
                                                $content = fetchPagination("*", "faq", "WHERE $search ORDER BY `id` DESC");
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
                                                        <tr id="<?php echo $row['id']; ?>" class="selectable" data-id="<?php echo $row['id']; ?>" data-tag="FAQ" data-name="<?php echo $row['question']; ?>">
                                                            <td>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input checkBox" id="check<?= $i; ?>" name="data1" value="<?= $i; ?>" data-chkbox-shiftsel="type1">
                                                                    <label class="custom-control-label" for="check<?= $i; ?>"></label>
                                                                </div>
                                                            </td>
                                                            <td><?php echo (($page - 1) * $show + $i); ?></td>
                                                            <td><?php echo $row['question']; ?></td>
                                                            <td><?php echo $row['faq']; ?></a></td>
                                                            <td><?php echo Date("d M Y", strtotime($row['time'])); ?></td>
                                                            <td>
                                                                <span data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <a class="update" data-toggle="modal" data-target="#modalEditFAQ">
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