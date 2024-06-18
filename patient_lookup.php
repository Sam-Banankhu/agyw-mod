<style>
  #searchTable {
    width: 100%; /* Set a fixed width for the table */
  }
  #searchTable th,
  #searchTable td {
    white-space: nowrap; /* Prevent line breaks */
  }
</style>

<script type="text/javascript" src="data/pdfmake.min.js"></script>
<script type="text/javascript" src="data/vfs_fonts.js"></script>
<script type="text/javascript" src="data/datatables.min.js"></script>

<div class="">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline card-secondary">
        <div class="card-header">
          <h3 style="color:#3c3838; text-align: center;">Patient Search</h3>
          <hr>
          <form id="searchForm" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="firstName" class="form-control" placeholder="First Name">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" name="lastName" class="form-control" placeholder="Last Name">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <select name="patient_type" class="form-control">
                <option selected="true" value="" disabled>Patient type</option>
                <option value="2">Child</option>
                <option value="1">Parent/guardian</option>
                <option value="">All</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <select name="gender" class="form-control">
                    <option selected="true" value="" disabled>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <button type="button" id="searchBtn" class="btn btn-primary mb-2">Search</button>
          </form>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <a type="button" class="btn btn-primary mb-2 float-right" href="?page=parent_registration">New patient</a>
            </div>
          </div>
          <div class="row">
              <table id="searchTable" class="table table-striped table-hover display nowrap" style="width: 100%">
              <thead>
                  <th>ARV Number</th>
                  <th>Patient type</th>
                  <th>Name</th>
                  <th>Date of birth</th>
                  <th>Gender</th>
                  <th>Action <i class="fas fa-sort nav-icon"></i></th>
                </thead>
                <tbody>

                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#searchBtn').on('click', function(event) {
        event.preventDefault();
        var formData = $('#searchForm').serialize();
        $.ajax({
            type: 'POST',
            url: 'route.php?action=search',
            data: formData,
            dataType: 'json', // Set dataType to 'json'
            success: function(response) {
                // if ($.fn.DataTable.isDataTable('#searchTable')) {
                //     $('#searchTable').DataTable().destroy();
                // }
                $('#searchTable tbody').empty();
                
                // Populate DataTable with JSON data
                $.each(response, function(index, row) {
                  
                  if(row.type_id == 1){
                    var action = "<a type='button' class='btn btn-default btn-sm btn-flat border-secondary wave-effect text-info' href='?page=parent_visit&id=" + row.id + "'>" +
                                "<i class='fas fa-eye'></i>" +
                                "</a>";
                  }else if(row.type_id == 2){
                    var action = "<a type='button' class='btn btn-default btn-sm btn-flat border-secondary wave-effect text-info' href='?page=child_visit&id=" + row.id + "'>" +
                                "<i class='fas fa-eye'></i>" +
                                "</a>";
                  }
                    
                    $('#searchTable tbody').append('<tr><td>' + row.arv_number + '</td><td>' + row.type + '</td><td>' + row.name + '</td><td>' + row.dob + '</td><td>' + row.gender + '</td><td>' + action + '</td></tr>');
                });
                // // Initialize DataTable
                // $('#searchTable').dataTable({
                //     searching: false,
                //     "bDestroy": true // Disable search feature
                // });
            }
        });
    });
});
</script>

</body>
</html>