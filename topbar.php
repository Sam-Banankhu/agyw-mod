<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #3c8dbc">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button" style="color:white;">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li>
            <a class="nav-link text-white" href="./" role="button">
                <large>
                    <b style="color:white;"><?php echo "AGYW"; ?></b>
                </large>
            </a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="color:white;">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" aria-expanded="true" href="javascript:void(0)">
                <span>
                    <div class="d-flex badge-pill">
                        <span class="fa fa-user mr-2" style="color:white;"></span>
                        <span>
                            <b style="color:white;">
                                <?php
                                
                                if (isset($_SESSION['login_firstname']) && isset($_SESSION['login_lastname'])) {
                                    echo ucwords($_SESSION['login_firstname'] . " " . $_SESSION['login_lastname']);
                                } else {
                                    echo "User"; // Default fallback
                                }
                                ?>
                            </b>
                        </span>
                        <span class="fa fa-angle-down ml-2" style="color:white;"></span>
                    </div>
                </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_account">
                    <i class="fa fa-cog"></i> Manage Account
                </a>
                <a class="dropdown-item" href="route.php?action=logout">
                    <i class="fa fa-power-off"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<script>
    $('#manage_account').click(function () {
        // Open the manage account modal
        uni_modal('Manage Account', 'manage_user.php?id=<?php echo isset($_SESSION['login_id']) ? $_SESSION['login_id'] : 0; ?>');
    });
</script>
