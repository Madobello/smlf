<?php 
    include 'phpincludes/updategarageinfo.php'; 
    include 'phpincludes/deletegarage.php'; 
?>

<section id="adminmain" class="adminmain">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title">Make Payment</h2>
            <?php include 'sectionincludes/systemtitle.php'; ?>

            <?php
                $garageid = $_GET['garageid'];
                $sqlgarage = "SELECT * FROM `garage` WHERE id = '$garageid'";
                $resultgarage = $conn->query($sqlgarage);
                while ($rowgarage = $resultgarage->fetch_assoc()) {
                    $garagename = $rowgarage["name"];
            ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title text-center"><?php echo ucfirst($rowgarage["name"]); ?></h3>
                    <hr>

                    <h3>Customer Information</h3>
                    <?php
                        if (isset($_SESSION['customerid'])) {
                            $customerid = $_SESSION['customerid'];
                            $firstname = $_SESSION['firstname'];
                            $lastname = $_SESSION['lastname'];
                            $email = $_SESSION['email'];
                            $phone = $_SESSION['phone'];
                        ?>
                    <div class="row">
                        <div class="col-sm-3">
                            <input type="text" value="<?php echo ucfirst($firstname); ?>" name="" id="" class="form-control" readonly>
                        </div>

                        <div class="col-sm-3">
                            <input type="text" value="<?php echo ucfirst($lastname); ?>" name="" id="" class="form-control" readonly>
                        </div>

                        <div class="col-sm-3">
                            <input type="text" value="<?php echo ucfirst($email); ?>" name="" id="" class="form-control" readonly>
                        </div>

                        <div class="col-sm-3">
                            <input type="text" value="<?php echo ucfirst($phone); ?>" name="" id="" class="form-control" readonly>
                        </div>
                    </div>
                    <?php
                        } else {
                            header("location:./phpincludes/logout.php");
                        }
                    ?>
                    <hr>

                    <h3>Garage Information</h3>
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center">
                            <!-- Image with consistent width and height using Bootstrap -->
                            <img src="garageinfouploads/<?php echo $rowgarage['profileimg']; ?>" alt="Current Profile" class="img-fluid" style="width: 100%; max-height: 200px; object-fit: cover;">
                        </div>

                        <div class="col-md-3">
                            <h4>About Us</h4>
                            <p><?php echo $rowgarage["aboutus"]; ?></p>
                        </div>

                        <div class="col-md-3">
                            <h4>Contact</h4>
                            <h5>Email: <?php echo $rowgarage["email"]; ?></h5>
                            <h5>Phone: <?php echo $rowgarage["phone"]; ?></h5>
                            <h5>Address: <?php echo $rowgarage["province"]; ?>, <?php echo $rowgarage["district"]; ?>, <?php echo $rowgarage["sector"]; ?>, <?php echo $rowgarage["village"]; ?></h5>                        
                        </div>
                        
                        <div class="col-md-3">
                            <h4 class="font-weight-bold">Garage services:</h4>
                            <ul class="list-unstyled">
                                <?php
                                $count = 1;
                                $sqlgarageservice = "SELECT * FROM `garageservice` WHERE garagename='$garagename'";
                                $resultgarageservice = $conn->query($sqlgarageservice);
                                while ($rowgarageservice = $resultgarageservice->fetch_assoc()) {
                                ?>
                                <li>
                                    <h5><?php $msg_id = $_GET['msg']; ?>
                                        <a href="./payservicepage.php?serviceid=<?php echo $rowgarageservice['id']; ?>&msg=<?php echo $msg_id; ?>&go=">
                                            <?php echo $count; ?>. <?php echo ucfirst($rowgarageservice["servicename"]); ?>
                                        </a>
                                        - Rwf <?php echo number_format($rowgarageservice["price"]); ?>

                                        <a href="./payservicepage.php?serviceid=<?php echo $rowgarageservice['id']; ?>&msg=<?php echo $msg_id; ?>&go=" class="btn btn-success">Continue</a>
                                    </h5>
                                </li>
                                <?php
                                $count++;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
            <?php
            }
            ?>
            <?php include './phpincludes/sendmessage.php'; ?>
        </div>
    </div>
</section>
