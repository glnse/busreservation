<?php
date_default_timezone_set("Asia/Manila");
header("Content-type: application/json; charset=utf-8");
include("../../../config/connection.php");
$sql = "SELECT id, fname, lname, status FROM obr_requests ORDER BY id DESC";
$result = $conn->query($sql) or die($conn->error);
$rows = array();
while ($row = $result->fetch_assoc()) {
    if ($row['status']=="rejected"){
        $row['status']='<span class="badge badge-danger p-2">Disapproved</span>';
    }
    elseif ($row['status']=="accepted"){
        $row['status']='<span class="badge badge-success p-2">Approved</span>';
    }
    else{
        $row['status']='<span class="badge badge-primary p-2">Pending</span>';
    }
    $rows[] = array("fname" => $row['fname'],"lname" => $row['lname'],"status" => $row['status'],"action" => "<button class=\"btn btn-info\" type=\"button\" data-toggle=\"modal\" data-target=\"#testModal\" onclick=\"showData(".$row['id'].")\">View</button>");
}
echo json_encode($rows);
?>