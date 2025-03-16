<?php
$sqlservice = "SELECT COUNT(*) AS `car_count` FROM `car`";
$resultservice = mysqli_query($conn, $sqlservice);
if ($resultservice) {
    $rowservice = mysqli_fetch_assoc($resultservice);
    $car_count = $rowservice['car_count'];
} else {
    $car_count = 0;
}
?>