<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users List</li>
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
                            <?php require_once('./elements/components/add-user.php') ?>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Department</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Position</th>
                                        <th>Account Status</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $DB->query("SELECT * FROM users INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id");
                                    if ($query->num_rows > 0) {
                                        while ($row = $query->fetch_assoc()) {
                                            if($row['usertype'] === "user") : ?>
                                            <tr>
                                                <td class="text-capitalize"><?php echo $row['department'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['fullname'] ?></td>
                                                <td><?php echo $row['username'] ?></td>
                                                <td class="text-capitalize"><?php echo $row['usertype'] ?></td>
                                                <?php if ($row['status'] == 1): ?>
                                                    <td class="text-center">
                                                        <div class="label label-success text-success">Activated</div>
                                                    </td>
                                                <?php elseif ($row['status'] == 0): ?>
                                                    <td class="text-center">
                                                        <div class="label label-warning update-default text-danger" data-id="<?php echo $row['status'] ?>">Not Activated</div>
                                                    </td>
                                                <?php endif; ?>
                                                <td class="text-center">
                                                    <a href="<?php echo SITE_URL ?>/edit-user&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a data="<?php echo $row['id']; ?>" class="status-check btn-sm btn
                                                        <?php echo ($row['status']) ? 'btn-warning' : 'btn-success' ?>" >
                                                        <?php echo ($row['status']) ? '<i class="fa fa-times-circle"></i>' : '<i class="fa fa-check-circle"></i>' ?>
                                                    </a>
                                                    <a href="delete_user-list&id=<?php echo $row['id'] ?>&action=delete_user-list" class="btn btn-danger btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
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