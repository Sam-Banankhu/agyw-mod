<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
    <div class="card card-outline card-secondary">
        <div class="card-body">
            <form action="" id="parent-form">

<?php 
  $user_id = $_SESSION['login_user_id']; 
?>
            <input type="hidden" name="id" value="">
            <input type="hidden" name="form-name" value="parent-form">
            <input type="hidden" name="created_by" id="created_by" value="<?php echo isset($user_id) ? $user_id : '1' ?>">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="inclusion_criteria" class="control-label">Inclusion Criteria</label>
                        <select class="form-control form-control-sm select2" name="inclusion_criteria[]" id="inclusion_criteria" value="" multiple>
                            <?php 
                                $query_inclusion_criteria = "SELECT * FROM inclusion_criteria";
                                $result_inclusion_criteria = mysqli_query($conn, $query_inclusion_criteria);
                                while ($row = mysqli_fetch_assoc($result_inclusion_criteria)): 
                            ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['criteria_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="arv_number" class="control-label">ARV Number</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" name="arv_number"  id="arv_number" value="">
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="given_name" class="control-label">First Name <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" name="given_name" value="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="family_name" class="control-label">Last Name <sup style="color: red;">*</sup></label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" name="family_name" value="" required>
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date_of_birth" class="control-label">Date of Birth <sup style="color: red;">*</sup></label>
                        <input type="date" class="form-control form-control-sm" autocomplete="off" name="date_of_birth" id="date_of_birth" value="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="place_of_residence" class="control-label">Place of Residence</label>
                        <input type="text" class="form-control form-control-sm" autocomplete="off" name="place_of_residence" id="place_of_residence" value="">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone_number" class="control-label">Phone Number</label>
                        <input type="text"  pattern="[0-9]{10}" class="form-control form-control-sm" autocomplete="off" name="phone_number" value="">
                    </div>
                </div>
            </div>
            <hr>

            <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="marital_status" class="control-label">Marital Status</label>
            <select class="form-control form-control-sm select2" name="marital_status" id="marital_status" value="">
                <option selected="true" disabled="disabled">--Select Marital Status--</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="parent_partner_name" class="control-label">Parent/Partner Name</label>
            <input type="text" class="form-control form-control-sm" name="parent_partner_name" id="parent_partner_name" value="<?php echo isset($parent_partner_name) ? $parent_partner_name : '' ?>" disabled>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="parent_partner_phone_number" class="control-label">Parent/Partner Phone Number</label>
            <input type="text"  pattern="[0-9]{10}" class="form-control form-control-sm" name="parent_partner_phone_number" id="parent_partner_phone_number" value="<?php echo isset($parent_partner_phone_number) ? $parent_partner_phone_number : '' ?>" disabled>
        </div>
    </div>
</div>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="add_inclusion_criteria" class="control-label">Additional Inclusion Criteria</label>
                        <select class="form-control form-control-sm select2" name="add_inclusion_criteria[]" id="add_inclusion_criteria" value="" multiple>
                            <?php 
                                $query_additional_inclusion_criteria = "SELECT * FROM additional_inclusion_criteria";
                                $result_additional_inclusion_criteria = mysqli_query($conn, $query_additional_inclusion_criteria);
                                while ($row = mysqli_fetch_assoc($result_additional_inclusion_criteria)): 
                            ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['criteria_name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr>

        </form>
        <!--button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#successConfirmationModal" data-encounter="tb_test" data-pid="xxx" data-id="1"><i class="fas fa-trash"></i> Delete</button>-->

    </div>
    <div class="card-footer border-top border-secondary">
        <div class="d-flex w-100 justify-content-center align-items-center">
            <button class="btn btn-flat bg-gradient-primary mx-2" form="parent-form">Save</button>
            <button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=patient_lookup'">Cancel</button>
        </div>
    </div>
</div>

</div>

<div class="modal fade" id="successConfirmationModal" tabindex="-1" aria-labelledby="successConfirmationModalLabel" aria-hidden="true" data-backdrop="static" data-parent-id=3>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successConfirmationModalLabel">Success!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Parent/guardian has successfully been registered. Would you like to add a child to this parent/guardian?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" id="finishButton" data-bs-dismiss="modal">Finish</button>
                <button type="button" class="btn btn-sm btn-primary" id="confirmButton">Register child</button>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    // When the marital status changes, enable or disable the partner fields
    $('#marital_status').change(function() {
        if ($(this).val() == 'Married') {
            $('#parent_partner_name').prop('disabled', false);
            $('#parent_partner_phone_number').prop('disabled', false);
        } else {
            $('#parent_partner_name').prop('disabled', true);
            $('#parent_partner_phone_number').prop('disabled', true);
        }
    });
});
$(document).ready(function(){
    var today = new Date();
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var dd = String(today.getDate()).padStart(2, '0');
    var maxDate = yyyy + '-' + mm + '-' + dd;

    $('#date_of_birth').attr('max', maxDate);

    $('#parent-form').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'route.php?action=save',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            dataType: "json",
            success:function(resp){
                if(resp.success){
                    $('#successConfirmationModal').attr('data-parent-id', resp.data.parent_id)
                    $("#preloader2").hide();
                    $('#successConfirmationModal').modal('show');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        })
    })

    $('#confirmButton').on('click',function() {
        start_load();
        var parent_id = $("#successConfirmationModal").attr('data-parent-id');
        location.href = 'index.php?page=child_registration&parent_id='+parent_id;
    });

    $('#finishButton').on('click',function() {
        start_load();
        var parent_id = $("#successConfirmationModal").attr('data-parent-id');
        location.href = 'index.php?page=parent_visit&id='+parent_id;
    });

});
</script>
