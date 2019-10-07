<?php
session_start();

if (isset($_SESSION['user_id'])){
    if (isset($_SESSION['role'])){
        if ($_SESSION['role']=="pgo"){
            header("Location: pgo");
        }
        else if ($_SESSION['role']=="engineer"){
            header("Location: engineer");
        }
    }
}

include('../config/connection.php');
include('../functions.php');

if (isset($_POST['login'])){
    $username = $conn->real_escape_string($_POST['username']);
    $pw = $conn->real_escape_string($_POST['pw']);
    
    $pw_hash = md5("pgo".$pw."pgo");

    $sql = "SELECT * FROM obr_users WHERE username = '$username' AND pw = '$pw_hash' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $conn->close();

        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id'];

        header("Location: index.php");
    }
    else {
        $error = "Invalid Credentials.";
    }
}

// HEADER
include('../layout/header.php');
?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-4">
			<div class="card" style="box-shadow: 5px 5px 5px #263238;">
				<div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <?php
                    if (isset($error)){
                    ?>
                    <span class="badge badge-danger p-2"><?php echo $error;?></span>
                    <?php
                    }
                    ?>
                    <hr>
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="pw">Password</label>
                            <input type="password" class="form-control" name="pw">
                        </div>
                        <input type="submit" class="btn btn-success btn-block btn-lg" value="Login" name="login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('../layout/footer.php');
?>
