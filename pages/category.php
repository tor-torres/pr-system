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
                            <?php require_once('./elements/components/add-category.php') ?>
                        </div>
                        <div class="card-body">
                            <?php $select = $DB->query("SELECT * FROM categorytable ORDER BY cat_id DESC"); ?>
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


