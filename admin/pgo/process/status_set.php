<?php
include("../../../config/connection.php");
$id = $conn->real_escape_string($_POST['id']);
$status = $conn->real_escape_string($_POST['status'].'ed');
$sql = "UPDATE obr_requests SET status='$status' WHERE id='$id'";
if ($conn->query($sql)) {
    echo "<script>alert('Marked as ".ucfirst($status)."');window.location.href='../index.php';</script>";
}
else {
    echo "<script>alert('Server Error. Please Try Again.');window.location.href='../index.php';</script>";
}
?>