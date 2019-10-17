<?php
include("../../../config/connection.php");
$id = $conn->real_escape_string($_POST['id']);
$reserve_date = $conn->real_escape_string($_POST['reserve_date']);
$bus_id = $conn->real_escape_string($_POST['bus_id']);
$status = $conn->real_escape_string($_POST['status'].'ed');
$sql = "UPDATE obr_requests SET status='$status' WHERE id='$id'";
if ($conn->query($sql)) {
    if ($status=="accepted") {
        $sql = "INSERT INTO obr_schedules (bus_id,request_id,reserve_date) VALUES ('$bus_id','$id','$reserve_date')";
        $conn->query($sql) or die($conn->error);
    }
    echo "<script>alert('Marked as ".ucfirst($status)."');window.location.href='../index.php';</script>";
}
else {
    echo "<script>alert('Server Error. Please Try Again.');window.location.href='../index.php';</script>";
}
?>