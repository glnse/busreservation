<?php
include("../../../config/connection.php");
$id = $conn->real_escape_string($_POST['id']);
$reason = $conn->real_escape_string($_POST['reason']);
if(($_POST['reserve_date']!="")&&($_POST['bus_id']!="")){
    $dates = explode("#",$_POST['reserve_date']);
    $bus_ids = json_decode($_POST['bus_id'],true);
    $toDate = date('Y-m-d',strtotime($dates[1]));
    $start = date('Y-m-d',strtotime($dates[0]));
    $successSql = false;
}
else {
    $bus_ids[] = 0;
    $toDate = date('Y-m-d');
    $start = date('Y-m-d');
    $successSql = true;
}

$loop = 0;
$status = $conn->real_escape_string($_POST['status'].'ed');
while (strtotime($start) <= strtotime($toDate)){
    $loop = 0;
    while ($loop < count($bus_ids)){
        $bus_id = $conn->real_escape_string($bus_ids[$loop]);
        $sql = "UPDATE obr_requests SET status='$status' WHERE id='$id'";
        if ($conn->query($sql)) {
            if ($status=="accepted") {
                $sql = "INSERT INTO obr_schedules (bus_id,request_id,reserve_date) VALUES ('$bus_id','$id','$start')";
                $conn->query($sql) or die($conn->error);
                $successSql = true;
            }
        }
        else {
            echo "<script>alert('Server Error. Please Try Again.');window.location.href='../index.php';</script>";
            $successSql = false;
        }
        $loop++;
    }
    $start = date('Y-m-d',strtotime("+1 day",strtotime($start)));
}

$sql = "SELECT email FROM obr_requests WHERE id='$id'";
$result = $conn->query($sql) or die ($conn->error);
$row = $result->fetch_assoc();

if ($successSql){
    if ($status == "accepted"){
        $status = "approved";
        $msg = "Good day! \n\nYour request has been approved. \n\n PGO Office";
        systemMailer($msg,$row['email'],"Bus Reservation");
    }
    else{
        $status = "disapproved";
        $msg = "Good day! \n\nYour request has been disapproved.\nReason: ".$reason." \n\n PGO Office";
        systemMailer($msg,$row['email'],"Bus Reservation");
    }
    //echo $row['email'];
    echo "<script>alert('Marked as ".ucfirst($status)."');window.location.href='../index.php';</script>";
}

function systemMailer($msg,$email,$subject){
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://glnse.x10.bz/app/mailer.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "msg=".$msg."&subject=".$subject."&email=".$email,
        CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded"
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return $response;
}
?>