<?php
header("Content-type: application/json; charset=utf-8");
include("../../../config/connection.php");
$sql = "SELECT id, fname, lname, status FROM obr_requests ORDER BY id DESC";
$result = $conn->query($sql) or die($conn->error);
$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = array("fname" => $row['fname'],"lname" => $row['lname'],"status" => ucfirst($row['status']),"action" => "<button class=\"btn btn-info\" type=\"button\" data-toggle=\"modal\" data-target=\"#testModal\">View</button>");
}
echo json_encode($rows);
?>