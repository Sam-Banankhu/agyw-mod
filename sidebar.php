<aside class="main-sidebar sidebar-light-secondary elevation-4">
  <div class="dropdown">
   	<a href="./" class="brand-link">
       <!-- <h3 class="text-center p-0 m-0"><b>USER</b></h3>-->
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
                  <p style="color: black; font-size:10px;">Eligilble For HIV Test</p>
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
        </ul>
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>

  <script>
    let test = document.getElementById("mouseover1");

// This handler will be executed only once when the cursor
// moves over the unordered list
test.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test.addEventListener("mouseover1", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test = document.getElementById("mouseover1");

// This handler will be executed only once when the cursor
// moves over the unordered list
test1.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test1.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test2 = document.getElementById("mouseover2");

// This handler will be executed only once when the cursor
// moves over the unordered list
test3.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test2.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test3 = document.getElementById("mouseover3");

// This handler will be executed only once when the cursor
// moves over the unordered list
test3.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test3.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test4 = document.getElementById("mouseover4");

// This handler will be executed only once when the cursor
// moves over the unordered list
test4.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test4.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test5 = document.getElementById("mouseover5");

// This handler will be executed only once when the cursor
// moves over the unordered list
test5.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test5.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test6 = document.getElementById("mouseover6");

// This handler will be executed only once when the cursor
// moves over the unordered list
test6.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test6.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test7 = document.getElementById("mouseover7");

// This handler will be executed only once when the cursor
// moves over the unordered list
test7.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test7.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test8 = document.getElementById("mouseover8");

// This handler will be executed only once when the cursor
// moves over the unordered list
test8.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test8.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>

  <script>
    let test9 = document.getElementById("mouseover9");

// This handler will be executed only once when the cursor
// moves over the unordered list
test9.addEventListener("mouseenter", function( event ) {
  // highlight the mouseenter target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

// This handler will be executed every time the cursor
// is moved over a different list item
test9.addEventListener("mouseover", function( event ) {
  // highlight the mouseover target
  event.target.style.color = "#3c8dbc";

  // reset the color after a short delay
  setTimeout(function() {
    event.target.style.color = "";
  }, 2000);
}, false);

  </script>


<script>
  $(function () {
  $('[data-toggle="toggle"]').tooltip()
})
</script>
