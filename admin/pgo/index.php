<?php
$section = "pgo";
include("process/auth.php");
include('../../functions.php');

// HEADER
include('../../layout/header.php');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center py-2">
            <h2>Requests</h2>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
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