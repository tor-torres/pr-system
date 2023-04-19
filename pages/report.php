<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php 
    $results = $DB->query("SELECT * FROM users WHERE id=".$_SESSION[AUTH_ID]);
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>

<?php
$select = $DB->query("SELECT * FROM invoice");
$designation = $select->fetch_object();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-header">
                            <h3 class="card-title">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-plus-circle"></i> Update</button>
                            </h3>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Administrative Officer</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <input type="hidden" name="action" value="update_designation">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-6">
                                                            <label for="requestedfullname">Request Full Name:</label>
                                                            <input type="text" class="form-control text-capitalize" id="requestedfullname" name="requestedfullname" value="<?php echo $designation->requestedfullname ?>" placeholder="Enter Fullname" required>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="requesteddesignation">Request Designation:</label>
                                                            <input type="text" class="form-control text-capitalize" id="requesteddesignation" name="requesteddesignation" value="<?php echo $designation->requesteddesignation ?>" placeholder="Enter Position" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                    <div class="col-lg-6">
                                                            <label for="approvedfullname">Approve Full Name:</label>
                                                            <input type="text" class="form-control text-capitalize" id="approvedfullname" name="approvedfullname" value="<?php echo $designation->approvedfullname ?>" placeholder="Enter Fullname" required>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="approveddesignation">Approve Designation:</label>
                                                            <input type="text" class="form-control text-capitalize" id="approveddesignation" name="approveddesignation" value="<?php echo $designation->approveddesignation ?>" placeholder="Enter Position" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <label for="purpose">Purpose Message:</label>
                                                            <input type="text" class="form-control" id="purpose" name="purpose" value="<?php echo $designation->purpose ?>" placeholder="Enter Purpose Message" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                                                                <i class="fa fa-times-circle"></i> Cancel
                                                            </button>
                                                            <button type="submit" class="btn btn-success btn-sm" name="btn-submit">
                                                                <i class="fas fa-plus-circle"></i> Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $select = $DB->query("SELECT * FROM approvedtable INNER JOIN users ON approvedtable.userID = users.id INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id GROUP BY id");
                            ?>
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($select->num_rows > 0) {
                                        while ($row = $select->fetch_assoc()) {
                                            $id = $row['userID'];
                                            ?>
                                            <tr class="text-center">
                                                <td class="text-capitalize"><?php echo $row['department'] ?></td>
                                                <td>
                                                <a href="approved-list&id=<?php echo $id ?>" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                </td>             
                                            </tr>                                 
                                        <?php  }
                                    } else { ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= element('footer'); ?>
<?= element('sweetalert'); ?>
