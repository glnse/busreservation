<?php
$front = "";
include('functions.php');
include('config/connection.php');
// HEADER
include('layout/header.php');

if (!isset($_POST['confirm'])) {
	header('Location: index.php');
}
$sql = "SELECT * FROM obr_buses";
$result = $conn->query($sql);
$busQty = $result->num_rows;
$response = array();
$sql = "SELECT * FROM obr_schedules";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $curDate = "";
    while ($row=$result->fetch_assoc()){
        if ($curDate != $row['reserve_date']){
            $curDate = $row['reserve_date'];
            $sql_2 = "SELECT * FROM obr_schedules WHERE reserve_date = '$curDate'";
            $result_2 = $conn->query($sql_2);
            $reservedBuses = $result_2->num_rows;
            $date = date("Y-m-d",strtotime($curDate));
            if ($reservedBuses == $busQty){
                $message = array("title"=>"Reserved","start"=>$date,"color"=>"white","textColor"=>"white","backgroundColor"=>"#c72c41");
                array_push($response,$message);
            }
            else {
                $availQty = $busQty-$reservedBuses;
                $message = array("title"=>$availQty." Bus Available","start"=>$date,"url"=>"form.php?time=".(strtotime($curDate)*1000));
                array_push($response,$message);
            }
        }
    }
}
?>
<div class="row justify-content-center">
	<div class="col-sm-8">
		<div class="card" style="box-shadow: 5px 5px 5px #263238;">
			<div class="card-header">
				Bus Reservation Calendar
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
            dayRender: function(date, cell) {
                var CurrentDate = moment().startOf('day');
                if (date >= CurrentDate){
	                cell.append('<div style="margin-top: 30%;"><center><a href="form.php?time='+date+'"><span class="badge badge-success p-2">Available</span></a></center></div>');
                }
	        },
            eventAfterAllRender: function(view) {
	            var dayEvents = $('#calendar').fullCalendar('clientEvents', function(event) {
	            if (event.end) {
	                var dates = getDates(event.start, event.end);
	                $.each(dates, function(index, value) {
	                var td = $('td.fc-day[data-date="' + value + '"]');
	                td.find('div:first').remove();
	                });
	            } else {
	                var td = $('td.fc-day[data-date="' + event.start.format('YYYY-MM-DD') + '"]');
	                td.find('div:first').remove();
	                }
	            });
	        }
		});
	});
</script>
<?php
// FOOTER
include('layout/footer.php')
?>