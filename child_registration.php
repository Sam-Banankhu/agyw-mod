<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-secondary">
		<div class="card-body">
			<form action="" id="child-form">

<?php 
      $user_id = $_SESSION['login_id'];
?>

 			  <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <input type="hidden" name="guardian_id" id="guardian_id" value="">
        <input type="hidden" name="form-name" value="child-form">
 			  <input type="hidden" name="created_by" id="created_by" value="<?php echo isset($user_id) ? $user_id : '' ?>">

			  <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="given_name" class="control-label">First Name <sup style="color: red;">*</sup></label>
              <input type="text" class="form-control form-control-sm" name="given_name" autocomplete="off" value="" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="family_name" class="control-label">Last Name <sup style="color: red;">*</sup></label>
              <input type="text" class="form-control form-control-sm" name="family_name" autocomplete="off" value="" required>
            </div>
          </div>
          <div class="col-md-4">
					  <div class="form-group">
						  <label for="hcc_number" class="control-label">HCC Number</label>
          	  <input type="text" class="form-control form-control-sm" name="hcc_number"  id="hcc_number" autocomplete="off" value="">
					  </div>
				  </div>
			  </div>
			  <hr>

			  <div class="row">
          <div class="col-md-4">
					  <div class="form-group">
						  <label for="arv_number" class="control-label">ARV Number</label>
          	  <input type="text" class="form-control form-control-sm" name="arv_number"  id="arv_number" autocomplete="off" value="">
					  </div>
				  </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="control-label">Age</label>
						  <input type="text" class="form-control form-control-sm" name="age" id="age" autocomplete="off" value="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="date_of_birth" class="control-label">Date of Birth <sup style="color: red;">*</sup></label>
              <input type="date" class="form-control form-control-sm" autocomplete="off" name="date_of_birth" id="date_of_birth" value="" required>
            </div>
          </div>
        </div>
        <hr>

			  <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label for="gender" class="control-label">Sex <sup style="color: red;">*</sup></label>
              <select class="form-control form-control-sm select2" name="gender" id="gender" value="<?php echo isset($gender) ? $gender : '' ?>" required>
                <option selected="true" disabled="disabled">--Select sex--</option>
                <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="parent_partner_name" class="control-label">Parent/guardian name  <sup style="color: red;">*</sup></label>
              <input type="text" class="form-control form-control-sm" name="parent_partner_name" id="parent_partner_name" autocomplete="off" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="parent_partner_phone_number" class="control-label">Parent/guardian Phone Number  <sup style="color: red;">*</sup></label>
              <input type="text"  pattern="[0-9]{10}" class="form-control form-control-sm" name="parent_partner_phone_number" id="parent_partner_phone_number" autocomplete="off" required>
            </div>
          </div>
          </div>
        <hr>

			  <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="reg_date" class="control-label">Registration Date <sup style="color: red;">*</sup></label>
              <input type="date" class="form-control form-control-sm" name="reg_date" id="reg_date" value="" required>
            </div>
          </div>
        </div>
        <hr>
        </form>
    	</div>
    	<div class="card-footer border-top border-secondary">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="child-form">Save </button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>

<script>
$(document).ready(function(){
  getParent();
  $('#child-form').submit(function(e){
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
					alert_toast(resp.message,"success");
					setTimeout(function(){
					 	location.href = 'index.php?page=child_visit&id='+resp.data.child_id
					},2000)
				}else {
          alert_toast(resp.message,"error");
        }
			},
      error: function(xhr, status, error) {
        console.error("AJAX Error:", error);
      }
		})
	})
});

function getParent() {
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get('parent_id');

  $.ajax({
    type: "POST",
    url: 'route.php?action=get',
    data: { type: 'parent', id:  id}, // Send data as an object
    dataType: "json",
  }).done(function(result) {
    console.log(result)
    $("#parent_partner_name").val(result[0].given_name+" "+result[0].family_name);
    $("#parent_partner_name").attr('disabled', 'disabled');
    $("#parent_partner_phone_number").val(result[0].phone_number);
    $("#parent_partner_phone_number").attr('disabled', 'disabled');
    $("#guardian_id").val(result[0].parent_id);
  });
}
</script>

