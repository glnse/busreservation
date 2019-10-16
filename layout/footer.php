	</div>
	<br/>
	<?php
	if (isset($section)) {
		if($section=="pgo"){
			if($pageSection=="index"){
	?>
	<div class="modal fade" id="testModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Details</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<strong>First Name: </strong><span id="fname"></span><br/>
					<strong>Last Name: </strong><span id="lname"></span><br/>
					<strong>Contact: </strong><span id="contact"></span><br/>
					<strong>Email: </strong><span id="email"></span><br/>
					<strong>Address: </strong><span id="address"></span><br/><br/>
					<strong>Purpose: </strong>
					<div id="purpose"></div><br/>
					<strong>Remarks: </strong>
					<div id="remarks"></div>
				</div>
				<div class="modal-footer">
					<form id="statusSet" action="process/status_set.php" method="POST">
						<input type="hidden" id="request_id" name="id">
						<input type="hidden" id="status" name="status">
					</form>
					<button class="btn btn-success" type="button" id="acceptBtn" onclick="statusSet('accept')">Accept</button>
					<button class="btn btn-danger" type="button" id="rejectBtn" onclick="statusSet('reject')">Reject</button>
				</div>
			</div>
		</div>
	</div>
	<?php
			}
		}
		elseif ($section=="engineer"){
			if ($pageSection=="index"){
	?>
	<div class="modal fade" id="testModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Details</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<p>
						<strong>Bus Name: </strong><span id="busname"></span><br/>
						<strong>Status: </strong><span id="status"></span><br/>
					</p>
					<hr/>
					<center><h3>Schedules</h3></center>
					<div class="table-responsive">
						<table class="table" id="data_sched">
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button" id="addSchedBtn" data-toggle="modal" data-target="#schedBus">Add Schedule</button>
					<!-- <button class="btn btn-info" type="button">Edit</button> -->
					<button class="btn btn-danger" type="button" id="deleteBtn">Delete Bus</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addBus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Bus</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<form id="addBusSubmit" action="process/add_bus.php" method="POST">
							<label>Bus Name</label>
							<input type="text" class="form-control" name="bus"> 
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button" onclick="document.getElementById('addBusSubmit').submit();">Add</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="schedBus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Schedule</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Schedule</label>
						<input type="hidden" id="bus_id"> 
						<input type="date" class="form-control" id="date"> 
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button" onclick="addScheduleToServer();">Add</button>
				</div>
			</div>
		</div>
	</div>
	<?php
			}
		}
	}
	?>
	<script type="text/javascript" src="<?= baseURL(); ?>js/popper.min.js"></script>
	<script type="text/javascript" src="<?= baseURL(); ?>js/bootstrap.min.js"></script>
	<?php
	if (isset($front)) {
	?>
	<script type="text/javascript">
		function confirmSubmit(){
			var fname = document.getElementById('fname').value;
			var lname = document.getElementById('lname').value;
			var email = document.getElementById('email').value;
			var contact = document.getElementById('contact').value;
			var address = document.getElementById('address').value;
			var purpose = document.getElementById('purpose').value;
			var remarks = document.getElementById('remarks').value;
			var company = document.getElementById('company').value;
			if ((fname != "")&&(lname != "")&&(email != "")&&(contact != "")&&(address != "")&&(purpose != "")&&(remarks != "")&&(company != "")) {
				Swal.fire({
					title: 'Are you sure to submit this Data?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, submit it!'
					}).then((result) => {
					if (result.value) {
						document.getElementById('form_data').submit();
					}
				});	
			}
			else {
				Swal.fire('Invalid','Please Fill Up all Fields.','error');
			}
		}
	</script>
	<?php	
	}
	if (isset($section)) {
		if($section=="pgo"){
			if($pageSection=="index"){
	?>
	<script type="text/javascript">
		$(window).ready(function(){
			$("#table").DataTable({
				"ajax" : {
					"url" : "process/fetch_data.php",
					"dataSrc": ""
				},
				"columns" : [
					{ data : "fname"},
					{ data : "lname"},
					{ data : "status"},
					{ data : "action"}
				]
			});
		});

		function showData(id){
			$.ajax({
				url: 'process/fetch_info.php',
				type: 'get',
				data: {
					id: id
				},
				success: function(r){
					var obj = r;
					document.getElementById('fname').innerHTML = obj[0].fname;
					document.getElementById('lname').innerHTML = obj[0].lname;
					document.getElementById('contact').innerHTML = obj[0].contact;
					document.getElementById('email').innerHTML = obj[0].email;
					document.getElementById('address').innerHTML = obj[0].address;
					document.getElementById('purpose').innerHTML = obj[0].purpose;
					document.getElementById('remarks').innerHTML = obj[0].remarks;
					document.getElementById('request_id').value = obj[0].id;
				}
			});
		}

		function statusSet(status){
			document.getElementById('status').value = status;
			document.getElementById('statusSet').submit();
		}

	</script>
	<?php
			}
		}
		elseif ($section="engineer"){
			if ($pageSection=="index"){
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#table").DataTable({
				"ajax" : {
					"url" : "process/fetch_data.php",
					"dataSrc": ""
				},
				"columns" : [
					{"data":"bus_name"},
					{"data":"status"},
					{"data":"action"}
				]
			});
		});

		function showData(id){
			$.ajax({
				url: 'process/fetch_info.php',
				type: 'get',
				data: {
					id: id
				},
				success: function(r){
					var obj = r;
					document.getElementById('busname').innerHTML = obj[0].bus_name;
					document.getElementById('status').innerHTML = obj[0].status;
					document.getElementById('addSchedBtn').setAttribute("onclick","addSched("+obj[0].id+")");
					document.getElementById('deleteBtn').setAttribute("onclick","deleteBus("+obj[0].id+")");
				}
			});

			$.ajax({
				url: 'process/fetch_sched.php',
				type: 'get',
				data: {
					id: id
				},
				success: function(r){
					var loopCnt = r.length;
					if (loopCnt>0){
						var loop = 0;
						var display = "<thead><tr><th>Date</th><th>Action</th></tr></thead>";
						while (loop < loopCnt){
							display += "<tr>"
							display += "<td>"+r[loop].reserve_date+"</td>";
							display += "<td><button type='button' onclick='deleteSched("+r[loop].id+","+r[loop].bus_id+")'>X</button></td>";
							display += "</tr>"
							loop++;
						}
						document.getElementById('data_sched').innerHTML = display;
					}
					else {
						document.getElementById('data_sched').innerHTML = "<center>No Scheduled Date</center>";
					}
				}
			});
		}

		function addSched(id){
			document.getElementById('bus_id').value = id;
		}

		function addScheduleToServer(){
			var id = document.getElementById('bus_id').value;
			var date = document.getElementById('date').value;
			$.ajax({
				url: 'process/add_sched.php',
				type: 'post',
				data: {
					id: id,
					date: date
				},
				success: function(r){
					if (r=="success"){
						alert("Added Schedule Successfully.");
						showData(id);
						document.getElementById('date').value = "";
					}
					else if (r=="reserved"){
						alert("Date is Reserved. Please select other date.");
					}
					else {
						alert("Server Error. Please try again.");
					}
				}
			});
		}

		function deleteSched(id,bus_id){
			$.ajax({
				url: 'process/delete_sched.php',
				type: 'post',
				data: {
					id: id,
				},
				success: function(r){
					if (r=="success"){
						alert("Deleted Schedule Successfully.");
						showData(bus_id);
					}
					else {
						alert("Server Error. Please try again.");
					}
				}
			});
		}

		function deleteBus(id){
			if (confirm("Are you sure to delete this bus? (Schedules will be deleted also)")) {
				$.ajax({
					url: 'process/delete_bus.php',
					type: 'post',
					data: {
						id: id,
					},
					success: function(r){
						if (r=="success"){
							alert("Deleted Bus Successfully.");
							window.location.href = "index.php";
						}
						else {
							alert("Server Error. Please try again.");
						}
					}
				});
			}
			else {
				alert("Cancelled.");
			}
		}
	</script>
	<?php
			}
		}
	}
	?>
</body>
</html>