<?php
include("../../../config/connection.php");
if ((isset($_POST['bus_id']))&&(isset($_POST['remarks']))) {
    $bus_id = $_POST['bus_id'];
    $remarks = $_POST['remarks'];
    $sql = "UPDATE obr_buses SET status='Maintenance' WHERE id='$bus_id'";
    if ($conn->query($sql)) {
        $log = "Bus is under Maintenance. Remarks: ".$remarks;
        $date = date('Y-m-d');
        $sql = "INSERT INTO obr_history(log_body,date_log,bus_id) VALUES ('$log','$date','$bus_id')";
        $conn->query($sql) or die($conn->error);
        echo "<script>alert('Marked as Maintenace');window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Server Error. Please Try Again.');window.location.href='../index.php';</script>";
    }
}
else {
    echo "Required ID";
}
?>