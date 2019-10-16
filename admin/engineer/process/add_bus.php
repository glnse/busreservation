<?php
include("../../../config/connection.php");
if (isset($_POST['bus'])) {
    $bus = $_POST['bus'];
    $sql = "INSERT INTO obr_buses (bus_name) VALUES ('$bus')";
    if ($conn->query($sql)) {
        echo "<script>alert('Bus Added');window.location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Server Error. Please try again.');window.location.href='../index.php';</script>";
    }
}
else {
    echo "Required ID";
}
?>