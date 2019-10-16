<?php
include("../../../config/connection.php");
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM obr_schedules WHERE id='$id' ";
    if ($conn->query($sql)) {
        echo "success";
    } else {
        echo "error";
    }
}
else {
    echo "Required ID";
}
?>