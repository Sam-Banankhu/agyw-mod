<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php include('db_connect.php') ?>
<?php // $stations_id = $_SESSION['login_stations_id']; ?>

<div class="row">
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=hts/reports/hts_appointments">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php echo $conn->query("SELECT * from parent_visit where meeting_date = current_date();")->num_rows; ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Today's Visits</p> 
      </a>
    </div>
  </div> 
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=tb/reports/tb_appointments">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php echo $conn->query("SELECT * from parent_visit WHERE outcome = 'Defaulted';")->num_rows; ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Total Defaulters</p>
      </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=total_remandees">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php echo $conn->query("SELECT * from parent_visit WHERE outcome = 'Transferred out'")->num_rows; ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Total Transfered Out</p>
      </a>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=total_discharged">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php echo $conn->query("SELECT * from parent_visit WHERE outcome = 'Stopped club'")->num_rows; ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Total Stopped Club</p>
      </a>
    </div>
  </div>
</div>


      <div class="row">
        <div class="col-md-12">
        <div class="card card-outline card-secondary">
          <div class="card-header">
            <b style="text-align: center;">Quarterly visits</b>
          </div>
         
          <div class="card-body p-0">
            <div class="table-responsive">
            <div id="chart"></div>
              <!-- table class="table m-0 table-hover" id="home_data">
               < !-- <colgroup>
                  <col width="5%">
                  <col width="30%">
                  <col width="35%">
                  <col width="15%">
                  <col width="15%">
                </colgroup>-->
               
                <!-- thead>
                  <th style="color:#3c8dbc; font-size: 12px;"># <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>

                  <th style="color:#3c8dbc; font-size: 12px;">P-No. <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">NAME <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">GENDER <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">AGE <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">REGION <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">STATION <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">STATUS <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  <th style="color:#3c8dbc; font-size: 12px;">ACTION <i class="fas fa-sort nav-icon" style="color:#3c8dbc; font-size:12px;"></i></th>
                  
                  
                </thead-->
                <!-- tbody>
                < ?php
                $i = 1;
                $stations_id = $_SESSION['login_stations_id'];
                $regions_id = $_SESSION['login_regions_id'];

                if($_SESSION['login_type'] == 3 || $_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 4){

                 $qry = $conn->query("SELECT p.*, concat(p.fname, ' ', p.lname) AS pname, r.name AS region_name, s.name AS station_name FROM prisoners p INNER JOIN regions r ON r.id = p.regions_id INNER JOIN stations s ON s.id = p.stations_id  WHERE p.stations_id = $stations_id AND p.status = 1 OR p.status = 2 ORDER BY prisoners_no ASC");
                  
                }elseif($_SESSION['login_type'] == 5){

                  $qry = $conn->query("SELECT p.*, concat(p.fname, ' ', p.lname) AS pname, r.name AS region_name, s.name AS station_name FROM prisoners p INNER JOIN regions r ON r.id = p.regions_id INNER JOIN stations s ON s.id = p.stations_id  WHERE p.regions_id = $regions_id AND p.status = 1 OR p.status = 2 ORDER BY prisoners_no ASC");

                }elseif($_SESSION['login_type'] == 1){

                 $qry = $conn->query("SELECT p.*, concat(p.fname, ' ', p.lname) AS pname, r.name AS region_name, s.name AS station_name FROM prisoners p INNER JOIN regions r ON r.id = p.regions_id INNER JOIN stations s ON s.id = p.stations_id  WHERE p.status = 1 OR p.status = 2 ORDER BY prisoners_no ASC"); 
                }
                
                  while($row= $qry->fetch_assoc()):
                 
                $userDob = $row['dob'];
                //Create a DateTime object using the user's date of birth.
                $dob = new DateTime($userDob);
                //We need to compare the user's date of birth with today's date.
                $now = new DateTime();
                //Calculate the time difference between the two dates.
                $difference = $now->diff($dob);
                //Get the difference in years, as we are looking for the user's age.
                $age = $difference->y;
                  ?>

                  <tr>
                      <td>
                         < ?php echo $i++ ?>
                      </td>
                      <td>
                          <a>
                              < ?php echo ucwords($row['prisoners_no']) ?>
                          </a>
                      </td>
                       <td>
                          <a>
                              < ?php echo ucwords($row['pname']) ?>
                          </a>
                          
                      </td>
                      <td>
                          <a>
                              < ?php echo ucwords($row['gender']) ?>
                          </a>
                          
                      </td>
                      <td>
                          <a>
                              < ?php echo ($age) ?>
                          </a>
                          
                      </td>
                      
                      <td>
                          <a>
                              < ?php echo ucwords($row['region_name']) ?>
                          </a>
                          
                      </td>
                      <td>
                          <a>
                              < ?php echo ucwords($row['station_name']) ?>
                          </a>
                          
                      </td>
                      

                      <td >< ?php $stats=$row['status'];
                      if($stats==1){
                      ?>
                      <span style="color: #3c8dbc;">CONVICT</span>
                      < ?php } if($stats==2)  { ?>
                      <span style="color: #3c8dbc;">REMANDEE</span>
                      < ?php } ?>
                      </td>
                     
                      <td class="text-center">
              <button type="button" class="btn btn-default btn-sm btn-flat border-secondary wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                          <b><i class="fas fa-folder">
                              </i>View</b>
                        </button>
                        <div class="dropdown-menu" style="">
                          <a class="dropdown-item view_health_data" href="#&?id=< ?php echo $row['prisoners_no'] ?>" data-id="< ?php echo $row['id'] ?>">Prisoner Information</a>
                          <div class="dropdown-divider"></div>
                          < ?php if($_SESSION['login_type'] == 4 || $_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2 || $_SESSION['login_type'] == 5): ?>
                          <a class="dropdown-item view_prison_data" href="?page=dashboard&pid=< ?php echo $row['id'] ?>" data-id="< ?php echo $row['id'] ?>">Medical History</a>
                          <div class="dropdown-divider"></div>
                        < !--  <a class="dropdown-item delete_list" href="javascript:void(0)" data-id="< ?php //echo $row['id'] ?>">Delete</a>-- >
                      < ?php endif; ?>
                        </div>
            </td>
                  </tr>
                < ?php endwhile; ?>
                </tbody -->  
              </table -->
            </div>
          </div>
        </div>
        </div>

<script>
  $(document).ready(function(){
    $('#home_data').dataTable({
        dom: 'lBfrtip',
         //dom: 'QlBfrtip',
        "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
            ,
            'colvis'
        ]
    } );
  })
  
</script>

<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<script type="text/javascript" src="data/pdfmake.min.js"></script>
<script type="text/javascript" src="data/vfs_fonts.js"></script>
<script type="text/javascript" src="data/datatables.min.js"></script>


      </div>

      <script>
$(document).ready(function() {
  $.ajax({
        type: 'POST',
        url: 'route.php?action=curr_visits',
        dataType: 'json',
        success: function(response) {
            // Prepare data for ApexCharts
            var series = [];
            var categories = [];
            $.each(response, function(program, data) {
                var programData = {
                    name: program,
                    data: []
                };
                $.each(data, function(index, item) {
                    programData.data.push(item.visit_count);
                    if ($.inArray(item.month, categories) === -1) {
                        categories.push(item.month);
                    }
                });
                series.push(programData);
            });

            // Render the chart using ApexCharts
            var options = {
                chart: {
                    type: 'bar',
                    height: 450
                },
                xaxis: {
                    categories: categories
                },
                yaxis: {
                    stepSize: 10
                },
                series: series
            };
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }
    });
});
</script>
