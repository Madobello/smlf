<?php include 'phpincludes/updategarageinfo.php'; ?>
<?php include 'phpincludes/deletegarage.php'; ?>

<section id="adminmain" class="adminmain">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title">More info</h2>
            <?php include 'sectionincludes/systemtitle.php'; ?>

            <?php
            $garageid = $_GET['garageid'];
            $sqlgarage = "SELECT * FROM garage WHERE id='$garageid'";
            $resultgarage = $conn->query($sqlgarage);
            while ($rowgarage = $resultgarage->fetch_assoc()) {
                $garagename = $rowgarage["name"];
            ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title text-center"><?php echo $rowgarage["name"]; ?></h4>
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center">
                            <!-- Image with consistent width and height using Bootstrap -->
                            <img src="garageinfouploads/<?php echo $rowgarage['profileimg']; ?>" alt="Current Profile" class="img-fluid" style="max-width: 100%; max-height: 200px; object-fit: cover;">
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $rowgarage["aboutus"]; ?></p>
                            <h4 class="font-weight-bold">Garage services:</h4>
                            <ul class="list-unstyled">
                                <?php
                                $count = 1;
                                $sqlgarageservice = "SELECT * FROM garageservice WHERE garagename='$garagename'";
                                $resultgarageservice = $conn->query($sqlgarageservice);
                                while ($rowgarageservice = $resultgarageservice->fetch_assoc()) {
                                ?>
                                <li>
                                    <h5>
                                        <a href="./moreaboutservicepage.php?serviceid=<?php echo $rowgarageservice['id']; ?>">
                                            <?php echo $count; ?>. <?php echo $rowgarageservice["servicename"]; ?>
                                        </a>
                                        - Rwf <?php echo $rowgarageservice["price"]; ?>
                                    </h5>
                                </li>
                                <?php
                                $count++;
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Email: <?php echo $rowgarage["email"]; ?></h5>
                            <h5>Phone: <?php echo $rowgarage["phone"]; ?></h5>
                            <h5>Address: <?php echo $rowgarage["province"]; ?>, <?php echo $rowgarage["district"]; ?>, <?php echo $rowgarage["sector"]; ?>, <?php echo $rowgarage["village"]; ?></h5>
                            <hr>
                            <div class="map-container">
                                <iframe frameborder="0" style="border:0; width: 100%; height: 300px;" src="<?php echo $rowgarage["maplink"]; ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['customerid'])) {
                                $customerid = $_SESSION['customerid'];
                                $firstname = $_SESSION['firstname'];
                                $lastname = $_SESSION['lastname'];
                                $email = $_SESSION['email'];
                                $phone = $_SESSION['phone'];
                            ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label for="garagename">Garage Name</label>
                                    <input type="text" class="form-control" id="garagename" name="garagename" value="<?php echo $rowgarage["name"]; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="servicedesc">Service description</label>
                                    <textarea id="servicedesc" name="servicedesc" class="form-control" required rows="5"></textarea>
                                </div>
                                <button type="submit" name="send" class="btn btn-primary">Send</button>
                            </form>
                            <?php
                            } else {
                                header("location:./phpincludes/logout.php");
                            }
                            ?>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <?php
            }
            ?>
            <?php include './phpincludes/sendmessage.php'; ?>
        </div>
    </div>
</section>
