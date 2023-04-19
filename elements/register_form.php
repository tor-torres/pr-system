<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGN UP</title>
    <link rel="icon" href="assets/images/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition login login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="assets/images/logo.png" class="logo-login">
            <h4 class="glow title">CPSU PROCUREMENT OFFICE</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?= show_validation() ?>
                <form method="post">
                    <input type="hidden" name="action" value="register_user">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="department">Departmemt:</label>
                                <select class="form-control text-capitalize" name="department" id="department" required>
                                    <option selected="selected">--Select--</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="usertype">Role:</label>
                                <select class="form-control" name="usertype" id="usertype" required>
                                    <option selected="selected">--Select--</option>
                                    <option selected="admin"> Admin </option>
                                    <option selected="user"> User </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-12">
                                <label for="fullname">Fullname:</label>
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Please Enter Fullname" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-success">
                                <input type="checkbox" id="show" onclick="showPassword()">
                                <label for="show">Show Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-success btn-block mt-3">Sign In <i class="fa fa-arrow-right"></i></button>
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
    <!-- Main Script -->
    <script src="assets/js/script.js"></script>
    <!-- Toastr -->
    <script src="assets/plugins/toastr/toastr.min.js"></script>
</body>

</html>