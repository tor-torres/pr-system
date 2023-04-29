<?php if (!defined('ACCESS'))
    die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php
if (isset($_SESSION[AUTH_ID])) {
    redirect();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOG IN</title>
    <link rel="icon" href="assets/images/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="hold-transition login login-page text-xs">
    <div class="login-box">
        <div class="login-logo">
            <img src="assets/images/logo.png" class="logo-login">
            <h4 class="glow title">CPSU PROCUREMENT OFFICE</h4>
        </div>
        <div class="card">
            <div class="card-body login-card-body" style="width:200%; margin-left:-50%">
                <p class="login-box-msg">Sign up to start your session</p>
                <?= show_message() ?>
                <form method="post">
                    <input type="hidden" name="action" value="register_user">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="department">Department:</label>
                                <select class="form-control text-capitalize" id="dept_id" name="dept_id" required>
                                    <option value="">--Select--</option>
                                    <?php
                                    require('./init.php');
                                    $select = $DB->query("SELECT * FROM departmenttable");
                                    if ($select->num_rows > 0) {
                                        while ($row = $select->fetch_assoc()) { ?>
                                            <option value="<?php echo $row['dept_id'] ?>"><?php echo $row['department'] ?>
                                            </option>
                                        <?php }
                                    } else { ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="usertype">Position:</label>
                                <select name="usertype" id="usertype" class="form-control text-capitalize">
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="fullname">Fullname:</label>
                                <input type="text" name="fullname" id="fullname" class="form-control"
                                    placeholder="Please enter fullname" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Please enter username" required autofocus>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Please enter password" required>
                            </div>
                            <div class="col-6 pt-4">
                                <div class="icheck-success">
                                    <input type="checkbox" id="show" onclick="showPassword()">
                                    <label for="show">Show Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" name="submit" class="btn btn-success">Sign Up
                                <i class="fa fa-arrow-right"></i></button>
                        </div>
                        <div class="col-6">
                            <p class="login-box-msg text-sm">Already have an account? <a href="login"> Log In</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script>
        function showPassword() {
            const show = document.getElementById("password");
            show.type == "password" ? show.type = 'text' : show.type = 'password';
        }
    </script>

</body>

</html>