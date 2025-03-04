<nav class="navbar bgcolor">
<div class="container">
<div class="navbar-header ">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span> 
</button>
</div>

<div class="collapse navbar-collapse " id="myNavbar">
	<?php
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
while ($row = $result->fetch_assoc()) 
{
?>
<a  href="dashboard.php"><img class="img-rounded" src="systeminfouploads/<?php echo $row['logo']; ?>" alt="Current Logo" style="max-width: 100px;"></a>
<?php
}
}
else
{
?>
<a  href="dashboard.php">WCRA</a>
<?php
}
?>
<ul class="nav navbar-nav">
<li><a href="index.php#footer"><div id="google_translate_element"></div></a></li>
<li><a href="dashboard.php">HOME</a></li>
<li><a href="messagepage.php">MESSAGE</a></li>
<li><a href="garageservicepage.php">SERVICES</a></li> 
<?php
if(!isset($_SESSION['garagename']))
{
?>
<li><a href="systeminfopage.php">SYSTEM</a></li>
<li><a href="garagepostpage.php">GARAGE</a></li> 
<li><a href="registeredusers.php">ACCOUNT</a></li>
<?php
}
?>
<li><a href="logout.php">LOGOUT</a></li> </ul>
</div>
</div>
</nav>

