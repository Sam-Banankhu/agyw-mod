<?php if(!isset($conn)){ include 'db_connect.php'; } 

date_default_timezone_set('Africa/Blantyre');
$my_date = date('Y-m-d h:i:s', time());

$user_id = $_SESSION['login_id']; 
?>

<div class="modal-header">
        <h5 class="modal-title text-center" id="pVisitModal">Parent Visit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body col-md-12">
      <form action="" id="parent-visit-form">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="parent_id" id="parent_id" value="">
        <input type="hidden" name="form-name" value="parent-visit-form">
 		    <input type="hidden" name="created_by" id="created_by" value="<?php echo isset($user_id) ? $user_id : '' ?>">
        
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="meeting_date" class="control-label">Meeting date <sup style="color: red;">*</sup></label>
              <input type="date" class="form-control form-control-sm" name="meeting_date" id="meeting_date" value="" required>
            </div>
          </div>
          <div class="col-md-3">
			<div class="form-group">
			  <label for="service" class="control-label">Services accessed</label>
              <select class="form-control form-control-sm select2" name="service[]" id="service" value="" multiple>
                <option>FP</option>
                <option>MIP</option>
                <option>VIA</option>
                <option>ANC</option>
                <option>PSS</option>
                <option>LSE</option>
              </select>
			</div>
		  </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="adherence" class="control-label">Adherence</label>
              <input type="number" class="form-control form-control-sm" name="adherence" id="adherence" value="">
            </div>
          </div>
          <div class="col-md-3">
			<div class="form-group">
			  <label for="eligible_for_vl" class="control-label">Eligible for VL</label>
              <select class="form-control form-control-sm select2" name="eligible_for_vl" id="eligible_for_vl" value="">
                <option selected="true" disabled="disabled">--Is the client eligible for VL?--</option>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
              </select>
			</div>
		  </div>
		</div>
		<hr>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="date_of_vl_test" class="control-label"> Date of VL Test</label>
              <input type="date" class="form-control form-control-sm" name="date_of_vl_test" id="date_of_vl_test" value="<?php echo isset($date_of_vl_test) ? $date_of_vl_test : '' ?>" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="vl_result" class="control-label">VL Result </label>
              <select class="form-control form-control-sm select2" name="vl_result" value="<?php echo isset($vl_result) ? $vl_result : '' ?>" required>
                <option selected="true" disabled="disabled">--VL Result--</option>
                <option <?php echo isset($vl_result) && $vl_result == '>= 100' ? 'selected' : '' ?>>>= 100</option>
                <option  <?php echo isset($vl_result) && $vl_result == '< 1000' ? 'selected' : '' ?>>< 1000</option>
                <option  <?php echo isset($vl_result) && $vl_result == 'Not Received' ? 'selected' : '' ?>>Not Received</option>
              </select>
            </div>
          </div>          
          <div class="col-md-3">
			<div class="form-group">
			  <label for="iac_conducted" class="control-label">IAC session conducted</label>
              <select class="form-control form-control-sm select2" name="iac_conducted" id="iac_conducted" value="">
                <option selected="true" disabled="disabled">--If VL HIGH, Is IAC conducted?--</option>
                <option value='Yes'>Yes</option>
                <option value='No'>No</option>
              </select>
			</div>
		  </div>
          <div class="col-md-3">
			<div class="form-group">
			  <label for="second_vl_conducted" class="control-label">2nd VL conducted</label>
              <select class="form-control form-control-sm select2" name="second_vl_conducted" id="second_vl_conducted" value="">
                <option selected="true" disabled="disabled">--Was 2nd VL conducted?--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
			</div>
		  </div>
          </div>
		<hr>

        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="second_vl_result" class="control-label">2nd VL Result </label>
              <select class="form-control form-control-sm select2" name="second_vl_result" id="second_vl_result" value="">
                <option selected="true" disabled="disabled">--2nd VL Result--</option>
                <option value=">= 100">= 100</option>
                <option value="< 1000">< 1000</option>
                <option value="Not Received">Not Received</option>
              </select>
            </div>
          </div> 
          <div class="col-md-3">
            <div class="form-group">
              <label for="second_vl_decision" class="control-label">2nd VL Decision </label>
              <select class="form-control form-control-sm select2" name="second_vl_decision" value="">
                <option selected="true" disabled="disabled">--2nd VL Decision--</option>
                <option value="Switched to 2nd Line">Switched to 2nd Line</option>
              </select>
            </div>
          </div> 
          <div class="col-md-3">
			<div class="form-group">
			  <label for="malnutrition_status" class="control-label">Malnutrition status</label>
              <select class="form-control form-control-sm select2" name="malnutrition_status" id="malnutrition_status" value="">
                <option selected="true" disabled="disabled">--Malnutrition status--</option>
                <option value="None">None</option>
                <option value="Moderate">Moderate</option>
                <option value="Severe">Severe</option>
              </select>
			</div>
		  </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="return_to_school" class="control-label">Gone back to school <sup style="color: red;">*</sup></label>
              <select class="form-control form-control-sm select2" name="return_to_school" id="return_to_school" value="">
                <option selected="true" disabled="disabled">--Gone back to school--</option>
                <option <?php echo isset($return_to_school) && $return_to_school == 'Yes' ? 'selected' : '' ?>>Yes</option>
                <option <?php echo isset($return_to_school) && $return_to_school == 'No' ? 'selected' : '' ?>>No</option>
              </select>
            </div>
          </div>
          </div>
		<hr>

        <div class="row">
          <div class="col-md-3">
			<div class="form-group">
			  <label for="outcome" class="control-label">Outcome</label>
        <select class="form-control form-control-sm select2" name="outcome" id="outcome" value="">
              <option selected="true" disabled="disabled">--Outcome--</option>
              <option value="Defaulted">Defaulted</option>
              <option value="Died">Died</option>
              <option value="Stopped ART">Stopped ART</option>
              <option value="Transferred out">Transferred out</option>
              <option value="Stopped club">Stopped club</option>
            </select>
			</div>
		  </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="outcome_date" class="control-label">Outcome date </label>
              <input type="date" class="form-control form-control-sm" name="outcome_date" id="outcome_date" value="">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="comments" class="control-label">Comment</label>
              <textarea name="comment" id="comment" class="form-control" row="3">
              </textarea>
            </div>
          </div>
          </div>
		<hr>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" form="parent-visit-form" >Save </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>



<script>
$(document).ready(function(){
  $('#parent-visit-form').submit(function(e){
    var formData = new FormData($(this)[0]);
    console.log(formData);
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
        $("#preloader2").hide();
        $('#pVisitModal').modal('hide');
			  // location.href = 'index.php?page=ART_history_at_entry&pid='+resp.data.id
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
</script>


