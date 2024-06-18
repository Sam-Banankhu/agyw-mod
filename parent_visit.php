<style>
        /* Styling for the "table" */
        .ctable {
        display: flex;
        flex-direction: column;
        width: 100%;
        border: 1px solid #ddd;
    }
    .header, .crow {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #ddd;
    }
    .cell {
        padding: 8px;
        border-right: 1px solid #ddd;
        flex: 1;
    }
    .cell:last-child {
        border-right: none;
    }
    .crow:hover {
        background-color: #f1f1f1;
    }
    .dropdown-content {
        display: none;
        flex-direction: column;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        position: absolute;
        z-index: 1;
    }
    .dropdown-content .cell {
        border: none;
    }
    .crow.expanded .dropdown-content {
        display: flex;
    }
    .dropdown-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px;
        border: none;
        cursor: pointer;
    }
    .dropdown-button:hover {
        background-color: #45a049;
    }
        .modal-dialog {
    max-width: 80%; /* Adjust the width as needed */
}
    </style>
<div class="col-lg-12">
  <div class="card card-outline card-secondary">
	<div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <b>Name</b>:
            </div>
            <div class="col-md-2" id="name">
            </div>
            <div class="col-md-2">
              <b>ARV #</b>:
            </div>
            <div class="col-md-2" id="arv_number">
            </div>
            <div class="col-md-2">
              <b>Age</b>:
            </div>
            <div class="col-md-2" id="age">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <b>DOB</b>:
            </div>
            <div class="col-md-2" id="date_of_birth">
            </div>
            <div class="col-md-2">
              <b>Place of residence</b>:
            </div>
            <div class="col-md-2" id="place_of_residence">
            </div>
            <div class="col-md-2">
              <b>Phone #</b>:
            </div>
            <div class="col-md-2" id="phone_number">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <b>Registration date</b>:
            </div>
            <div class="col-md-2" id="reg_date">
            </div>
            <!-- <div class="col-md-2">
              <b>Inclusion criteria</b>:
            </div>
            <div class="col-md-2" id="inclusion_criteria">
            </div> -->
            <div class="col-md-2">
              <b>Marital status</b>:
            </div>
            <div class="col-md-2" id="marital_status">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <b>Parent/Partner Name</b>:
            </div>
            <div class="col-md-2" id="parent_partner_name">
            </div>
            <div class="col-md-2">
              <b>Parent/Partner Phone # </b>:
            </div>
            <div class="col-md-2" id="parent_partner_phone_number">
            </div>
            <!-- <div class="col-md-2">
              <b>Inclusion criteria</b>:
            </div>
            <div class="col-md-2" id="inclusion_criteria">
            </div> -->
          </div>
        </div>
      </div>
  <hr>

  <div class="row">
    <div class="col-sm-1 col-sm-offset-1">
  <button type="button" id="addVisitBtn" class="btn btn-primary btn-sm float-end" style="align: left;" data-bs-toggle="modal" data-bs-target="#pVisitModal">
    Add a visit
  </button>
</div>
<div class="col-sm-1">
  <button type="button" id="addChildBtn" class="btn btn-success btn-sm float-end">
    Add a child
  </button>
</div>
  </div>
  <div class="row">
  <div class="ctable">
      <div class="header">
          <div class="cell">Meeting Date</div>
          <div class="cell">Services</div>
          <div class="cell">Adherence</div>
          <div class="cell">Eligible for VL</div>
          <div class="cell">VL Result</div>
          <div class="cell">Outcome</div>
          <div class="cell">More</div>
      </div>
      <div id="table-body"></div>
      <!-- Repeat .row divs for each record in your dataset -->
    </div>
  </div>
  <hr>

  <!-- Visit entry Modal -->
<div class="modal fade" id="pVisitModal" tabindex="-1" aria-labelledby="pVisitModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php
        include 'modals/parent_visit_form.php';
    ?>
    </div>
  </div>
</div>
	  
    	</div>
    	<div class="card-footer border-top border-secondary">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat  bg-gradient-primary mx-2" form="parent-visit-form">Save </button>
    			<button class="btn btn-flat bg-gradient-secondary mx-2" type="button" onclick="location.href='index.php?page=home'">Cancel</button>
    		</div>
    	</div>
	</div>
</div>

<script>
$(document).ready(function(){
  getParent();
  fetchParentVisit();
  
  $('#pVisitModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    $("#parent_id").val(button.data('parent-id'));

    var today = new Date();
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var dd = String(today.getDate()).padStart(2, '0');
    var maxDate = yyyy + '-' + mm + '-' + dd;

    $('#meeting_date, #outcome_date, #date_of_vl_test').attr('max', maxDate);

  })
  $('#addChildBtn').on('click', function(){
    var parent_id = $("#addVisitBtn").attr('data-parent-id');
    location.href = 'index.php?page=child_registration&parent_id='+parent_id;
  })
});
function toggleDropdown(button) {
  var row = button.parentElement.parentElement;
  row.classList.toggle('expanded');
}

function getParent() {
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get('id');

  $.ajax({
    type: "POST",
    url: 'route.php?action=get',
    data: { type: 'parent', id:  id}, // Send data as an object
    dataType: "json",
  }).done(function(result) {
    $.each(result[0], function(key, value) {
        // Exclude properties related to timestamps (null values)
        if (value !== null && key !== "parent_id") {
            $("#"+key).text(value);
        }
        if(key == "parent_id"){
          $("#addVisitBtn").attr("data-parent-id", value);
        }
    });
  });
}

function fetchParentVisit() {
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get('id');
  $.ajax({
    type: "POST",
    url: 'route.php?action=fetch',
    data: { type: 'parent_visit', id:  id}, // Send data as an object
    dataType: "json",
  }).done(function(result) {
    populateTable(result);
  });
}

function populateTable(data) {
  $('#table-body').html(data.map(createRow).join(''));
}

function createRow(data) {
        return `
        <div class="crow">
            <div class="cell">${data.meeting_date}</div>
            <div class="cell">${data.service}</div>
            <div class="cell">${data.adherence}</div>
            <div class="cell">${data.eligible_for_vl}</div>
            <div class="cell">${data.vl_result}</div>
            <div class="cell">${data.outcome}</div>
            <div class="cell">
                <button class="dropdown-button" onclick="toggleDropdown(this)">▼</button>
                <div class="dropdown-content">
                    <div class="cell">Immunization: ${data.date_of_vl_test ?? ''}</div>
                    <div class="cell">DBS HIV Test: ${data.iac_conducted ?? ''}</div>
                    <div class="cell">Rapid HIV Test: ${data.second_vl_conducted ?? ''}</div>
                    <div class="cell">Age at Test: ${data.second_vl_result ?? ''}</div>
                    <div class="cell">Type of Vaccine: ${data.second_vl_decision ?? ''}</div>
                    <div class="cell">HIV Status: ${data.malnutrition_status ?? ''}</div>
                    <div class="cell">Feeding Type: ${data.return_to_school ?? ''}</div>
                    <div class="cell">Malnutrition Status: ${data.outcome_date ?? ''}</div>
                    <div class="cell">Comments: ${data.comments ?? ''}</div>
                </div>
            </div>
        </div>
        `;
    }

</script>

</body>
</html>
