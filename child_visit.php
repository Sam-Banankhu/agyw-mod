<style>
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
              <b>HCC #</b>:
            </div>
            <div class="col-md-2" id="hcc_number">
            </div>
            <div class="col-md-2">
              <b>ARV #</b>:
            </div>
            <div class="col-md-2" id="arv_number">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <b>Age</b>:
            </div>
            <div class="col-md-2" id="age">
            </div>
            <div class="col-md-2">
              <b>DOB</b>:
            </div>
            <div class="col-md-2" id="date_of_birth">
            </div>
            <div class="col-md-2">
              <b>Sex </b>:
            </div>
            <div class="col-md-2" id="gender">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <b>Parent/Guardian Name</b>:
            </div>
            <div class="col-md-2" id="parent_guardian_name">
            </div>
            <div class="col-md-2">
              <b>Parent/Guardian Phone # </b>:
            </div>
            <div class="col-md-2" id="parent_guardian_phone_number">
            </div>
            <div class="col-md-2">
              <b>Registration date</b>:
            </div>
            <div class="col-md-2" id="reg_date">
            </div>
          </div>
        </div>
      </div>
  <hr>
  <div class="row">
    <div class="col-sm-1">
      <button type="button" id="addVisitBtn" class="btn btn-primary btn-sm float-end" style="align: left;" data-bs-toggle="modal" data-bs-target="#cVisitModal">
        Add a visit
      </button>
    </div>
  </div>
  <div class="row">
    <div class="ctable">
      <div class="header">
          <div class="cell">Meeting Date</div>
          <div class="cell">Age at Visit</div>
          <div class="cell">Nevirapine</div>
          <div class="cell">Bactrim</div>
          <div class="cell">Weight (kg)</div>
          <div class="cell">Height (cm)</div>
          <div class="cell">More</div>
          <div class="cell">Action</div>
      </div>
      <div id="table-body"></div>
      <!-- Repeat .row divs for each record in your dataset -->
    </div>
  </div>
  <hr>

  <!-- Visit entry Modal -->
<div class="modal fade" id="cVisitModal" tabindex="-1" aria-labelledby="cVisitModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <?php
        include 'modals/child_visit_form.php';
    ?>
    </div>
  </div>
</div>
  
	  
    	</div>
    	<div class="card-footer border-top border-secondary">
    		<div class="d-flex w-100 justify-content-center align-items-center">
    			<button class="btn btn-flat mx-2 btn-success" type="button" onclick="location.href='index.php?page=patient_lookup'">Finish</button>
    		</div>
    	</div>
	</div>
</div>
</body>
</html>
<script>
$(document).ready(function() {

  getChild()
  fetchChildVisit()
  $('#cVisitModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    $("#child_id").val(button.data('child-id'));

    var today = new Date();
    var yyyy = today.getFullYear();
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based
    var dd = String(today.getDate()).padStart(2, '0');
    var maxDate = yyyy + '-' + mm + '-' + dd;

    $('#meeting_date, #outcome_date').attr('max', maxDate);

  });
})
function toggleDropdown(button) {
  var row = button.parentElement.parentElement;
  row.classList.toggle('expanded');
}

function getChild() {
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get('id');

  $.ajax({
    type: "POST",
    url: 'route.php?action=get',
    data: { type: 'child', id:  id}, // Send data as an object
    dataType: "json",
  }).done(function(result) {
    $.each(result[0], function(key, value) {
        // Exclude properties related to timestamps (null values)
        if (value !== null && key !== "child_id"  && key !== "guardian_id") {
            console.log(value)
            $("#"+key).text(value);
        }
        if(key == "guardian_id"){
            getParent(value);
        }
        if(key == "child_id"){
          $("#addVisitBtn").attr("data-child-id", value);
        }
    });
  });
}

function getParent(id) {
  $.ajax({
    type: "POST",
    url: 'route.php?action=get',
    data: { type: 'parent', id:  id}, // Send data as an object
    dataType: "json",
  }).done(function(result) {
    $.each(result[0], function(key, value) {
        // Exclude properties related to timestamps (null values)
        if (key !== "name"  || key !== "phone_number") {
            $("#parent_guardian_"+key).text(value);
        }
    });
  });
}

function fetchChildVisit() {
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get('id');
  $.ajax({
    type: "POST",
    url: 'route.php?action=fetch',
    data: { type: 'child_visit', id:  id}, // Send data as an object
    dataType: "json",
  }).done(function(result) {
    console.log(result);
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
            <div class="cell">${data.age_at_visit !== null ? data.age_at_visit : ''}</div>
            <div class="cell">${data.nevirapine !== null ? data.nevirapine : ''}</div>
            <div class="cell">${data.bactrim !== null ? data.bactrim : ''}</div>
            <div class="cell">${data.weight_kg !== null ? data.weight_kg : ''}</div>
            <div class="cell">${data.height_cm !== null ? data.height_cm : ''}</div>
            <div class="cell">
                <span class="btn-sm btn-success" onclick="toggleDropdown(this)"  style="margin-right: 10px;">
                  <i class="fa fa-caret-down" aria-hidden="true"></i>
                </span>
                <div class="dropdown-content">
                    ${data.immunization !== null ? '<div class="cell">Immunization: ' + data.immunization + '</div>': ''}
                    ${data.dbs_hiv_test !== null ? '<div class="cell">DBS HIV Test: '+ data.dbs_hiv_test + '</div>' : ''}
                    ${data.rapid_hiv_test !== null ? '<div class="cell">Rapid HIV Test: '+ data.rapid_hiv_test + '</div>' : ''}
                    ${data.age_at_test !== null ? '<div class="cell">Age at Test: '+ data.age_at_test + '</div>' : ''}
                    ${data.type_of_vaccine !== null ? '<div class="cell">Type of Vaccine: '+ data.type_of_vaccine + '</div>' : ''}
                    ${data.hiv_status !== null ? '<div class="cell">HIV Status: '+ data.hiv_status + '</div>' : ''}
                    ${data.feeding_type !== null ? '<div class="cell">Feeding Type: '+ data.feeding_type + '</div>' : ''}
                    ${data.malnutrition_status !== null ? '<div class="cell">Malnutrition Status: '+ data.malnutrition_status + '</div>' : ''}
                    ${data.outcome !== null ? '<div class="cell">Outcome: '+ data.outcome + '</div>' : ''}
                    ${data.outcome_date !== null ? '<div class="cell">Outcome date: '+ data.outcome_date + '</div>' : ''}
                    ${data.comment !== null ? '<div class="cell">Comments: '+ data.comment + '</div>' : ''}
                </div>
            </div>
            <div class="cell">
                <button class="btn-sm btn-primary" data-id="'+ ${data.visit_id} +'" data-child_id="'+ ${data.child_id} +'" data-bs-toggle="modal" data-bs-target="#cVisitModal">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                </button>
                </div>
        </div>
        `;
    }

</script>
