<?php
session_start();

if (isset($_SESSION['user_id'])){
    if (isset($_SESSION['role'])){
        if ($_SESSION['role']=="engineer"){
            header("Location: ../engineer");
        }
    }
}
else {
    header("Location: ../index.php");
}