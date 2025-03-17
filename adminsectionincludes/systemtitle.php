<img class="page-section__title-style" src="assets/images/title-style.png" alt="">
<?php
	$sql = "SELECT * FROM `systeminfo` ORDER BY id ASC ";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
?>

<p class="page-section__paragraph capitalize"><?php echo $row["name"];?>


<?php
if(!isset($_SESSION['garagename']))
{
$selectuser=$conn->query("SELECT * FROM admin WHERE id='$userid'");
while ($rowuser=mysqli_fetch_array($selectuser)) 
{
?>

 <b class="capitalize">welcome, <?php echo $rowuser['lastname'];  ?> !</b>
<?php
}
}
else
{
	$garagename=$_SESSION['garagename'];
$selectuser=$conn->query("SELECT * FROM garage WHERE name='$garagename'");
while ($rowuser=mysqli_fetch_array($selectuser)) 
{
?>

 <b class="capitalize">welcome, <?php echo $rowuser['name'];  ?> !</b>
<?php
}
}
?>


</p>
<?php
}
?>