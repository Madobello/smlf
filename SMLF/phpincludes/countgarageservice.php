<?php
$sqlservice = "SELECT COUNT(*) AS garageservice_count FROM garageservice";
$resultservice = mysqli_query($conn, $sqlservice);
if ($resultservice) 
{
$rowservice = mysqli_fetch_assoc($resultservice);
$garageservice_count = $rowservice['garageservice_count'];
} 
else 
{
$garageservice_count = 0;
}
?>