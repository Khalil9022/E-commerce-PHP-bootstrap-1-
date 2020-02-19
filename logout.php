<?php
session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

if (!empty($_SESSION['admin'])) {
    session_destroy();
    header("location:login.php?login_user=logout");
} else if (!empty($_SESSION['id'])) {
    session_destroy();
    header("location:login.php?login_user=logout");
}
