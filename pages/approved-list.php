<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php 
    $results = $DB->query("SELECT * FROM users WHERE id = {$_SESSION[AUTH_ID]}");
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
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
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if($_SESSION[AUTH_TYPE] === 'admin'){ ?>
                                        <a href="report" class="btn btn-warning btn-sm mr-3">
                                        <i class="fa fa-arrow-left"></i> Back</a>
                                    <?php } ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-row">
                                            <?php require_once('./elements/components/filter.php') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                                $_SESSION['filtered_data'] = array();
                                $cat_id = $_POST['cat_id'] ?? 'select';
                                $created_at = $_POST['created_at'] ?? '';
                                $condition = $_SESSION[AUTH_TYPE] == 'admin' ? "id = {$_GET['id']}" : "id = {$_SESSION[AUTH_ID]}";
                                $condition .= ($cat_id != 'select') ? " AND categorytable.cat_id = '$cat_id' AND approvedtable.created_at = '$created_at' " : '';
                                $select = $DB->query("SELECT * FROM approvedtable
                                    INNER JOIN categorytable ON approvedtable.cat_id = categorytable.cat_id
                                    INNER JOIN users ON approvedtable.userID = users.id
                                    INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id
                                    WHERE $condition");
                            ?>
                            <table id="example1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Transaction ID</th>
                                        <?php if($_SESSION[AUTH_TYPE] === "admin"):?>
                                        <th>Department</th>
                                        <th>Fullname</th>
                                        <?php endif; ?>
                                        <th>Category</th>
                                        <th>Item Name</th>
                                        <th>Unit</th>
                                        <th>Cost</th>
                                        <th>Quantity</th>
                                        <th>Total Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($select->num_rows > 0) {
                                        while ($row = $select->fetch_assoc()) {
                                            $id = $row['request_id'];
                                            $_SESSION['filtered_data'][$id] = $row;
                                            ?>
                                            <tr class="text-center">
                                                <?php
                                                    $date = $row['created_at'];
                                                    $formatted_date = date('M, d, Y', strtotime($date));
                                                ?>
                                                <td><?php echo $formatted_date ?></td>
                                                <td class="text-capitalize"><?php echo $row['request_id'] ?></td>
                                                <?php if($_SESSION[AUTH_TYPE] === "admin"):?>
                                                <td class="text-capitalize"><?php echo $row['department'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['fullname'] ?></td>
                                                <?php endif; ?>
                                                <td class="text-capitalize"><?php echo $row['category'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['item_name'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['unit'] ?></td>
                                                <td><?php echo $row['cost'] ?></td>
                                                <td><?php echo $row['quantity'] ?></td>
                                                <td><?php echo $row['total_cost'] ?></td>           
                                            </tr>
                                        <?php }
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