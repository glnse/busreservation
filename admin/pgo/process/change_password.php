<?php

include('../../../config/connection.php');

$currentPw = $conn->real_escape_string($_POST['currentPw']);
$newPw = $conn->real_escape_string($_POST['newPw']);
$retypeNewPw = $conn->real_escape_string($_POST['retypeNewPw']);

$pw_hash = md5("pgo".$currentPw."pgo");

$sql = "SELECT * FROM obr_users WHERE username='pgo' AND pw='$pw_hash' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $id = $row['id'];
    if ($newPw == $retypeNewPw){
        $pw_hash = md5("pgo".$newPw."pgo");
        $sql = "UPDATE obr_users SET pw='$pw_hash' WHERE id='$id'";
        if ($conn->query($sql) or die ($conn->error)){
            echo "<script>alert('Password Successfully Updated'); window.location.href='../settings.php';</script>";
        }
        else {
            echo "<script>alert('Server Error. Please try again.'); window.location.href='../settings.php';</script>";
        }
    }
    else {
        echo "<script>alert('New Password Mismatch. Please try again.'); window.location.href='../settings.php';</script>";
    }
}
else {
    echo "<script>alert('Invalid Password. Please try again.'); window.location.href='../settings.php';</script>";
}
