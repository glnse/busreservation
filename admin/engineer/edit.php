<?php
$section = "engineer";
$pageSection = "history";
include("process/auth.php");
include("../../config/connection.php");
include('../../functions.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM obr_buses WHERE id = '$id' LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();   
}
else {
    header("Location: index.php");
}

// HEADER
include('../../layout/header.php');
?>
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="text-center py-2">
            <h2>Edit Bus</h2>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3>Bus Name: <?= $row['bus_name'];?></h3>
                <form method="POST" action="process/update_bus.php">
                    <label>Bus Name</label>
                    <input type="text" class="form-control" name="bus" value="<?= $row['bus_name'];?>">
                    <label>MV FILE NO.</label>
                    <input type="text" class="form-control" name="mvfile_no" value="<?= $row['mvfile_no'];?>"> 
                    <label>PLATE NO.</label>
                    <input type="text" class="form-control" name="plate_no" value="<?= $row['plate_no'];?>"> 
                    <label>ENGINE NO.</label>
                    <input type="text" class="form-control" name="engine_no" value="<?= $row['engine_no'];?>"> 
                    <label>CHASSIS NO.</label>
                    <input type="text" class="form-control" name="chassis_no" value="<?= $row['chassis_no'];?>"> 
                    <label>DENOMINATION</label>
                    <input type="text" class="form-control" name="denomination" value="<?= $row['denomination'];?>"> 
                    <label>PISTON DISPLACEMENT</label>
                    <input type="text" class="form-control" name="piston_displacement" value="<?= $row['piston_displacement'];?>"> 
                    <label>NO. OF CYLINDERS</label>
                    <input type="text" class="form-control" name="no_of_cylinders" value="<?= $row['no_of_cylinders'];?>"> 
                    <label>FUEL</label>
                    <input type="text" class="form-control" name="fuel" value="<?= $row['fuel'];?>"> 
                    <label>MAKE</label>
                    <input type="text" class="form-control" name="make" value="<?= $row['make'];?>"> 
                    <label>SERIES</label>
                    <input type="text" class="form-control" name="series" value="<?= $row['series'];?>"> 
                    <label>BODY TYPE</label>
                    <input type="text" class="form-control" name="body_type" value="<?= $row['body_type'];?>"> 
                    <label>BODY NO.</label>
                    <input type="text" class="form-control" name="body_no" value="<?= $row['body_no'];?>"> 
                    <label>YEAR MODEL</label>
                    <input type="text" class="form-control" name="year_model" value="<?= $row['year_model'];?>"> 
                    <label>GROSS WT.</label>
                    <input type="text" class="form-control" name="gross_wt" value="<?= $row['gross_wt'];?>"> 
                    <label>NET WT.</label>
                    <input type="text" class="form-control" name="net_wt" value="<?= $row['net_wt'];?>"> 
                    <label>SHIPPING WT.</label>
                    <input type="text" class="form-control" name="shipping_wt" value="<?= $row['shipping_wt'];?>"> 
                    <label>NET CAPACITY</label>
                    <input type="text" class="form-control" name="net_capacity" value="<?= $row['net_capacity'];?>">
                    <label>OR NO.</label>
                    <input type="text" class="form-control" name="or_no" value="<?= $row['or_no'];?>">
                    <label>OR DATE</label>
                    <input type="date" class="form-control" name="or_date" value="<?= $row['or_date'];?>">
                    <br/>
                    <input type="submit" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('../../layout/footer.php');
?>