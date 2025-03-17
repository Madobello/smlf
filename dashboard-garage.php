<?php 
    include 'phpincludes/startsession.php';

    if(isset($_SESSION['loginuserid'])) {
        $userid=$_SESSION['loginuserid'];
?>

<html lang="en">
    <?php 
        include 'phpincludes/dbconnection.php';
        include 'sectionincludes/navlink.php';
    ?>
    <body>
        <div id="content-wrapper">
            <?php 
                include 'adminsectionincludes/garage/garagenavbar.php';
                include 'adminsectionincludes/garage/garagemain.php'; 
                include 'adminsectionincludes/footersection.php';
            ?>
        </div>
        <?php include 'sectionincludes/footerjslink.php'; ?>
    </body>
</html>
<?php } else { header("Location: index.php"); } ?>