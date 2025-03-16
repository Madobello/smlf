<?php
$sqlservice = "SELECT COUNT(*) AS `customer_count` FROM `customer`";
$resultservice = mysqli_query($conn, $sqlservice);
if ($resultservice) {
    $rowservice = mysqli_fetch_assoc($resultservice);
    $customer_count = $rowservice['customer_count'];
} else {
    $customer_count = 0;
}
?>