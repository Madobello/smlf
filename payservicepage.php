<?php include 'phpincludes/startsession.php'; ?>

<html lang="en">
    <?php 
        include 'phpincludes/dbconnection.php';
        include 'sectionincludes/navlink.php';
    ?>
    <body>
        <div id="content-wrapper">
            <?php
                include 'sectionincludes/mainnavbar-user.php';
                include 'sectionincludes/viewmoregarages.php';
                include 'sectionincludes/footersection.php';
            ?>
        </div>
        <?php include 'sectionincludes/footerjslink.php';?>
    </body>
</html>