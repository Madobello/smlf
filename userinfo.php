<?php
include 'phpincludes/startsession.php';
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
include 'sectionincludes/mainnavbar-user.php';
?>
<header class="header header--bg">
<div class="container">
<?php
// include 'sectionincludes/herosection.php';
?>
</div>
</header>
<?php
// include 'sectionincludes/useringo_section.php';
?>
<?php
// include 'sectionincludes/aboutussection.php';
?>
<?php
// include 'sectionincludes/overviewsection.php';
?>

<?php
include 'sectionincludes/userappointsection.php';
?>

<?php
include 'adminsectionincludes/usermessageview.php';
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