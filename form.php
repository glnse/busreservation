<?php
$front = "";
include('functions.php');

// HEADER
include('layout/header.php');
if (isset($_POST['submitForm'])) {
	include('config/connection.php');
	$fname = $conn->real_escape_string($_POST['fname']);
	$lname = $conn->real_escape_string($_POST['lname']);
	$contact = $conn->real_escape_string($_POST['contact']);
	$email = $conn->real_escape_string($_POST['email']);
	$address = $conn->real_escape_string($_POST['address']);
	$purpose = $conn->real_escape_string($_POST['purpose']);
	$remarks = $conn->real_escape_string($_POST['remarks']);
	$company = $conn->real_escape_string($_POST['company']);

	if (($fname!="")&&($lname!="")&&($contact!="")&&($email!="")&&($address!="")&&($purpose!="")&&($remarks!="")) {
		$sql = "INSERT INTO obr_requests (fname,lname,contact,email,address,purpose,remarks,company) VALUES ('$fname','$lname','$contact','$email','$address','$purpose','$remarks','$company')";
		if ($conn->query($sql)) {
			echo "<script>Swal.fire('Success','Request Submitted.','success');</script>";
		}
		else {
			echo "<script>Swal.fire('Error','Failed to submit request due to an Error. Please Try Again.','error');</script>";
		}
	}
	else {
		echo "<script>Swal.fire('Invalid','Please Fill Up all Fields.','error');</script>";
	}
}
elseif (!isset($_POST['confirm'])) {
	header('Location: index.php');
}
?>
<div class="row justify-content-center">
	<div class="col-sm-6">
		<div class="card" style="box-shadow: 5px 5px 5px #263238;">
			<div class="card-header">
				Bus Reservation Form
			</div>
			<div class="card-body">
				<form action="" method="POST" id="form_data">
					<div class="row">
						<div class="col-sm-12">
							<h6 class="card-title">Please fill up the following field.</h6>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">First Name</label>
								<input type="text" class="form-control" name="fname" id="fname">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Last Name</label>
								<input type="text" class="form-control" name="lname" id="lname">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Contact Number</label>
								<input type="text" class="form-control" name="contact" id="contact">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" id="email">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Company</label>
								<input type="text" class="form-control" name="company" id="company">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Address</label>
								<input type="text" class="form-control" name="address" id="address">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Purpose</label>
								<textarea name="purpose" class="form-control" rows="5" id="purpose"></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
								<label for="">Remarks</label>
								<textarea name="remarks" class="form-control" rows="5" id="remarks"></textarea>
							</div>
						</div>
						<div class="col-sm-12">
							<input type="hidden" name="submitForm">
							<button type="button" class="btn btn-outline-success btn-block btn-lg" onclick="confirmSubmit();">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
// FOOTER
include('layout/footer.php')
?>