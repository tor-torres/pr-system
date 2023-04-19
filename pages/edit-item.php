<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php 
    $id = $_GET['id'];
    $select = $DB->query( "SELECT * FROM itemtable WHERE id = $id" );
    $items = $select->fetch_object();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Update Item</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="item-list">Item List</a></li>
                        <li class="breadcrumb-item active">Update Item</li>
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
                                <a href="item-list" class="btn btn-primary btn-sm">
                                <i class="fa fa-arrow-left"></i> Back</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <input type="hidden" name="action" value="update_item">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <label for="category">Category:</label>
                                            <select class="form-control text-capitalize" id="category" name="cat_id" required>
                                                <option value="">--Select--</option>
                                                <?php 
                                                    $select = $DB->query("SELECT * FROM categorytable");  
                                                    if ($select->num_rows > 0) {
                                                    while ($row = $select->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['cat_id']?>" <?php if($items->cat_id == $row['cat_id']) echo "selected=selected" ?>><?php echo $row['category']?></option>
                                                    <?php  }
                                                    } else { ?>
                                                <?php } ?>
                                            </select> 
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="item_name">Item Name:</label>
                                            <input type="text" id="item_name" name="item_name" class="form-control text-capitalize" placeholder="Enter Item Name" value="<?php echo $items->item_name ?>"required>
                                        </div>
                                    </div>
                                </div>  
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <label for="cost">Cost:</label>
                                            <input type="number" min= "0" oninput="validity.valid || (value='');" id ="cost" name="cost" class="form-control" value="<?php echo $items->cost ?>" placeholder="Enter Item Cost" required>
                                        </div>
                                        <div class="col-lg-6">
                                        <label for="unit">Unit:</label>
                                        <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $items->unit ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <a href="category" class="btn btn-danger btn-sm">
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
