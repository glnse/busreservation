<?php
$section = "engineer";
$pageSection = "index";
include("process/auth.php");
include('../../functions.php');

// HEADER
include('../../layout/header.php');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="text-center py-2">
            <h2>Buses</h2>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addBus">Add Bus</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Bus Name</th>
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