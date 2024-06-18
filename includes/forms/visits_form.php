<?php if(!isset($conn)){ include 'db_connect.php'; } 

date_default_timezone_set('Africa/Blantyre');
$my_date = date('Y-m-d h:i:s', time());
?>


<?php 
if (isset($_POST['save'])) {
   $regimen = $_POST['regimen'];
    $query=mysqli_query($conn,"SELECT * FROM new_regimen
         WHERE regimen = '$regimen'")or die(mysqli_error($conn));
           $counter=mysqli_num_rows($query);
            
            if ($counter == 1) 
              { 
                   echo '
                <script type = "text/javascript">
                    alert("This Regimen is Already Taken!");
                    window.location = "index.php?page=ART_history_at_entry";
                </script>


               ';
              } 

elseif ($conn->query("INSERT INTO new_regimen (stations_id, regions_id,regimen) values ('$_POST[stations_id]','$_POST[regions_id]','$regimen')")) {
  echo '<script type="text/javascript">
                alert("New Regimen Successfully Added!");
                </script>';
   }
}

 ?>
<style type="text/css">
.table-responsive-stack tr {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -ms-flex-direction: row;
    flex-direction: row;
}


.table-responsive-stack td,
.table-responsive-stack th {
    display: block;
    /*      
   flex-grow | flex-shrink | flex-basis   */
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
}

.table-responsive-stack .table-responsive-stack-thead {
    font-weight: bold;
}

@media screen and (max-width: 768px) {
    .table-responsive-stack tr {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        border-bottom: 3px solid #ccc;
        display: block;

    }

    /*  IE9 FIX   */
    .table-responsive-stack td {
        float: left\9;
        width: 100%;
    }
}

.vericaltext {
    writing-mode: vertical-lr;
    transform: rotate(360deg);
}
</style>


<script type="text/javascript" src="disablebuttonjquery.min.js"></script>
<!-- <script type="text/javascript">
        $(function () {
            $("input[name='chkPassPort']").click(function () {
                if ($("#chkYes").is(":checked")) {
                    $("#txtPassportNumber").removeAttr("disabled");
                    $("#txtPassportNumber").focus();
                } else {
                    $("#txtPassportNumber").attr("disabled", "disabled");
                }
            });
        });
    </script>
 -->
<script type="text/javascript">
$(function() {
    $("input[name='HIV_status']").click(function() {
        if ($("#checkyes").is(":checked")) {
            $("#checkyes1").removeAttr("disabled");
            $("#checkyes1").focus();
        } else {
            $("#checkyes1").attr("disabled", "disabled");
        }
    });
});
</script>

<script type="text/javascript">
$(function() {
    $("input[name='HIV_status']").click(function() {
        if ($("#checkyes").is(":checked")) {
            $("#checkyes2").removeAttr("disabled");
            $("#checkyes2").focus();
        } else {
            $("#checkyes2").attr("disabled", "disabled");
        }
    });
});
</script>


<script type="text/javascript">
$(function() {
    $("input[name='on_ART']").click(function() {
        if ($("#checkyes1").is(":checked")) {
            $("#current_ART_ID").removeAttr("disabled");
            $("#current_ART_ID").focus();
        } else {
            $("#current_ART_ID").attr("disabled", "disabled");
        }
    });
});
</script>

<script type="text/javascript">
$(function() {
    $("input[name='on_ART']").click(function() {
        if ($("#checkyes1").is(":checked")) {
            $("#current_Regimen").removeAttr("disabled");
            $("#current_Regimen").focus();
        } else {
            $("#current_Regimen").attr("disabled", "disabled");
        }
    });
});
</script>

<script type="text/javascript">
$(function() {
    $("input[name='HIV_status']").click(function() {
        if ($("#checkno").is(":checked")) {
            $("#current_Regimen").attr("disabled", "disabled");
            $("#current_ART_ID").attr("disabled", "disabled");
        }
    });
});
</script>

<script type="text/javascript">
$(function() {
    $("input[name='HIV_status']").click(function() {
        if ($("#checkno1").is(":checked")) {
            $("#current_Regimen").attr("disabled", "disabled");
            $("#current_ART_ID").attr("disabled", "disabled");
        }
    });
});
</script>


<!--  <script type="text/javascript">
        $(function () {
            $("input[name='HIV_status']").click(function () {
                if ($("#checkyes").is(":checked")) {
                    $("#on_ART2").removeAttr("disabled");
                    $("#on_ART2").focus();
                } else {
                    $("#on_ART2").attr("disabled", "disabled");
                }
            });
        });
    </script> -->



<!--  <span>Do you have Passport?</span>
    <label for="chkYes">
        <input type="radio" id="chkYes" name="chkPassPort" />
        Yes
    </label>
    <label for="chkNo">
        <input type="radio" id="chkNo" name="chkPassPort" />
        No
    </label>
    <hr />
    Passport Number:
    <input type="text" id="txtPassportNumber" disabled="disabled" /> -->

<script>
function Clear() {
    clearRadioGroup("on_ART");
    // clearRadioGroup("Options2");
}

function clearRadioGroup(GroupName) {
    var ele = document.getElementsByName(GroupName);
    for (var i = 0; i < ele.length; i++)
        ele[i].checked = false;
}
</script>



<div class="col-lg-12">
    <div class="card card-outline card-secondary">
        <div class="card-body">
            <form action="" id="manage-project">
                <?php 
                  $regions_id = $_SESSION['login_regions_id'];
                  $stations_id = $_SESSION['login_stations_id'];
                  $user_id = $_SESSION['login_id']; 
                ?>

                <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                <input type="hidden" name="regions_id" id="regions_id"
                    value="<?php echo isset($regions_id) ? $regions_id : '' ?>">
                <input type="hidden" name="stations_id" id="stations_id"
                    value="<?php echo isset($stations_id) ? $stations_id : '' ?>">
                <input type="hidden" id="bmu" value="mybmu">

                <div class="row">
                    <table class="table table-bordered table-striped table-responsive-stack" id="tableOne">
                        

                        <tbody>
                             <?php
    
                                            $prisoner_name ="Harry Banda";
                                            $prison_num ="p4458";
                                            $cell_num ="12";
                                            $address ="Lilongwe, Malawi. Postal Address: PO Box 106, Lilongwe, Malawi";
                                            $next_of_kin ="Pachawo";
                                            $sex ="Male";
                                            $dob ="15/March/1940";
                                            $prison_entry_date ="15/March/2014";
                                            $prison_status ="Convict";
                       
                                        ?>
                            
                            <tr>
                                <td width="34.33%" style="color:#CD853F;"> <h2 style="color:#3c3838; text-align: center;">Prison Health Card</h2></td></tr>
                            <tr>
                                <td width="34.33%" style="color:#CD853F;">
                                    <div class="row">
                                        <div class="col-md-12">
                                             <h4 style="color:#3c3838; text-align: center;">Demographics</h4>
                                            <p style="color:#CD853F; text-align: left;">
                                                <b>Prisoners Name</b>: <?php echo $prisoner_name; ?>
                                            </p>
                                            <p style="color:#CD853F; text-align: left;">
                                                <b>Home Village Address</b>: <?php echo $address; ?>
                                            </p>
                                            <p style="color:#CD853F; text-align: left;">
                                                <b>Next of Kin Phone#</b>: <?php echo $next_of_kin; ?>
                                            </p>
                                            <p style="color:#CD853F; text-align: left;">
                                                <b>Sex:</b>: <?php echo $sex; ?>
                                            </p>
                                            <p style="color:#CD853F; text-align: left;">
                                                <b>Date of Birth</b>: <?php echo $dob; ?>
                                            </p>
                                        </div>



                                    </div>
                                </td>


                                <td width="40.33%" style="color:#CD853F;">
                                     <h4 style="color:#3c3838; text-align: center;">
                                        Prison Entry Info
                                    </h4>
                                    <p style="color:#CD853F; text-align: left;">
                                                <b>Prisoners Number</b>: <?php echo $prison_num; ?>
                                            </p>
                                             <p style="color:#CD853F; text-align: left;">
                                                <b>Cell Number</b>: <?php echo $cell_num; ?>
                                            </p>
                                    <p style="color:#CD853F; text-align: left;">
                                                <b>Entry Date</b>: <?php echo $prison_entry_date; ?>
                                            </p>
                                            <p style="color:#CD853F; text-align: left;">
                                                <b>Status</b>:<?php echo $prison_status; ?>
                                            </p>

                                </td>

                            </tr>

                            

                            <tr>
                                <td width="99.33%" style="color:#CD853F;">
                                     <h4 style="color:#3c3838; text-align: center;">
                                        Clinical History at Entry
                                    </h4>
                                    
                                    <?php
    
                                            $HIV_status ="344b-jjd";
                                            $DM ="None";
                                            $Hx_of_TB ="No";
                                            $Hx_of_STI ="Yes";
                       
                                        ?>
                                </td>
                            </tr>
                            <tr>
                            <td width="23.33%" style="color:#CD853F;">
                                    <p style="color:#CD853F;"><b>HIV Status : </b><?php echo $HIV_status; ?></p>
                                </td>
                            
                                <td width="23.33%" style="color:#CD853F;">
                                    <p style="color:#CD853F;"><b>DM : </b><?php echo $DM; ?></p>  
                                </td>
                                <td width="23.33%" style="color:#CD853F;">
                                    <p style="color:#CD853F;"><b>Hx of TB : </b><?php echo $Hx_of_TB; ?></p>  
                                </td>
                                <td width="23.33%" style="color:#CD853F;">
                                    <p style="color:#CD853F;"><b>Hx of STI(past 3 m) : </b><?php echo $Hx_of_STI; ?></p>  
                                </td>
                                
                            </tr>

                        </tbody>
                    </table>

                </div>
            <div class="card-footer border-top border-secondary">
            <div class="d-flex w-100 justify-content-center align-items-center">
                <button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-project">Edit Info </button>
                
            </div>
        </div>


            </form>
        </div>

    </div>
</div>



<script>
function BMU() {
    y = document.getElementById("bmu").value;
    return y;
}

function Calculate() {
    y = BMU();

    kgs = document.getElementById("KGS").value;
    cm = document.getElementById("CM").value;
    m = cm / 100;
    ms = m * m;

    if (kgs == "") {
        document.getElementById("value2").value = "";
    } else {
        switch (y) {
            case "mybmu":
                document.getElementById("value2").value = (kgs / ms).toFixed(2);
                break;

        }
    }
}
</script>

<script language="JavaScript">
// this prevents from typing non-number text, including "e".
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    let charCode = (evt.which) ? evt.which : evt.keyCode;
    if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();
    } else {
        return true;
    }
}
</script>

<script>
$('#manage-project').submit(function(e) {
    e.preventDefault()
    start_load()
    $.ajax({
        url: 'ajax.php?action=save_ART_history_at_entry',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Data successfully saved', "success");
                setTimeout(function() {
                    location.href = 'index.php?page=ART_history_at_entry'
                }, 2000)
            }
        }
    })
})
</script>

<script>
function redirect() {
    var ask = window.confirm("Do you really want to be redirected to HTS?");
    if (ask) {
        // window.alert("You Have Been Successfully Redirected!");

        window.location.href = "./index.php?page=HIV_Testing_Service";

    } else {
        window.location.href = "./index.php?page=home";
    }
}
</script>



<script>
$(function() {
    $('[data-toggle="toggle"]').tooltip()
})
</script>

<script>
// function foo1 () {
//  var regions_id = $("#regions_id").val();
//  var lead_name_id = $("#lead_name_id").val();

//      $.ajax({
//        url:"email.php", //the page containing php script
//        type: "POST", //request type
//        data: { regions_id: regions_id, lead_name_id: lead_name_id},
//           success:function(result){
//         if(resp == 1){
//              alert_toast('Data successfully saved',"success");
//              setTimeout(function(){
//                  location.href = 'index.php?page=lead_list'
//              },2000)
//          }
//       }
//     });
// }
</script>



<div id="addIn" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color:red;">&times;</button>
                <h4 class="modal-title">Add New Regimen</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div style="width: 77%;margin: auto;">


                        <?php 
      $regions_id = $_SESSION['login_regions_id'];
      $stations_id = $_SESSION['login_stations_id'];
      $user_id = $_SESSION['login_id']; 
?>

                        <input type="hidden" name="regions_id" id="regions_id"
                            value="<?php echo isset($regions_id) ? $regions_id : '' ?>">
                        <input type="hidden" name="stations_id" id="stations_id"
                            value="<?php echo isset($stations_id) ? $stations_id : '' ?>">
                        <div class="form-group">
                            <label for="some" class="col-form-label" style="color:#CD853F;">Regimen</label>
                            <input type="text" name="regimen" class="form-control" id="some" required>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            </div>
            </form>
        </div>

    </div>
</div>