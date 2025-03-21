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
                include 'adminsectionincludes/adminnavbar.php';
                include 'adminsectionincludes/messageselect.php';
                include 'sectionincludes/footersection.php';
            ?>
        </div>
        <?php include 'sectionincludes/footerjslink.php'; ?>
    </body>
</html>

<?php } else { header("Location: index.php"); } ?>