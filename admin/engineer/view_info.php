<?php
$section = "engineer";
$pageSection = "index";
include("process/auth.php");
include('../../functions.php');
include('../../config/connection.php');

// HEADER
include('../../layout/header.php');

$id = $_GET['id'];
$sql = "SELECT * FROM obr_requests WHERE id='$id' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    header("Location: calendar.php");
}

?>
<div class="row justify-content-center">
	<div class="col-sm-6">
		<div class="card" style="box-shadow: 5px 5px 5px #263238;">
			<div class="card-header">
				Reservation Information
			</div>
			<div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" disabled value='<?= $row['fname'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" disabled value='<?= $row['lname'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" class="form-control" disabled value='<?= $row['contact'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" disabled value='<?= $row['email'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Company</label>
                            <input type="text" class="form-control" disabled value='<?= $row['company'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" disabled value='<?= $row['address'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <h5>Reservation Period</h5>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="text" class="form-control" disabled value='<?= date("m/d/Y",strtotime($row['startDate']));?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="text" class="form-control" disabled value='<?= date("m/d/Y",strtotime($row['endDate']));?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Bus Qty</label>
                            <input type="number" class="form-control" disabled value='<?= $row['bus_qty'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Passengers</label>
                            <input type="number" class="form-control" disabled value='<?= $row['passengers'];?>'>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Purpose</label>
                            <textarea name="purpose" class="form-control" disabled><?= $row['purpose'];?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Remarks</label>
                            <textarea name="remarks" class="form-control" disabled><?= $row['remarks'];?></textarea>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php
include('../../layout/footer.php');
?>