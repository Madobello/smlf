<?php
include 'phpincludes/startsession.php';
?>
<?php
if(isset($_SESSION['paymentserviceid']))
{
$serviceid=$_SESSION['paymentserviceid'];
$price=$_SESSION['price'];
?>
<html lang="en">
<?php
include 'phpincludes/dbconnection.php';
?>
<?php
include 'sectionincludes/navlink.php';
?>
<body>
<div id="content-wrapper">
<?php
include 'sectionincludes/mainnavbar.php';
?>
<?php
include 'sectionincludes/payment1form.php';
?>
<?php
include 'sectionincludes/footersection.php';
?>
</div>
<?php
include 'sectionincludes/footerjslink.php';
?>
</body>
</html>
<?php
}
else
{
header("Location: index.php");
}
?>