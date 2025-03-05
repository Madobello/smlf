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
<a  href="index.php"><img class="img-rounded" src="systeminfouploads/<?php echo $row['logo']; ?>" alt="Current Logo" style="max-width: 100px;"></a>
<?php
}
}
else
{
?>
<a  href="index.php">SMLF</a>
<?php
}
?>
<ul class="nav navbar-nav">
<li><a href="#"><div id="google_translate_element"></div></a></li>
<li><a href="index.php">HOME</a></li>
<li><a href="index.php#about">ABOUT</a></li>
<li><a href="tutorialpage.php">TUTORIAL</a></li> 

<li cclass="dropdown">
<?php
if(isset($_SESSION['garageid']))
{
$garageid=$_SESSION['garageid'];
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
?>
<a href="#"  class="nav-link dropdown-toggle capitalize"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<?php echo nl2br($name); ?><span class="caret"></span>
</a>
<?php
}
else
{
?>
<a href="#"  class="nav-link dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
GARAGE<span class="caret"></span>
</a>
<?php
}
?>
<ul class="dropdown-menu navbar-nav" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="garagepage.php">GARAGE</a>
<?php
if(!isset($_SESSION['garageid']))
{
?>
<a class="dropdown-item"  href="#" data-toggle="modal" data-target="#garageloginmodal">Garage Login</a>
<a class="dropdown-item" href="#" data-toggle="modal" data-target="#garagesignupmodal">Garage Signup</a>
<?php
}
?>
</ul>
</li>







<li cclass="dropdown">
<?php
if(isset($_SESSION['customerid']))
{
$customerid=$_SESSION['customerid'];
$firstname=$_SESSION['firstname'];
$lastname=$_SESSION['lastname'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
?>
<a href="#"  class="nav-link dropdown-toggle capitalize"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<?php echo nl2br($lastname); ?><span class="caret"></span>
</a>
<?php
}
else
{
?>
<a href="#"  class="nav-link dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
ACCOUNT<span class="caret"></span>
</a>
<?php
}
?>
<ul class="dropdown-menu navbar-nav" aria-labelledby="navbarDropdown">
<?php
if(isset($_SESSION['customerid']))
{
?>
<a class="dropdown-item" href="customerprofile.php">Profile</a>
<a class="dropdown-item" href="logout.php">Logout</a>
<?php
}
else
{
?>
<a class="dropdown-item"  href="#" data-toggle="modal" data-target="#loginmodal">User Login</a>
<a class="dropdown-item" href="#" data-toggle="modal" data-target="#signupmodal">User Signup</a>
<?php
}
?>
</ul>
</li>
</ul>
</div>
</div>
</nav>



<?php
include 'sectionincludes/userloginmodal.php';
?>
<?php
include 'sectionincludes/usersignupmodal.php';
?>
<?php
include 'sectionincludes/garageloginmodal.php';
?>
<?php
include 'sectionincludes/garagesignupmodal.php';
?>
<?php
include 'sectionincludes/adminloginmodal.php';
?>

