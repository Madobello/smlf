<img class="page-section__title-style" src="assets/images/title-style.png" alt="">
<?php
$sql = "SELECT * FROM systeminfo ORDER BY id ASC ";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) 
{
?>
<p class="page-section__paragraph capitalize"><?php echo $row["name"];?></p>
<?php
}
?>