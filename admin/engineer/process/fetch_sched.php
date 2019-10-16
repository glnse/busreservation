<?php
date_default_timezone_set("Asia/Manila");
header("Content-type: application/json; charset=utf-8");
include("../../../config/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM obr_schedules WHERE bus_id='$id'";
    $result = $conn->query($sql) or die($conn->error);
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $row['reserve_date'] = date('M. d, Y',strtotime($row['reserve_date']));
        $rows[] = $row;
    }
    echo json_encode($rows);
}
else {
    echo "Required ID";
}
?>