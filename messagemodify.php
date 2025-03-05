<?php
include 'phpincludes/dbconnection.php';

if ($_GET['serviceid']) {
    $service_id = $_GET['serviceid'];

    $update_query = $conn -> query("UPDATE `message` SET `appointment` = 'Approved' WHERE `id` = '$service_id'");

    if ($update_query) {
        echo "<script>alert('Service Approved Successully!')</script>";
        header("Location: messagepage.php");
    }
}

if ($_GET['deleteid']) {
    $service_id = $_GET['deleteid'];

    $delete_query = $conn -> query("DELETE FROM `message` WHERE `id` = '$service_id'");

    if ($delete_query) {
        echo "<script>alert('Service Approved Successully!')</script>";
        header("Location: messagepage.php");
    }
}
?>