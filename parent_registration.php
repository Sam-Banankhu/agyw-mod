<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-secondary">
		<div class="card-body">
			<form action="" id="parent-form">

<?php 
  $user_id = 1; //$_SESSION['login_id']; 
?>
        <input type="hidden" name="id" value="">
        <input type="hidden" name="form-name" value="parent-form">
 			  <input type="hidden" name="created_by" id="created_by" value="<?php echo isset($user_id) ? $user_id : '1' ?>">

			  <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="reg_date" class="control-label">Registration Date <sup style="color: red;">*</sup></label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="reg_date" id="reg_date" value="" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="inclusion_criteria" class="control-label">Inclusion criteria</label>
              <select class="form-control form-control-sm select2" name="inclusion_criteria[]" id="inclusion_criteria" value="" multiple>
                <option value="HIV+ and fully disclosed">HIV+ and fully disclosed</option>
                <option value="Aged between 10 and 24 years">Aged between 10 and 24 years</option>
                <option value="Pregnant">Pregnant</option>
                <option value="Has exposed child (less than 2 years)">Has exposed child (less than 2 years)</option>
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
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="control-label">Age</label>
						  <input type="text" class="form-control form-control-sm" name="age" autocomplete="off" value="">
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
              <label for="place_of_residence" class="control-label">Place of residence</label>
              <input type="text" class="form-control form-control-sm" autocomplete="off" name="place_of_residence" id="place_of_residence" value="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="control-label">Phone Number</label>
              <input type="text"  pattern="[0-9]{10}" class="form-control form-control-sm" autocomplete="off" name="phone_number" value="">
            </div>
          </div>
        </div>
        <hr>

			  <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="marital_status" class="control-label">Marital status</label>
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
              <label for="parent_partner_name" class="control-label">Parent/partner name</label>
              <input type="text" class="form-control form-control-sm" name="parent_partner_name" id="parent_partner_name" value="<?php echo isset($parent_partner_name) ? $parent_partner_name : '' ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="parent_partner_phone_number" class="control-label">Parent/partner Phone Number</label>
              <input type="text"  pattern="[0-9]{10}" class="form-control form-control-sm" name="parent_partner_phone_number" id="parent_partner_phone_number" value="<?php echo isset($parent_partner_phone_number) ? $parent_partner_phone_number : '' ?>">
            </div>
          </div>
        </div>
        <hr>

      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label for="add_inclusion_criteria" class="control-label">Additional Inclusion criteria</label>
              <select class="form-control form-control-sm select2" name="add_inclusion_criteria[]" id="add_inclusion_criteria" value="" multiple>
                <option value="Teen Mother">Teen Mother</option>
                <option value="From Ultra-poor families">From Ultra-poor families</option>
                <option value="Previous Teen Club Member">Previous Teen Club Member</option>
                <option value="Orphan">Orphan</option>
                <option value="From child headed family">From child headed family</option>
                <option value="No partner support">No partner support</option>
                <option value="Physical disabilities">Physical disabilities</option>
                <option value="Excluded from education">Excluded from education</option>
                <option value="Victim of Gender Based Violence">Victim of Gender Based Violence</option>
                <option value="Poor ART adherence">Poor ART adherence</option>
                <option value="High risk behaviour as having multiple partners">High risk behaviour as having multiple partners</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>
        </div>
        <hr>
        </form>
        <!--button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#successConfirmationModal" data-encounter="tb_test" data-pid="xxx" data-id="1"><i class="fas fa-trash"></i> Delete</button>';
-->
      </div>
    	<div class="card-footer border-top border-secondary">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="parent-form">Save </button>
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
$(document).ready(function(){
  var today = new Date();
  var yyyy = today.getFullYear();
  var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  var dd = String(today.getDate()).padStart(2, '0');
  var maxDate = yyyy + '-' + mm + '-' + dd;

  $('#reg_date, #date_of_birth').attr('max', maxDate);

  $('#reg_date').blur(function(event){
    var today = new Date();
    var yyyy = today.getFullYear() - 17;
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var dd = String(today.getDate()).padStart(2, '0');
    var maxDate = yyyy + '-' + mm + '-' + dd;

    $('#date_of_birth').attr('max', maxDate);
  });

  $('#date_of_birth').blur(function(event) {
        var dobDate = new Date($(this).val());
        var entryDate = new Date($("#reg_date").val());
        var age = entryDate.getFullYear() - dobDate.getFullYear();
        var monthDifference = entryDate.getMonth() - dobDate.getMonth();
        
        if (monthDifference < 0 || (monthDifference === 0 && entryDate.getDate() < dobDate.getDate())) {
          age--;
        }

        if (age < 10 || age > 24) {
          event.preventDefault();
          alert_toast("The client must be between 10 and 24 years of age!","error");
          $(this).focus();
        }
    });

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

