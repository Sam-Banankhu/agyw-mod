<aside class="main-sidebar sidebar-light-secondary elevation-4">
  <div class="dropdown">
    <a href="./" class="brand-link">
      <p style="text-align: center;" class="logo-border1">
        <img src="assets/uploads/logo.jpeg" alt="Avatar" class="brand_logo1" style="border-radius: 50%; text-align: center;">
      </p>
    </a>
    <br><br><br><br>
    <div class="sidebar pb-4 mb-4">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-home" style="color:#3c8dbc;"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=patient_lookup" class="nav-link">
              <i class="fas fa-users nav-icon" style="color:#3c8dbc;"></i>
              <p>
                People
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_project nav-view_project">
              <i class="fas fa-chart-bar nav-icon" style="color:#3c8dbc;"></i>
              <p>
                Clinical Reports
                <i class="right fas fa-angle-left" style="color:#3c8dbc;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" id="mouseover8">
              <li class="nav-item" id="side">
                <a href="./index.php?page=reports" class="nav-link nav-reports tree-item" data-toggle="toggle" data-placement="top" title="REPORTS IN TABLES">
                  <i class="fas fa-table nav-icon" style="color:#3c8dbc; font-size:10px;"></i>
                  <p style="color: black; font-size:10px;">Reports</p>
                </a>
              </li>
              <li class="nav-item" id="side">
                <a href="./index.php?page=STIs_report" class="nav-link nav-STIs_report tree-item" data-toggle="toggle" data-placement="top" title="STIs REPORT WITH NAMES">
                  <i class="fas fa-table nav-icon" style="color:#3c8dbc; font-size:10px;"></i>
                  <p style="color: black; font-size:10px;">STIs With Names</p>
                </a>
              </li>
              <li class="nav-item" id="side">
                <a href="./index.php?page=eligible_for_HIV_test" class="nav-link nav-eligible_for_HIV_test tree-item" data-toggle="toggle" data-placement="top" title="ELIGIBLE FOR HIV TEST REPORT">
                  <i class="fas fa-table nav-icon" style="color:#3c8dbc; font-size:10px;"></i>
                  <p style="color: black; font-size:10px;">Eligible For HIV Test</p>
                </a>
              </li>
              <li class="nav-item" id="side">
                <a href="./index.php?page=death_and_causes_report" class="nav-link nav-death_and_causes_report tree-item" data-toggle="toggle" data-placement="top" title="DEATH AND CAUSES REPORT">
                  <i class="fas fa-table nav-icon" style="color:#3c8dbc; font-size:10px;"></i>
                  <p style="color: black; font-size:11px;">Death and Causes</p>
                </a>
              </li>              
            </ul>
          </li>
          
          <!-- Restricting Users Section to Admins -->
          <?php if (isset($_SESSION['login_user_type_name']) && $_SESSION['login_user_type_name'] === 'Admin'): ?>
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users" style="color:#3c8dbc;"></i>
              <p>
                Users
                <i class="right fas fa-angle-left" style="color:#3c8dbc;"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" id="mouseover10">
              <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-sign-out-alt nav-icon" style="color:#3c8dbc; font-size:10px;"></i>
                  <p style="color: black;">Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-sign-out-alt nav-icon" style="color:#3c8dbc; font-size:10px;"></i>
                  <p style="color: black;">List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </div>
</aside>
