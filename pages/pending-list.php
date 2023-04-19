<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php 
    $results = $DB->query("SELECT * FROM users WHERE id=".$_SESSION[AUTH_ID]);
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pending Request</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pending Request</li>
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
                        <div class="card-body">
                            <?php
                                if($_SESSION[AUTH_TYPE] == 'admin') {
                                    $select = $DB->query("SELECT * FROM pendingtable INNER JOIN categorytable ON pendingtable.cat_id = categorytable.cat_id INNER JOIN users ON pendingtable.userID = users.id INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id");
                                }else{
                                    $select = $DB->query("SELECT * FROM pendingtable INNER JOIN categorytable ON pendingtable.cat_id = categorytable.cat_id INNER JOIN users ON pendingtable.userID = users.id INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id WHERE id = {$_SESSION[AUTH_ID]}");
                                }
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Transaction ID</th>
                                        <?php if($_SESSION[AUTH_TYPE] === "admin"): ?>
                                        <th>Department</th>
                                        <th>Fullname</th>
                                        <?php endif; ?>
                                        <th>Category</th>
                                        <th>Item Name</th>
                                        <th>Unit</th>
                                        <th>Cost</th>
                                        <th>Quantity</th>
                                        <th>Total Cost</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($select->num_rows > 0) {
                                        while ($row = $select->fetch_assoc()) {
                                            $id = $row['request_id'];
                                            ?>
                                            <tr class="text-center">
                                                <?php
                                                    $date = $row['created_at'];
                                                    $formatted_date = date('M, d, Y', strtotime($date));
                                                ?>
                                                <td><?php echo $formatted_date ?></td>
                                                <td class="text-capitalize"><?php echo $row['request_id'] ?></td>
                                                <?php if($_SESSION[AUTH_TYPE] === "admin"): ?>
                                                <td class="text-capitalize"><?php echo $row['department'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['fullname'] ?></td>
                                                <?php endif; ?>
                                                <td class="text-capitalize"><?php echo $row['category'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['item_name'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['unit'] ?></td>
                                                <td><?php echo $row['cost'] ?></td>
                                                <td><?php echo $row['quantity'] ?></td>
                                                <td><?php echo $row['total_cost'] ?></td>
                                                <?php if($_SESSION[AUTH_TYPE] == 'user' ) : ?>
                                                <td>
                                                    <a href="<?php echo SITE_URL ?>/edit-request-item&id=<?php echo $id ?>" class="btn btn-primary btn-xs">
                                                        <i class="fa fa-pen"></i>
                                                    </a>
                                                    <a href="./delete_item_requested&id=<?php echo $id ?>&action=delete_item_requested" class="btn btn-danger btn-xs btn-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                                <?php endif; ?>
                                                <?php if($_SESSION[AUTH_TYPE] == 'admin' ) : ?>
                                                <td class="text-center">
                                                <a href="./report&id=<?php echo $id ?>&action=report" class="btn btn-success btn-xs">
                                                <i class="fa fa-thumbs-up"></i> Approved
                                                </td>
                                                <?php endif; ?>
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