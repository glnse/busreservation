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
					<strong>Address: </strong><span id="address"></span><br/>
					<strong>Bus Qty: </strong><span id="busqty"></span><br/><br/>
					<strong>Purpose: </strong>
					<div id="purpose"></div><br/>
					<strong>Remarks: </strong>
					<div id="remarks"></div>
					<div id="enterDate">
					<hr/>
					<strong>Start Date: </strong>&nbsp<input type="text" id="startDate" readonly/><br/>
					<strong>End Date: </strong>&nbsp<input type="text" id="endDate" readonly/>
					</div>
					<div id="availableBus"></div>
				</div>
				<div class="modal-footer" id="footerModal">
					<form id="statusSet" action="process/status_set.php" method="POST">
						<input type="hidden" id="request_id" name="id">
						<input type="hidden" id="status" name="status">
						<input type="hidden" id="bus_id" name="bus_id" value="">
						<input type="hidden" id="reserve_date" name="reserve_date" value="">
						<input type="hidden" id="reason" name="reason" value="No Bus Available">
					</form>
					<button class="btn btn-success" type="button" id="acceptBtn" onclick="statusSet('accept')" disabled>Approve</button>
					<button class="btn btn-danger" type="button" id="rejectBtn" data-target="#rejectModal" data-toggle="modal">Disapprove</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Reason for Disapproval</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<select class="form-control" onchange="document.getElementById('reason').value=this.value;">
						<option>No Bus Available</option>
						<option>Invalid Purpose</option>
						<option>Cancelled By Client</option>
					</select>
				</div>
				<div class="modal-footer" id="footerModal">
					<button class="btn btn-danger" type="button" id="rejectBtn" onclick="statusSet('reject')">Submit</button>
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
					<div class="row">
						<div class="col-sm-12">
							<p style="margin-bottom: 2px;">
								<form id="switchStat" action="process/switch_status.php" method="POST">
									<input type="hidden" name="bus_id" id="switchStatId">
									<input type="hidden" name="status" id="status_name">
									<input type="hidden" name="driver" id="driver_holder">
									<input type="hidden" name="place" id="place_holder">
								</form>
								<strong>Bus Name: </strong><span id="busname"></span><br/>
								<strong>Status: </strong><span id="status"></span><br/>
								<div id="ifOnTrip" style="display:none;">
									<strong>Driver Name: </strong><span id="driver_name"></span><br/>
									<strong>Place: </strong><span id="place_name"></span><br/>
								</div>
								Change Status to:
								<div id="statusBtn" style="margin-top: 0;">
									<button class="btn btn-info btn-sm" type="button" id="onTripBtn" data-toggle="modal" data-target="#onTripModal">On Trip</button>
									<button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#maintainBus" id="maintainBtn">Maintenance</button>
								</div>
							</p>
							<h3>Bus Information</h3>
							<p>
								<strong>MV FILE NO.: </strong><span id="mvfile_no"></span><br/>
								<strong>PLATE NO.: </strong><span id="plate_no"></span><br/>
								<strong>ENGINE NO.: </strong><span id="engine_no"></span><br/>
								<strong>CHASSIS NO.: </strong><span id="chassis_no"></span><br/>
								<strong>DENOMINATION NO.: </strong><span id="denomination"></span><br/>
								<strong>PISTON DISPLACEMENT: </strong><span id="piston_displacement"></span><br/>
								<strong>NO. OF CYLINDERS: </strong><span id="no_of_cylinders"></span><br/>
								<strong>FUEL: </strong><span id="fuel"></span><br/>
								<strong>MAKE: </strong><span id="make"></span><br/>
								<strong>SERIES: </strong><span id="series"></span><br/>
								<strong>BODY TYPE: </strong><span id="body_type"></span><br/>
								<strong>BODY NO.: </strong><span id="body_no"></span><br/>
								<strong>YEAR MODEL: </strong><span id="year_model"></span><br/>
								<strong>GROSS WT.: </strong><span id="gross_wt"></span><br/>
								<strong>NET WT.: </strong><span id="net_wt"></span><br/>
								<strong>SHIPPING WT.: </strong><span id="shipping_wt"></span><br/>
								<strong>NET CAPACITY: </strong><span id="net_capacity"></span><br/>
								<strong>OR NO.: </strong><span id="or_no"></span><br/>
								<strong>OR DATE.: </strong><span id="or_date"></span><br/>
							</p>
						</div>
						<div class="col-sm-6">
							<div style="display:none;">
								<center><h3>Schedules</h3></center>
								<div class="table-responsive">
									<table class="table" id="data_sched">
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<!-- <button class="btn btn-success" type="button" id="addSchedBtn" data-toggle="modal" data-target="#schedBus">Add Schedule</button> -->
					<button class="btn btn-warning" type="button" id="historyBtn">History</button>
					<button class="btn btn-info" type="button" id="editBtn">Edit</button>
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
							<label>MV FILE NO.</label>
							<input type="text" class="form-control" name="mvfile_no"> 
							<label>PLATE NO.</label>
							<input type="text" class="form-control" name="plate_no"> 
							<label>ENGINE NO.</label>
							<input type="text" class="form-control" name="engine_no"> 
							<label>CHASSIS NO.</label>
							<input type="text" class="form-control" name="chassis_no"> 
							<label>DENOMINATION</label>
							<input type="text" class="form-control" name="denomination"> 
							<label>PISTON DISPLACEMENT</label>
							<input type="text" class="form-control" name="piston_displacement"> 
							<label>NO. OF CYLINDERS</label>
							<input type="text" class="form-control" name="no_of_cylinders"> 
							<label>FUEL</label>
							<input type="text" class="form-control" name="fuel"> 
							<label>MAKE</label>
							<input type="text" class="form-control" name="make"> 
							<label>SERIES</label>
							<input type="text" class="form-control" name="series"> 
							<label>BODY TYPE</label>
							<input type="text" class="form-control" name="body_type"> 
							<label>BODY NO.</label>
							<input type="text" class="form-control" name="body_no"> 
							<label>YEAR MODEL</label>
							<input type="text" class="form-control" name="year_model"> 
							<label>GROSS WT.</label>
							<input type="text" class="form-control" name="gross_wt"> 
							<label>NET WT.</label>
							<input type="text" class="form-control" name="net_wt"> 
							<label>SHIPPING WT.</label>
							<input type="text" class="form-control" name="shipping_wt"> 
							<label>NET CAPACITY</label>
							<input type="text" class="form-control" name="net_capacity">
							<label>OR NO.</label>
							<input type="text" class="form-control" name="or_no">
							<label>OR DATE</label>
							<input type="date" class="form-control" name="or_date">   
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
	<div class="modal fade" id="maintainBus" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Maintenance</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<form action="process/bus_maintain.php" method="POST" id="maintainForm">
							<label>Enter Remarks:</label>
							<input type="hidden" id="bus_id_maintain" name="bus_id"> 
							<textarea name="remarks" class="form-control" id="remarksSet"></textarea>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button" onclick="markedAsMaintenance();">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="onTripModal" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Details</h5>
					<button class="close" type="button" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<form action="process/bus_maintain.php" method="POST" id="maintainForm">
							<label>Driver Name:</label>
							<input name="driver" class="form-control" id="driver">
							<label>Place:</label>
							<input name="place" class="form-control" id="place">
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button" id="onTripSubmitBtn">Submit</button>
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
		var busqty = 0;
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
					console.log(obj[0].startDate);
					document.getElementById('startDate').value = obj[0].startDate;
					document.getElementById('endDate').value = obj[0].endDate;
					document.getElementById('busqty').innerHTML = obj[0].bus_qty;
					busqty = parseInt(obj[0].bus_qty);
					if ((obj[0].status == "accepted")||(obj[0].status == "rejected")){
						document.getElementById('footerModal').style.display = "none";
						document.getElementById('enterDate').style.display = "none";
					}
				}
			}).then(() => availBus());
		}

		function statusSet(status){
			document.getElementById('status').value = status;
			document.getElementById('statusSet').submit();
		}

		function availBus(){
			var startDate = document.getElementById('startDate').value;
			var endDate = document.getElementById('endDate').value;
			
			$.ajax({
				url: 'process/check_bus.php',
				type: 'get',
				data: {
					qty: busqty,
					toDate: endDate,
					fromDate: startDate
				},
				success: function(r){
					var obj = JSON.parse(JSON.stringify(r))	;
					console.log(r);
					if (obj.length > 0){
						document.getElementById('acceptBtn').setAttribute("disabled","");
						var loopCnt = obj.length;
						var loopBusQty = 1;
						var display = "";
						while (loopBusQty <= busqty){
							display += "<br/><strong>Choose Bus "+loopBusQty+": </strong>&nbsp<select id='choose_bus"+loopBusQty+"' onchange='getData();'>";
							display += "<option disabled selected>Choose Bus</option>";
							var loop = 0;
							while (loop < loopCnt){
						 		display += "<option value='"+obj[loop].id+"'>"+obj[loop].bus_name+"</option>";
						 		loop++;
						 	}
						 	display += "</select><br/>";
						 	loopBusQty++;
						}
					 	document.getElementById('availableBus').innerHTML = display;
					}
					else {
						var display = "<strong><br/>No Bus Available</strong>";
						document.getElementById('availableBus').innerHTML = display;
					}
				}
			});
		}

		function getData(){
			var loop = 1;
			var data = [];
			while (loop<=busqty){
				if (document.getElementById('choose_bus'+loop).value != "Choose Bus"){
					data.push(document.getElementById('choose_bus'+loop).value);
					loop++;
				}
				else {
					data = [];
					break;
				}
			}
			console.log(JSON.stringify(data));
			document.getElementById('reserve_date').value = document.getElementById('startDate').value+"#"+document.getElementById('endDate').value;
			var duplicated = false;
			if (data.length > 0){
				loop = 0;
				while (loop < data.length){
					var loopCheck = 0;
					while (loopCheck < data.length){
						if (loop != loopCheck){
							if (data[loop] == data[loopCheck]){
								duplicated = true;
								break;
							}
							else {
								console.log("test");
								loopCheck++;
							}
						}
						else {
							loopCheck++;
						}
					}
					if (duplicated) {
						break;
					}
					else {
						loop++;
					}
				}

				if(duplicated){
					alert("There should be no Same Bus");
				}
				else {
					document.getElementById('acceptBtn').removeAttribute("disabled");
					document.getElementById('bus_id').value = JSON.stringify(data);
				}
			}
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
					document.getElementById('mvfile_no').innerHTML = obj[0].mvfile_no;
					document.getElementById('engine_no').innerHTML = obj[0].engine_no;
					document.getElementById('plate_no').innerHTML = obj[0].plate_no;
					document.getElementById('denomination').innerHTML = obj[0].denomination;
					document.getElementById('piston_displacement').innerHTML = obj[0].piston_displacement;
					document.getElementById('no_of_cylinders').innerHTML = obj[0].no_of_cylinders;
					document.getElementById('fuel').innerHTML = obj[0].fuel;
					document.getElementById('make').innerHTML = obj[0].make;
					document.getElementById('series').innerHTML = obj[0].series;
					document.getElementById('body_type').innerHTML = obj[0].body_type;
					document.getElementById('body_no').innerHTML = obj[0].body_no;
					document.getElementById('year_model').innerHTML = obj[0].year_model;
					document.getElementById('gross_wt').innerHTML = obj[0].gross_wt;
					document.getElementById('net_wt').innerHTML = obj[0].net_wt;
					document.getElementById('shipping_wt').innerHTML = obj[0].shipping_wt;
					document.getElementById('net_capacity').innerHTML = obj[0].net_capacity;
					document.getElementById('or_no').innerHTML = obj[0].or_no;
					document.getElementById('or_date').innerHTML = obj[0].or_date;
					document.getElementById('driver_name').innerHTML = obj[0].driver_name;
					document.getElementById('place_name').innerHTML = obj[0].place;
					//document.getElementById('addSchedBtn').setAttribute("onclick","addSched("+obj[0].id+")");
					document.getElementById('historyBtn').setAttribute("onclick","history("+obj[0].id+")");
					document.getElementById('deleteBtn').setAttribute("onclick","deleteBus("+obj[0].id+")");
					document.getElementById('editBtn').setAttribute("onclick","edit("+obj[0].id+")");
					if (obj[0].status == "Available") {
						document.getElementById('onTripSubmitBtn').setAttribute("onclick","setOnTrip("+obj[0].id+")");
						document.getElementById('maintainBtn').setAttribute("onclick","setOnMaintenance("+obj[0].id+")");	
					}
					else if ((obj[0].status == "On Trip")||(obj[0].status == "Maintenance")) {
						document.getElementById('ifOnTrip').style.display = "initial";
						document.getElementById('statusBtn').innerHTML = '<button class="btn btn-success btn-sm" type="button" id="onAvailable">Available</button>';
						document.getElementById('onAvailable').setAttribute("onclick","setAvailable("+obj[0].id+")");
					}
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

		function setOnMaintenance(id){
			document.getElementById('bus_id_maintain').value = id;
		}

		function markedAsMaintenance(id){
			if(document.getElementById('remarksSet').value != ""){
				if (confirm("Confirm to set MAINTENANCE?")) {
					document.getElementById('maintainForm').submit();
				}
				else {
					alert("Cancelled.");
				}
			}
			else {
				alert("Please Enter Remarks.");
			}
		}

		function setOnTrip(id){
			if ((document.getElementById("driver").value != "")&&(document.getElementById("place").value != "")){
				if (confirm("Confirm to set ON TRIP?")) {
					document.getElementById("driver_holder").value = document.getElementById("driver").value;
					document.getElementById("place_holder").value = document.getElementById("place").value;
					document.getElementById("switchStatId").value = id;
					document.getElementById("status_name").value = "On Trip";
					document.getElementById("switchStat").submit();
				}
			}
			else {
				alert("Please Fill Up all Details.");
			}
		}

		function setAvailable(id){
			if (confirm("Confirm to set AVAILABLE?")) {
				document.getElementById("switchStatId").value = id;
				document.getElementById("status_name").value = "Available";
				document.getElementById("switchStat").submit();
			}
		}

		function edit(id){
			window.location.href = "edit.php?id="+id;
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

		function history(id){
			window.location.href = "history.php?id="+id;
		}
		function deleteBus(id){
			if (confirm("Are you sure to delete this bus? (This will be irreversable)")) {
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