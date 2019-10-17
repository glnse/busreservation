<?php
include("../../../config/connection.php");
if (isset($_POST['bus'])) {
    $bus = $_POST['bus'];
    $mvfile_no = $_POST['mvfile_no'];
    $plate_no = $_POST['plate_no'];
    $engine_no = $_POST['engine_no'];
    $chassis_no = $_POST['chassis_no'];
    $denomination = $_POST['denomination'];
    $piston_displacement = $_POST['piston_displacement'];
    $no_of_cylinders = $_POST['no_of_cylinders'];
    $fuel = $_POST['fuel'];
    $make = $_POST['make'];
    $series = $_POST['series'];
    $body_type = $_POST['body_type'];
    $body_no = $_POST['body_no'];
    $year_model = $_POST['year_model'];
    $gross_wt = $_POST['gross_wt'];
    $net_wt = $_POST['net_wt'];
    $shipping_wt = $_POST['shipping_wt'];
    $net_capacity = $_POST['net_capacity'];
    $or_no = $_POST['or_no'];
    $or_date = $_POST['or_date'];
    $sql = "UPDATE obr_buses SET bus_name = '$bus', mvfile_no = '$mvfile_no', plate_no = '$plate_no', chassis_no = '$chassis_no', denomination = '$denomination', piston_displacement = '$piston_displacement', no_of_cylinders = '$no_of_cylinders', fuel = '$fuel', make = '$make', series = '$series', body_type = '$body_type', body_no = '$body_no', year_model= '$year_model', gross_wt = '$gross_wt', net_wt = '$net_wt', shipping_wt = '$shipping_wt', net_capacity = '$net_capacity', or_no = '$or_no', or_date = '$or_date'";
    if ($conn->query($sql) or die($conn->error)) {
        echo "<script>alert('Bus Updated');window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Server Error. Please try again.');window.location.href='../index.php';</script>";
    }
}
else {
    echo "Required ID";
}
?>