<?php
date_default_timezone_set("Asia/Manila");
header("Content-type: application/json; charset=utf-8");
include("../../../config/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM obr_buses WHERE id='$id' LIMIT 1";
    $result = $conn->query($sql) or die($conn->error);
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $date = date('Y-m-d');
        $sql_2 = "SELECT * FROM obr_schedules WHERE bus_id='$id' AND reserve_date='$date'";
        $scheds = "";
        $result_2 = $conn->query($sql_2);
        if ($result_2->num_rows > 0) {
            $row['status'] = "On Trip";
        }
        else {
            $row['status'] = "Available";
        }
        $rows[] = $row;
    }
    echo json_encode($rows);
}
else {
    echo "Required ID";
}
?>