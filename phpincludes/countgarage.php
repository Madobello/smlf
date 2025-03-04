<?php
$sql = "SELECT COUNT(*) AS garage_count FROM garage";
$result = mysqli_query($conn, $sql);
if ($result) 
{
$row = mysqli_fetch_assoc($result);
$garage_count = $row['garage_count'];
} 
else 
{
$garage_count = 0;
}
?>
