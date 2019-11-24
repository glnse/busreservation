<?php
include("../../../config/connection.php");
header("Content-Type: application/json");
if ((isset($_GET['fromDate']))&&(isset($_GET['toDate']))) {
    $qty = $_GET['qty'];
    $fromDate = $_GET['fromDate'];
    $toDate = date('Y-m-d',strtotime($_GET['toDate']));
    $start = date('Y-m-d',strtotime($fromDate));
    $response = array();
    $qtyAvail = 0;
    while (strtotime($start) <= strtotime($toDate)){
        $qtyAvail = 0;
        $response = array();
        $sql = "SELECT * FROM obr_buses";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row=$result->fetch_assoc()){
                $bus_id = $row['id'];
                $sql_2 = "SELECT * FROM obr_schedules WHERE bus_id = '$bus_id' AND reserve_date = '$start'";
                $result_2 = $conn->query($sql_2);
                if ($result_2->num_rows == 0) {
                    $qtyAvail++;
                    $response[] = $row;
                }
            }
        }
        if ($qtyAvail >= $qty ){
            $start = date('Y-m-d',strtotime("+1 day",strtotime($start)));
        }
        else {
            $response = array();
            break;
        }
    }
    echo json_encode($response);
}
else {
    echo "Required ID";
}
?>