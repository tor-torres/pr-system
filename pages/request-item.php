<?php if (!defined('ACCESS')) die('DIRECT ACCESS NOT ALLOWED'); ?>

<?= element('header'); ?>
<?= element('modal-logout'); ?>
<?= element('sidebar'); ?>

<?php
$query = $DB->query("SELECT * FROM users WHERE id=".$_SESSION[AUTH_ID]);
$user = $query->fetch_object();
?>

<div class="content-wrapper mb-3">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Request Item</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Dashboard</a></li>
                        <li class="breadcrumb-item active">Request Item</li>
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
                            <form method="post">
                                <input type="hidden" name="action" value="request_item">
                                <input type="hidden" name="userID" value="<?php echo $user->id ?>">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <?php
                                                $category = '';
                                                $query = $DB->query(" SELECT * FROM itemtable INNER JOIN categorytable ON itemtable.cat_id = categorytable.cat_id GROUP BY itemtable.cat_id");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                    $category .= '<option value="' . $row["cat_id"] . '">' . $row["category"] . '</option>';
                                                }
                                            ?>
                                            <label for="category">Category:</label>
                                            <select class="form-control text-capitalize action" name="cat_id" id="category" required>
                                                <option value="">Select Category</option>
                                                <?php echo $category; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="item_name">Item Name:</label>
                                            <!-- Item dropdown -->
                                            <select class="form-control text-capitalize action" name="item_name" id="item_name">
                                                <option value="">Please Select Category First</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <label for="unit">Unit:</label>
                                                <select class="form-control text-capitalize action" name="unit" id="unit" required>
                                                    <option>Unit</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="cost">Cost:</label>
                                                <!--Cost dropdown-->
                                                <select class="form-control action" name="cost" id="cost">
                                                    <option>Item Cost</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-lg-6">
                                                <label for="quantity">Quantity:</label>
                                                <input type="number" min="0" oninput="validity.valid || (value='');" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity" onkeyup="multiply(this.value);" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="total_cost"> Total Cost:</label>
                                                <input type="number" name="total_cost" id="total_cost" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-12">
                                            <label for="purpose">Purpose:</label>
                                            <textarea name="purpose" id="purpose" class="form-control" placeholder="Please Enter Purpose"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-lg-6">
                                            <a href="./" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i> Cancel
                                            </a>
                                            <button type="submit" name="btn-submit" class="btn btn-success btn-sm">
                                                <i class="fa fa-save"></i> Submit
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

<script>
    $(document).ready(function(){
    $('.action').change(function(){
        if($(this).val() != ''){
            var action = $(this).attr("id");
            var query = $(this).val();
            var result = '';
            if(action == "category"){
                result = 'item_name';
            }else if(action == "item_name"){
                result = 'unit';
            }else if(action == "unit"){
                result = 'cost'
            }
            $.ajax({
                url:"fetch-item",
                method:"POST",
                data:{action:action, query:query},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        }
    });
});
</script>