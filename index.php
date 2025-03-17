<?php include 'phpincludes/startsession.php'; ?>

<html lang="en">

    <?php
        include 'phpincludes/dbconnection.php';

        include 'sectionincludes/navlink.php';
    ?>

    <body>
        <div id="content-wrapper">

            <?php include 'sectionincludes/mainnavbar.php'; ?>

            <header class="header header--bg">
                <div class="container">
                    <?php include 'sectionincludes/herosection.php'; ?>
                </div>
            </header>
            <?php
                include 'sectionincludes/tutorial.php';

                include 'sectionincludes/aboutussection.php';

                include 'sectionincludes/overviewsection.php';

                include 'sectionincludes/portfoliosection.php';

                include 'sectionincludes/footersection.php';
            ?>

        </div>
        <?php include 'sectionincludes/footerjslink.php'; ?>
    </body>
</html>