<?php
include("../../../config/connection.php");
$sql = "SELECT id, bus_name, status FROM obr_buses ORDER BY id DESC";
$result = $conn->query($sql) or die($conn->error);
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = array("bus_name" => $row['bus_name'],"status" => ucfirst($row['status']),"action" => "<button class=\"btn btn-info\" type=\"button\" data-toggle=\"modal\" data-target=\"#testModal\">View</button>");
}
echo json_encode($rows);
?>