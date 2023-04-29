<?php if (!defined('ACCESS'))
    die('DIRECT ACCESS NOT ALLOWED'); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php
$query = $DB->query("SELECT * FROM users INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id WHERE id = '{$_SESSION[AUTH_ID]}'");
$users = $query->fetch_object();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="default" class="btn btn-primary btn-md">
                                    <i class="fa fa-arrow-left"></i> Back</a>
                            </h3>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Profile</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="update_profile">
                                                <div class="form-group">
                                                    <label for="avatar">Upload Profile Avatar:</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="avatar"
                                                                name="avatar" accept=".jpg, .jpeg, .png" required>
                                                            <label class="custom-file-label" for="avatar">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-6">
                                                            <label for="department">Department:</label>
                                                            <select class="form-control text-capitalize" id="dept_id"
                                                                name="dept_id" required>
                                                                <?php
                                                                $select = $DB->query("SELECT * FROM departmenttable");
                                                                if ($select->num_rows > 0) {
                                                                    while ($row = $select->fetch_assoc()) { ?>
                                                                        <option value="<?php echo $row['dept_id'] ?>" <?php if ($users->dept_id == $row['dept_id'])
                                                                            echo "selected=selected" ?>><?php echo $row['department'] ?></option>
                                                                    <?php }
                                                                } else { ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="usertype">Role:</label>
                                                            <input type="text" class="form-control text-capitalize"
                                                                name="usertype" id="usertype"
                                                                value="<?php echo $users->usertype ?>" disabled
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-6">
                                                            <label for="fullname">Full name:</label>
                                                            <input type="text" class="form-control text-capitalize"
                                                                id="fullname" name="fullname"
                                                                placeholder="Enter Fullname"
                                                                value="<?php echo $users->fullname ?>" required>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="username">Username:</label>
                                                            <input type="text" class="form-control" id="username"
                                                                name="username" placeholder="Enter Username"
                                                                value="<?php echo $users->username ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-6">
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-dismiss="modal">
                                                                <i class="fa fa-times-circle"></i> Cancel
                                                            </button>
                                                            <button type="submit" name="btn-submit"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-check-circle"></i> Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-info">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Password</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <input type="hidden" name="action" value="update_password">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <label for="password">Password:</label>
                                                            <input type="password" class="form-control text-capitalize"
                                                                id="password" name="password"
                                                                placeholder="Enter New Password" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-6">
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-dismiss="modal">
                                                                <i class="fa fa-times-circle"></i> Cancel
                                                            </button>
                                                            <button type="submit" name="btn-submit"
                                                                class="btn btn-success btn-sm">
                                                                <i class="fa fa-check-circle"></i> Update
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
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <?php if($users->avatar == null){ ?>
                                    <img class="img-fluid img-circle" src="./assets/images/logo.png"
                                    width="100px">
                                <?php }else{ ?>
                                    <img class="img-fluid img-circle" src="./assets/images/<?php echo $users->avatar ?>"
                                    width="100px">
                                <?php } ?>
                            </div>
                            <h5 class="profile-username text-center text-capitalize">
                                <?php echo $users->fullname ?>
                            </h5>
                            <p class="text-muted text-center text-uppercase mb-0">
                                <?php echo $users->usertype ?>
                            </p>
                            <p class="text-muted text-center text-uppercase">
                                <?php echo $users->department ?>
                            </p>
                            <div class="col-md-12 text-center">
                                <button class="btn btn-success btn-md" data-toggle="modal"
                                    data-target="#modal-default"><b>Update Profile</b></button>
                                <button class="btn btn-warning btn-md" data-toggle="modal"
                                    data-target="#modal-info"><b>Change Password</b></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= element('footer'); ?>
<?= element('sweetalert'); ?>