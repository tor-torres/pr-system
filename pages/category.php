<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                                <i class="fa fa-plus-circle"></i> Add</button>
                            </h3>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <input type="hidden" name="action" value="create_category">
                                                <div class="form-group">
                                                    <div class="form-row">
                                                        <div class="col-lg-12">
                                                            <label for="category">Category:</label>
                                                            <input type="text" class="form-control text-capitalize" id="category" name="category" placeholder="Enter Category" required autofocus>
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
                                                                <i class="fas fa-plus-circle"></i> Add
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
                            <?php $select = $DB->query("SELECT * FROM categorytable"); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($select->num_rows > 0){
                                        while($row = $select->fetch_assoc()) { ?>
                                            <tr>
                                                <td class="text-capitalize">
                                                    <?php echo $row['category'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo SITE_URL ?>/edit-category&id=<?php echo $row['cat_id'] ?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pen"></i> Edit
                                                    </a>
                                                    <a href="delete_category&id=<?php echo $row['cat_id'] ?>&action=delete_category" class="btn btn-danger btn-sm btn-delete">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php  }
                                    }else{ ?>
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


