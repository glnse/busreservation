<?php
header("Content-type: application/json; charset=utf-8");
include("../../../config/connection.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM obr_requests WHERE id='$id' LIMIT 1";
    $result = $conn->query($sql) or die($conn->error);
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    echo json_encode($rows);
}
else {
    echo "Required ID";
}
?>