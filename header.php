<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
  date_default_timezone_set("Africa/Blantyre");
  
  ob_start();
  $title = isset($_GET['page']) ? ucwords(str_replace("_", ' ', $_GET['page'])) : "Home";
  ?>
  <title><?php echo $title ?> | <?php echo "AGYW"; ?></title>
  <?php ob_end_flush() ?>

<link rel="icon" href="img1/favicon.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="css1/google_api.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="data/datatables.min.css"/>

<script type="text/javascript" src="data/pdfmake.min.js"></script>
<script type="text/javascript" src="data/vfs_fonts.js"></script>
<script type="text/javascript" src="data/datatables.min.js"></script>
 <script type="text/javascript" src="data/moment.min.js"></script>
 <script type="text/javascript" src="data/dataTables.dateTime.min.js"></script>
 <script type="text/javascript" src="data/dataTables.searchBuilder.min.js"></script>
  <script type="text/javascript" src="data/datetime-moment.js"></script>
  
 
   <!-- Select2 -->
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- SweetAlert2 -->
  <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="assets/plugins/dropzone/min/dropzone.min.css">
  <!-- DateTimePicker -->
  <link rel="stylesheet" href="assets/dist/css/jquery.datetimepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Switch Toggle -->
  <link rel="stylesheet" href="assets/plugins/bootstrap4-toggle/css/bootstrap4-toggle.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/dist/css/styles.css">
	<script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  <!--LINKS FOR FILES AND MEDIAS-->
 <style>
     .brand_logo1 {
      height: 110px;
      width: 110px;
      border-radius: 50%;
      border: 4px solid grey;
      background: whitesmoke;
    }

input[type='radio'] {
  -webkit-appearance:none;
  width:20px;
  height:20px;
  border:1px solid darkgray;
  border-radius:50%;
  outline:none;
  box-shadow:0 0 5px 0px gray inset;
}

input[type='radio']:hover {
  box-shadow:0 0 5px 0px orange inset;
}

input[type='radio']:before {
  content:'';
  display:inline;
  width:60%;
  height:60%;
  margin: 20% auto;    
  border-radius:50%;    
}
input[type='radio']:checked:before {
  background:#3c8dbc;
}

 input[type='radio']:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #d1d3d1;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #ffa500;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }

    .control-label{
      font-weight: unset;
      color: #3c8dbc;
    }

   #side{
    line-height: 1px;
   }

   table {
  border-collapse: collapse;
  width: 100%;
}

hr{
  line-height: 0.1px;
}

#myspan{
    line-height: 0.1px;
  }

</style>
<!-- 
<script>
  $(document).ready(function(){
  setTimeout(function(){
        $.get("admin_class.php", function(data){
        if(data==0) window.location.href="ajax.php?action=logout";
        });
    },1*60000*1000);
});
</script> -->
</head>

  
      
