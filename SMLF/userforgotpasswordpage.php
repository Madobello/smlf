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
include 'sectionincludes/mainnavbar.php';
?>
<header class="header header--bg">
<div class="container">
<?php
include 'phpincludes/userforgotpassword.php';
?>
</header>
<?php
include 'sectionincludes/userforgotpasswordform.php';
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