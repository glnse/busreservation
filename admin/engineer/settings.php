<?php
$section = "engineer";
$pageSection = "index";
include("process/auth.php");
include('../../functions.php');

// HEADER
include('../../layout/header.php');
?>
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="text-center py-2">
            <h2>Settings</h2>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card">
            <div class="card-body">
                <h5>Change Password</h5>
                <form action="process/change_password.php" method="POST">
                    <label>Current Password</label>
                    <input type="password" name="currentPw" class="form-control">
                    <label>New Password</label>
                    <input type="password" name="newPw" id="" class="form-control">
                    <label>Retype Password</label>
                    <input type="password" name="retypeNewPw" id="" class="form-control">
                    <br/>
                    <input type="submit" class="btn btn-block btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include('../../layout/footer.php');
?>