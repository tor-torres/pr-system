<?php if( ! defined( 'ACCESS' ) ) die( 'DIRECT ACCESS NOT ALLOWED' ); ?>

<?= element( 'header' ); ?>
<?= element( 'modal-logout' ); ?>
<?= element( 'sidebar' ); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="default">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    $result = $DB->query("SELECT usertype FROM users WHERE id = '{$_SESSION[AUTH_ID]}' ");
    $row = $result->fetch_assoc();
    $usertype = $row['usertype'];
    ?>
    <?php if($usertype === "admin"){ ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-3 col-6">
                    <div class="small-box box-one">
                        <div class="inner">
                        <?php
                                $query = $DB->query( "SELECT * FROM approvedtable" );
                                if($total = mysqli_num_rows($query)){
                                    echo '<h3>'.$total.'</h3>';
                                }else{
                                    echo '<h3>0</h3>';
                                }
                            ?>
                            <p><b>APPROVED</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <a href="./report" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box-two">
                        <div class="inner">
                        <?php
                                $query = $DB->query( "SELECT * FROM pendingtable" );
                                if($total = mysqli_num_rows($query)){
                                    echo '<h3>'.$total.'</h3>';
                                }else{
                                    echo '<h3>0</h3>';
                                }
                            ?>
                            <p><b>PENDING</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <a href="./pending-list" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box">
                        <div class="inner">
                        <?php
                            $query = $DB->query( "SELECT * FROM categorytable" );
                            if($total = mysqli_num_rows($query)){
                                echo '<h3>'.$total.'</h3>';
                            }else{
                                echo '<h3>0</h3>';
                            }
                        ?>
                        <p><b>Categories</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <a href="category" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box">
                        <div class="inner">
                            <?php
                                $query = $DB->query( "SELECT * FROM itemtable" );
                                if($total = mysqli_num_rows($query)){
                                    echo '<h3>'.$total.'</h3>';
                                }else{
                                    echo '<h3>0</h3>';
                                }
                            ?>
                            <p><b>Item List</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <a href="item-list" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box">
                        <div class="inner">
                            <?php
                                $query = $DB->query( "SELECT * FROM departmenttable" );
                                if($total = mysqli_num_rows($query)){
                                    echo '<h3>'.$total.'</h3>';
                                }else{
                                    echo '<h3>0</h3>';
                                }
                            ?>
                            <p><b>Departments</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <a href="department" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box">
                        <div class="inner">
                        <?php
                                $query = $DB->query( "SELECT usertype FROM users WHERE usertype = 'user' " );
                                if($total = mysqli_num_rows($query)){
                                    echo '<h3>'.$total.'</h3>';
                                }else{
                                    echo '<h3>0</h3>';
                                }
                            ?>
                            <p><b>Users</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="user-list" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }elseif($usertype === "user"){ ?>
        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box box-one">
                        <div class="inner">
                            <?php
                                $query = $DB->query("SELECT * FROM approvedtable INNER JOIN users ON approvedtable.userID = users.id INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id WHERE id ={$_SESSION[AUTH_ID]}");
                                if($total = mysqli_num_rows($query)){
                                    echo '<h3>'.$total.'</h3>';
                                }else{
                                    echo '<h3>0</h3>';
                                }
                            ?>
                            <p><b>APPROVED</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-thumbs-up"></i>
                        </div>
                        <a href="./approved-list" class="small-box-footer">
                        View Approved Request<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box-two">
                        <div class="inner">
                        <!-- ADMIN -->
                        <?php
                            $query = $DB->query("SELECT * FROM pendingtable INNER JOIN users ON pendingtable.userID = users.id INNER JOIN departmenttable ON users.dept_id = departmenttable.dept_id WHERE id ={$_SESSION[AUTH_ID]}");
                            if($total = mysqli_num_rows($query)){
                                echo '<h3>'.$total.'</h3>';
                            }else{
                                echo '<h3>0</h3>';
                            }
                        ?>
                            <p><b>PENDING</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <a href="./pending-list" class="small-box-footer">
                        View Pending Request <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box box-three">
                        <div class="inner">
                            <h3 class="weight">New</h3>
                            <p><b>REQUEST</b></p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cart-plus"></i>
                        </div>
                        <a href="./request-item" class="small-box-footer">
                        Request Item <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }?>
</div>
<?= element( 'footer' ); ?>