<?php
include("../../../config/connection.php");
if ((isset($_POST['bus_id']))&&(isset($_POST['status']))) {
    $bus_id = $_POST['bus_id'];
    $status = $_POST['status'];
    $driver = $_POST['driver'];
    $place = $_POST['place'];
    if ($status == "On Trip") {
        $sql = "UPDATE obr_buses SET status='$status', driver_name='$driver', place='$place' WHERE id='$bus_id'";
    }
    else {
        $sql = "UPDATE obr_buses SET status='$status', driver_name='$driver', place='$place' WHERE id='$bus_id'";
    }
    if ($conn->query($sql)) {
        $log = "Bus is now ".$status;
        $date = date('Y-m-d');
        $sql = "INSERT INTO obr_history(log_body,date_log,bus_id) VALUES ('$log','$date','$bus_id')";
        $conn->query($sql) or die($conn->error);
        echo "<script>alert('Marked as ".$status."');window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Server Error. Please Try Again.');window.location.href='../index.php';</script>";
    }
}
else {
    echo "Required ID";
}
?>