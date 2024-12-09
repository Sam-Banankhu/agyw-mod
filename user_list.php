<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-secondary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-secondary" href="./index.php?page=new_user"><i class="fa fa-plus"></i> Add New User</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<thead>
					<tr>
						<th class="text-center" style="color: #CD853F; font-size: 14px;">#</th>
						<th style="color: #CD853F; font-size: 14px;">NAME</th>
						<th style="color: #CD853F; font-size: 14px;">EMAIL</th>
						<th style="color: #CD853F; font-size: 14px;">ROLE</th>
						<th style="color: #CD853F; font-size: 14px;">ACTION</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("
						SELECT 
							u.*, 
							concat(u.firstname, ' ', u.lastname) as name, 
							ut.type_name as role 
						FROM users u 
						LEFT JOIN user_types ut ON u.user_type_id = ut.user_type_id 
						ORDER BY concat(u.firstname, ' ', u.lastname) ASC
					");
					while ($row = $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><?php echo ucwords($row['name']) ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['role'] ?></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-secondary wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								Action
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item view_user" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">View</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item toggle_status" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" data-status="<?php echo $row['is_active'] ?>">
									<?php echo $row['is_active'] ? "Deactivate" : "Activate"; ?>
								</a>
							</div>
						</td>
					</tr>	
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
    $(document).ready(function(){
        $('#list').dataTable();

        // View User Modal
        $('.view_user').click(function(){
            uni_modal("<i class='fa fa-id-card'></i> User Details", "view_user.php?id=" + $(this).attr('data-id'));
        });

        // Activate/Deactivate User
        $('.toggle_status').click(function(){
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            var action = status == 1 ? "deactivate" : "activate";

            _conf("Are you sure you want to " + action + " this user?", "toggle_user_status", [id, status]);
        });
    });

    // Function to Toggle User Status
    function toggle_user_status(id, currentStatus){
        start_load();
        $.ajax({
            url: 'ajax.php?action=toggle_user_status',
            method: 'POST',
            data: { id: id, current_status: currentStatus },
            success: function(resp){
                if(resp == 1){
                    alert_toast("User status successfully updated", "success");
                    setTimeout(function(){
                        location.reload();
                    }, 1500);
                } else {
                    alert_toast("An error occurred. Please try again.", "danger");
                }
            }
        });
    }
</script>


<script type="text/javascript" src="data/pdfmake.min.js"></script>
<script type="text/javascript" src="data/vfs_fonts.js"></script>
<script type="text/javascript" src="data/datatables.min.js"></script>
