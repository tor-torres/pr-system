<?php if (!defined('ACCESS'))
    die('DIRECT ACCESS NOT ALLOWED'); ?>

<?php
require('./init.php');
$results = $DB->query("SELECT * FROM users WHERE id=" . $_SESSION[AUTH_ID]);
$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="brand-link">
        <div class="effect">
            <h5 class="brand-text font-weight-light text-center">PROCUREMENT OFFICE</h5>
        </div>
    </div>

    <div class="sidebar">
        <div class="user-panel mt-4 pb-2 mb-4 d-flex">
            <div class="logo">
                <?php foreach ($users as $user): ?>
                    <?php if ($user['avatar'] == null) { ?>
                        <img class="img-circle elevation-2 ml-3" src="./assets/images/logo.png">
                    <?php } else { ?>
                        <img class="img-circle elevation-2 ml-3" src="./assets/images/<?php echo $user['avatar'] ?>">
                    <?php } ?>
                <?php endforeach; ?>
            </div>
            <div class="info">
                <a href='profile' class="d-block text-uppercase ml-2">
                    <?php foreach ($users as $user): ?>
                        <?php echo $user['fullname']; ?>
                    <?php endforeach; ?>
                </a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="default"
                        class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'default' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if ($_SESSION[AUTH_TYPE] == 'admin'): ?>
                    <li class="nav-item">
                        <a href="report"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'report' ? 'active' : ''; ?>">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Approved Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pending-list"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'pending-list' ? 'active' : ''; ?>">
                            <i class="fas fa-clock nav-icon"></i>
                            <p>Pending Request</p>
                        </a>
                    </li>
                    <li class="nav-header">Maintenance</li>
                    <li class="nav-item">
                        <a href="./category"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'category' ? 'active' : ''; ?>">
                            <i class="fas fa-chart-pie nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="item-list"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'item-list' ? 'active' : ''; ?>">
                            <i class="fas fa-inbox nav-icon"></i>
                            <p>Items List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./department"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'department' ? 'active' : ''; ?>">
                            <i class="fas fa-building nav-icon"></i>
                            <p>Department</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="user-list"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'user-list' ? 'active' : ''; ?>">
                            <i class="fas fa-users nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION[AUTH_TYPE] == 'user'): ?>
                    <li class="nav-item">
                        <a href="approved-list"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'approved-list' ? 'active' : ''; ?>">
                            <i class="fas fa-list nav-icon"></i>
                            <p>Approved Request</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pending-list"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'pending-list' ? 'active' : ''; ?>">
                            <i class="fas fa-clock nav-icon"></i>
                            <p>Pending Request</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="request-item"
                            class="nav-link <?php echo basename($_SERVER['REQUEST_URI']) == 'request-item' ? 'active' : ''; ?>">
                            <i class="fas fa-cart-plus nav-icon"></i>
                            <p>Request Item</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</aside>