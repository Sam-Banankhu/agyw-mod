<?php if(!isset($conn)){ include 'db_connect.php'; } 

  date_default_timezone_set('Africa/Blantyre');
  $my_date = date('Y-m-d h:i:s', time());

  $user_id = $_SESSION['login_id'];
?>

<div class="modal-header">
  <h5 class="modal-title text-center" id="cVisitModal">Child Visit</h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body col-md-12">
  <form action="" id="child-visit-form">
    <input type="hidden" name="id" id="id" value="">
    <input type="hidden" name="child_id" id="child_id" value="">
    <input type="hidden" name="form-name" value="child-visit-form">
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
          <label for="age_at_visit" class="control-label">Age at this visit (in months)<sup style="color: red;">*</sup></label>
          <input type="text" class="form-control form-control-sm" name="age_at_visit" id="age_at_visit" value="" autocomplete="off" required>
        </div>
      </div>
      <div class="col-md-3">
			  <div class="form-group">
			    <label for="nevirapine" class="control-label">Nevirapine </label>
          <select class="form-control form-control-sm select2" name="nevirapine" id="nevirapine" value="" >
            <option selected="true" disabled="disabled">--Is the child taking nevirapine?--</option>
            <option value="Yes">Yes</option>
            <option  value="No">No</option>
          </select>
			  </div>
		  </div>
      <div class="col-md-3">
			  <div class="form-group">
			    <label for="bactrim" class="control-label">Bactrim </label>
          <select class="form-control form-control-sm select2" name="bactrim" id="bactrim" value="">
            <option selected="true" disabled="disabled">--Is the child taking bactrim?--</option>
            <option value="Yes">Yes</option>
            <option  value="No">No</option>
          </select>
			  </div>
		  </div>
		</div>
		<hr>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="immunization" class="control-label">Immunization </label>
          <select class="form-control form-control-sm select2" name="immunization" id="immunization" value="">
            <option selected="true" disabled="disabled">--Has the child been immunized--</option>
            <option value="Yes">Yes</option>
            <option  value="No">No</option>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="type_of_vaccine" class="control-label">Type of vaccines </label>
          <input type="text" class="form-control form-control-sm" name="type_of_vaccine" id="type_of_vaccine" value="" autocomplete="off" disabled>
        </div>
      </div>
    </div>
		<hr>

    <div class="row">
      <div class="col-md-3">
			  <div class="form-group">
			    <label for="dbs_hiv_test" class="control-label">DBS HIV Test done </label>
          <select class="form-control form-control-sm select2" name="dbs_hiv_test" id="dbs_hiv_test" value="" >
            <option selected="true" disabled="disabled">--Has DBS HIV test been done?--</option>
            <option value="Yes">Yes</option>
            <option  value="No">No</option>
          </select>
			  </div>
		  </div>
      <div class="col-md-3">
			  <div class="form-group">
			    <label for="rapid_hiv_test" class="control-label">Rapid HIV Test done </label>
          <select class="form-control form-control-sm select2" name="rapid_hiv_test" id="rapid_hiv_test" value="">
            <option selected="true" disabled="disabled">--Has Rapid HIV test been done?--</option>
            <option value="Yes">Yes</option>
            <option  value="No">No</option>
          </select>
			  </div>
		  </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="age_at_test" class="control-label">Age at Test </label>
          <input type="number" class="form-control form-control-sm" name="age_at_test" id="age_at_test" value="" autocomplete="off" disabled>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="hiv_status" class="control-label">HIV Status </label>
          <select class="form-control form-control-sm select2" name="hiv_status" id="hiv_status" value="">
            <option selected="true" disabled="disabled">--HIV Status--</option>
            <option value="Positive">Positive</option>
            <option value="Negative">Negative</option>
          </select>
        </div>
      </div>
    </div>
		<hr>
    
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="height_cm" class="control-label">Height (cm)</label>
          <input type="number" class="form-control form-control-sm" name="height_cm" id="height_cm" value="" autocomplete="off">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="weight_kg" class="control-label">Weight (kg)</label>
          <input type="number" class="form-control form-control-sm" name="weight_kg" id="weight_kg" value="" autocomplete="off">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="muac_cm" class="control-label">MUAC (cm)</label>
          <input type="number" class="form-control form-control-sm" name="muac_cm" id="muac_cm" value="" autocomplete="off">
        </div>
      </div>
      <div class="col-md-3">
			  <div class="form-group">
			    <label for="feeding_type" class="control-label">Feeding type</label>
          <select class="form-control form-control-sm select2" name="feeding_type" id="feeding_type" value="" required>
            <option selected="true" disabled="disabled">--Feeding type--</option>
            <option value="EBF">EBF</option>
            <option value="Mixed">Mixed</option>
            <option value="BF + Solid">BF + Solid</option>
            <option value="Solid">Solid</option>
          </select>
			  </div>
		  </div>
		</div>
		<hr>

    <div class="row">
      <div class="col-md-3">
			  <div class="form-group">
			    <label for="malnutrition_status" class="control-label">Malnutrition status</label>
          <select class="form-control form-control-sm select2" name="malnutrition_status" id="malnutrition_status" value="" required>
            <option selected="true" disabled="disabled">--Malnutrition status--</option>
            <option value="None">None</option>
            <option value="Moderate">Moderate</option>
            <option value="Severe">Severe</option>
          </select>
			  </div>
		  </div>
      <div class="col-md-3">
		    <div class="form-group">
			    <label for="outcome" class="control-label">Outcome </label>
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
          <input type="date" class="form-control form-control-sm" name="outcome_date" id="outcome_date" value="" >
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
  </form>
</div>
<div class="modal-footer">
  <button class="btn btn-primary" form="child-visit-form" >Save </button>
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>



<script>
$(document).ready(function(){

  $("#immunization").change(function () {
    if ($(this).val() == "Yes") {
      $("#type_of_vaccine").removeAttr("disabled");
    } else {
      $("#type_of_vaccine").attr("disabled", "disabled");
    }
  });

  $('#rapid_hiv_test, #dbs_hiv_test').change(function() {
    if($('#rapid_hiv_test').val() !== null || $('#dbs_hiv_test').val() !== null){
      if($('#rapid_hiv_test').val() == "Yes" || $('#dbs_hiv_test').val() == "Yes"){
        $("#age_at_test").removeAttr("disabled");
      }else{
        $("#age_at_test").attr("disabled", "disabled");
      }
    }
  })

  $('#child-visit-form').submit(function(e){
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
          $('#cVisitModal').modal('hide');
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


