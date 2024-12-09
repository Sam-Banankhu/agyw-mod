<?php
// Include the database connection
include_once 'db_connect.php';

// Fetch user types dynamically from the database
$user_types_query = $conn->query("SELECT user_type_id, type_name FROM user_types ORDER BY type_name ASC");
$user_types = $user_types_query->fetch_all(MYSQLI_ASSOC);
?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <form action="" id="manage_user">
                <input type="hidden" name="user_id" value="<?php echo isset($user_id) ? $user_id : '' ?>">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">First Name</label>
                            <input type="text" name="firstname" class="form-control form-control-sm" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control form-control-sm" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">User Role</label>
                            <select name="user_type_id" class="custom-select custom-select-sm" required>
                                <option value="" disabled selected>Select a Role</option>
                                <?php foreach ($user_types as $type): ?>
                                    <option value="<?php echo $type['user_type_id']; ?>" 
                                        <?php echo isset($user_type_id) && $user_type_id == $type['user_type_id'] ? 'selected' : ''; ?>>
                                        <?php echo $type['type_name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" class="form-control form-control-sm" name="email" required value="<?php echo isset($email) ? $email : '' ?>">
                            <small id="msg"></small>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" class="form-control form-control-sm" name="password" <?php echo !isset($user_id) ? "required" : '' ?>>
                            <small>
                                <i><?php echo isset($user_id) ? "Leave this blank if you don't want to change the password." : ''; ?></i>
                            </small>
                        </div>
                        <div class="form-group">
                            <label class="label control-label">Confirm Password</label>
                            <input type="password" class="form-control form-control-sm" name="cpass" <?php echo !isset($user_id) ? 'required' : '' ?>>
                            <small id="pass_match" data-status=''></small>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-secondary" type="button" onclick="location.href='index.php?page=user_list'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // Validate password match
    $('[name="password"],[name="cpass"]').keyup(function(){
        var pass = $('[name="password"]').val();
        var cpass = $('[name="cpass"]').val();
        if (cpass === '' || pass === '') {
            $('#pass_match').attr('data-status', '');
        } else {
            if (cpass === pass) {
                $('#pass_match').attr('data-status', '1').html('<i class="text-success">Password Matched.</i>');
            } else {
                $('#pass_match').attr('data-status', '2').html('<i class="text-danger">Password does not match.</i>');
            }
        }
    });

    // Submit form
    $('#manage_user').submit(function(e){
        e.preventDefault();
        $('input').removeClass("border-danger");
        start_load();
        $('#msg').html('');
        
        if ($('[name="password"]').val() !== '' && $('[name="cpass"]').val() !== '') {
            if ($('#pass_match').attr('data-status') != 1) {
                $('[name="password"],[name="cpass"]').addClass("border-danger");
                end_load();
                return false;
            }
        }

        $.ajax({
            url: 'route.php?action=save_user',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            success: function(resp) {
                if (resp == 1) {
                    alert_toast('Data successfully saved.', "success");
                    setTimeout(function(){
                        location.replace('index.php?page=user_list');
                    }, 750);
                } else if (resp == 2) {
                    $('#msg').html("<div class='alert alert-danger'>Email already exists.</div>");
                    $('[name="email"]').addClass("border-danger");
                    end_load();
                }
            }
        });
    });
});
</script>
