	</div>
	<br/>
	<?php
	if (isset($section)) {
		if($section=="pgo"){
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
						<strong>First Name: </strong>Juan<br/>
						<strong>Last Name: </strong>Dela Cruz<br/>
						<strong>Contact: </strong>09XXXXXXXXX<br/>
						<strong>Email: </strong>juandelacruz@gmail.com<br/>
						<strong>Address: </strong>XXX Barangay, Lingayen, Pangasinan<br/><br/>
						<strong>Purpose: </strong><br/>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Id exercitationem, voluptatem accusantium, inventore nesciunt suscipit error ipsum expedita deleniti tenetur adipisci nam, fuga unde qui quisquam ipsam quos consequatur! Sed!<br/><br/>
						<strong>Remarks: </strong><br/>
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Id exercitationem, voluptatem accusantium, inventore nesciunt suscipit error ipsum expedita deleniti tenetur adipisci nam, fuga unde qui quisquam ipsam quos consequatur! Sed!<br/>
					</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button">Accept</button>
					<button class="btn btn-danger" type="button">Reject</button>
				</div>
			</div>
		</div>
	</div>
	<?php
		}
		else if ($section=="engineer"){
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
						<h1>BUS DATA</h1>
					</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button">Add Schedule</button>
					<button class="btn btn-info" type="button">Edit</button>
					<button class="btn btn-danger" type="button">Delete</button>
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
						<label>Bus Name</label>
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" type="button">Add</button>
				</div>
			</div>
		</div>
	</div>
	<?php
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
			if ((fname != "")&&(lname != "")&&(email != "")&&(contact != "")&&(address != "")&&(purpose != "")&&(remarks != "")) {
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
	</script>
	<?php
		}
		else if ($section="engineer"){
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
	</script>
	<?php
		}
	}
	?>
</body>
</html>