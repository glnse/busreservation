<?php

$section = "engineer";
$pageSection = "";

include("process/auth.php");
include("../../config/connection.php");
include('../../functions.php');

// HEADER
include('../../layout/header.php');

$response = array();
$sql = "SELECT * FROM obr_requests WHERE status='accepted'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    while ($row=$result->fetch_assoc()){
        $requestId = $row['id'];
        $name = $row['fname']." ".$row['lname'];

        $sql_2 = "SELECT * FROM obr_schedules WHERE request_id='$requestId' LIMIT 1";
        $resultFirst = $conn->query($sql_2);
        $row_2 = $resultFirst->fetch_assoc();
        $startDate = date("Y-m-d",strtotime($row_2['reserve_date']));

        $sql_2 = "SELECT * FROM obr_schedules WHERE request_id='$requestId' ORDER BY id DESC LIMIT 1";
        $resultFirst = $conn->query($sql_2);
        $row_2 = $resultFirst->fetch_assoc();
        $endDate = date("Y-m-d",strtotime($row_2['reserve_date']));
        
        $message = array("title"=>$name,"start"=>$startDate, "end"=>$endDate, "textColor" => "white", "url"=>"view_info.php?id=".$requestId);
        array_push($response,$message);
    }
}
?>
<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card" style="box-shadow: 5px 5px 5px #263238;">
			<div class="card-header">
				Calendar
			</div>
			<div class="card-body">
                <div id='calendar'></div>
			</div>
		</div>
	</div>
</div>
<script>
    $(document).ready(function() {
		$('#calendar').fullCalendar({
			// events: [
			// 	{
			// 		title: 'Click for Google',
			// 		url: 'http://google.com/',
			// 		start: '2019-11-02'
			// 	}
			// ],
            <?php if(count($response) > 0) {
            ?>
            events: <?php echo json_encode($response);?>,
            <?php
            }?>
		});
	});
</script>
<?php
// FOOTER
include('../../layout/footer.php')
?>