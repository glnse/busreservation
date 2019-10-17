<?php
$section = "engineer";
$pageSection = "history";
include("process/auth.php");
include("../../config/connection.php");
include('../../functions.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM obr_history WHERE bus_id = '$id' ORDER BY id DESC";
    $result = $conn->query($sql);
    $sql_2 = "SELECT * FROM obr_buses WHERE id='$id' LIMIT 1";
    $result_2 = $conn->query($sql_2);
    $row_2 = $result_2->fetch_assoc();    
}
else {
    header("Location: index.php");
}

// HEADER
include('../../layout/header.php');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center py-2">
            <h2>History</h2>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h3>Bus Name: <?= $row_2['bus_name'];?></h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Log</th>
                                <th>Date</th>
                            </tr>
                            <?php
                            if ($result->num_rows > 0){
                                while ($row = $result->fetch_assoc()){
                            ?>
                            <tr>
                                <td><?= $row['log_body'];?></td>
                                <td><?= $row['date_log'];?></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../layout/footer.php');
?>