<?php
include("../../../config/connection.php");
if ((isset($_POST['id']))&&(isset($_POST['date']))) {
    $bus_id = $_POST['id'];
    $reserve_date = $_POST['date'];
    $sql = "SELECT * FROM obr_schedules WHERE bus_id = '$bus_id' AND reserve_date = '$reserve_date'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "reserved";
    } else {
        $sql = "INSERT INTO obr_schedules (bus_id,reserve_date) VALUES ('$bus_id','$reserve_date')";
        if ($conn->query($sql)) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
else {
    echo "Required ID";
}
?>