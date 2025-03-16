<section id="adminmain" class="adminmain">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title">Registered Service</h2>
            <?php include 'adminsectionincludes/systemtitle.php'; ?>

            <?php
                $count = 1;

                if (!isset($_SESSION['garagename'])) {
                    $sqlservice = "SELECT * FROM `garageservice` ORDER BY id ASC";
                } else {
                    $sqlgarage = "SELECT * FROM `garage` WHERE id='$userid'";
                    $gname = ''; 

                    $resultgarage = $conn->query($sqlgarage);
                    if ($resultgarage->num_rows > 0) {
                        while ($rowgn = $resultgarage->fetch_assoc()) {
                            $gname = $rowgn['name']; 
                        }
                    }

                    $sqlservice = "SELECT * FROM `garageservice` WHERE `garagename`='$gname' ORDER BY `id` ASC";
                }

                $resultservice = $conn->query($sqlservice);

                if ($resultservice->num_rows > 0) {
            ?>
            <?php while ($rowservice = $resultservice->fetch_assoc()) { ?>

            <div class="col-md-6">
                <div class="card">
                                
                    <div class="thumbnail text-center">
                        <img class="img" src="garageinfouploads/<?php echo $rowservice['image']; ?>"  style="height: 220px;">
                        <a href="#"><h4 class="adminmain__single__title capitalize"><?php echo $rowservice["garagename"];?></h4></a>
                                        
                        <div class="row">
                            <!-- <p><a href="carmoreinfopage.php?garageid=<?php echo $rowservice['servicename']; ?>" class="btn btn-warning">Associate Car Services</a></p> -->
                            <p class="text-muted"><?php echo $rowservice["description"]; ?></p><br>
                                        
                            <p class="adminmain__single__paragraph"><a class="btn btn-info btn-sm" href="garageservicemoreinfopage.php?serviceid=<?php echo $rowservice['id']; ?>" class="btn btn-primary">READ MORE...</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php $count++; } } else { ?>
                <label> result found..</label>
            <?php } ?>
        </div>
    </div>
</section>
