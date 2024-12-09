<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary libraries for toast notifications -->
    <link rel="stylesheet" href="path_to_toast_css.css">
    <script src="path_to_toast_js.js"></script>
</head>
<?php 
session_start();
include('./db_connect.php');
ob_start();
// Preload system settings if needed
// ob_end_flush();

if (isset($_SESSION['login_id'])) {
    header("location:index.php?page=home");
}
?>
<?php include 'header.php' ?>
<body class="hold-transition login-page" style="background-color: #f0f0f0;">
<div class="login-box">
    <div class="card">
        <div class="card-header text-center">
            <h5 class="mb-0">AGYW</h5>
        </div>
        <div class="card-body login-card-body">
            <form action="" id="login-form">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" required placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" required placeholder="Password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" onclick="togglePasswordVisibility()">
                            <label for="remember">
                                Show Password
                            </label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
function togglePasswordVisibility() {
    var x = document.getElementById("password");
    x.type = x.type === "password" ? "text" : "password";
}

$(document).ready(function() {
    $('#login-form').submit(function(e) {
        e.preventDefault();
        start_load();
        if ($(this).find('.alert-danger').length > 0)
            $(this).find('.alert-danger').remove();

        $.ajax({
            url: 'route.php?action=login',
            method: 'POST',
            data: $(this).serialize(),
            error: function(err) {
                console.log(err);
                end_load();
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast('Login successful. Redirecting...', 'success');
                    setTimeout(function() {
                        location.href = 'index.php?page=home';
                    }, 2000);
                } else {
                    $('#msg').html("<div class='alert alert-danger'>Username or password is incorrect.</div>");
                    end_load();
                }
            }
        });
    });
});
</script>
<?php include 'footer.php' ?>
</body>
</html>
