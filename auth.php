<?php
session_start();

// Redirect to login page if session is not valid
if (!isset($_SESSION['valid'])) {
    header('Location: login.php');
    exit();
}