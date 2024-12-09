<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<?php include('db_connect.php');

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
?>

<div class="row">
  <!-- Today's Visits Section -->
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=hts/reports/hts_appointments">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php
            // Get today's visits from the parent_visit table
            $query = "SELECT * FROM parent_visit WHERE meeting_date = CURDATE()";
            echo $conn->query($query)->num_rows;
          ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Today's Visits</p> 
      </a>
    </div>
  </div> 

  <!-- Total Defaulters Section -->
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=tb/reports/tb_appointments">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php
            // Get total defaulters based on outcome "defaulted"
            $query = "SELECT pv.visit_id FROM parent_visit pv
                      JOIN visit_outcomes vo ON pv.visit_id = vo.visit_id
                      JOIN outcomes o ON vo.outcome_id = o.outcome_id
                      WHERE o.outcome_name = 'defaulted'";
            echo $conn->query($query)->num_rows;
          ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Total Defaulters</p>
      </a>
    </div>
  </div>

  <!-- Total Transferred Out Section -->
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=total_remandees">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php
            // Get total transferred out based on outcome "Transferred out"
            $query = "SELECT pv.visit_id FROM parent_visit pv
                      JOIN visit_outcomes vo ON pv.visit_id = vo.visit_id
                      JOIN outcomes o ON vo.outcome_id = o.outcome_id
                      WHERE o.outcome_name = 'Transferred out'";
            echo $conn->query($query)->num_rows;
          ?>
        </h3>
        <p style="color:grey; font-weight: bold; text-align: center;">Total Transferred Out</p>
      </a>
    </div>
  </div>

  <!-- Total Stopped Club Section -->
  <div class="col-md-3">
    <div class="card card-outline card-secondary">
      <a href="./index.php?page=total_discharged">
        <h3 style="color:#3c8dbc; text-align: center;">
          <?php
            // Get total stopped club based on outcome "Stopped club"
            $query = "SELECT pv.visit_id FROM parent_visit pv
                      JOIN visit_outcomes vo ON pv.visit_id = vo.visit_id
                      JOIN outcomes o ON vo.outcome_id = o.outcome_id
                      WHERE o.outcome_name = 'Stopped club'";
            echo $conn->query($query)->num_rows;
          ?>
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
        <b style="text-align: center;">Quarterly Visits</b>
      </div>

      <div class="card-body p-0">
        <div id="chart"></div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $.ajax({
    type: 'POST',
    url: 'route.php?action=curr_visits',
    dataType: 'json',
    success: function(response) {
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

<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

<script type="text/javascript" src="data/pdfmake.min.js"></script>
<script type="text/javascript" src="data/vfs_fonts.js"></script>
<script type="text/javascript" src="data/datatables.min.js"></script>
