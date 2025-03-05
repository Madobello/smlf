<?php
include '../phpincludes/dbconnection.php';

if (isset($_GET['carid'])) {
    $carid = $_GET['carid'];
    $garageid = $_GET['garageid'];

    $delete_sql =$conn -> query("DELETE FROM `car` WHERE `carid` = '$carid' AND `garagename` = '$garageid'");

    if($delete_sql) {
        header("location: ../carmoreinfopage.php?garageid=$garageid");
    }
}
?>