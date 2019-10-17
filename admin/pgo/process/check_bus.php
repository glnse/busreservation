<?php
include("../../../config/connection.php");
if (isset($_GET['date'])) {
    $reserve_date = $_GET['date'];
    $sql = "SELECT * FROM obr_buses";
    $result = $conn->query($sql);
    $response = array();
    if ($result->num_rows > 0) {
        while($row=$result->fetch_assoc()){
            $bus_id = $row['id'];
            $sql_2 = "SELECT * FROM obr_schedules WHERE bus_id = '$bus_id' AND reserve_date = '$reserve_date'";
            $result_2 = $conn->query($sql_2);
            if ($result_2->num_rows == 0) {
                $response[] = $row;
            }
        }
        echo json_encode($response);
    }
    else {
        echo json_encode($response);
    }
}
else {
    echo "Required ID";
}
?>