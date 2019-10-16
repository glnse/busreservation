<?php
include("../../../config/connection.php");
$sql = "SELECT id, bus_name, status FROM obr_buses ORDER BY id DESC";
$result = $conn->query($sql) or die($conn->error);
$rows = array();
while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $date = date('Y-m-d');
    $sql_2 = "SELECT * FROM obr_schedules WHERE bus_id='$id' AND reserve_date='$date'";
    $result_2 = $conn->query($sql_2);
    if ($result_2->num_rows > 0) {
        $row['status'] = "On Trip";
    }
    else {
        $row['status'] = "Available";
    }
    $rows[] = array("bus_name" => $row['bus_name'],"status" => ucfirst($row['status']),"action" => "<button class=\"btn btn-info\" type=\"button\" data-toggle=\"modal\" data-target=\"#testModal\" onclick=\"showData(".$row['id'].")\">View</button>");
}
echo json_encode($rows);
?>