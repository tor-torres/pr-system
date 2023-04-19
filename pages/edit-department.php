<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php
$department = $_GET['id'];
$query = $DB->query("SELECT * FROM departmenttable WHERE dept_id = $department");
$dept = $query->fetch_object();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="department">Category</a></li>
                        <li class="breadcrumb-item active">Update Category</li>
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
                                <a href="department" class="btn btn-primary btn-sm">
                                    <i class="fa fa-arrow-left"></i> Back</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <input type="hidden" name="action" value="update_department">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label for="department">Department:</label>
                                            <input type="text" name="department" id="department" class="form-control text-capitalize" value="<?php echo $dept->department; ?>" placeholder="Please Enter Department" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <a href="department" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i> Cancel
                                            </a>
                                            <button type="submit" name="btn-submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-save"></i> Update
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
    </section>
</div>

<?= element('footer'); ?>
<?= element('sweetalert'); ?>
