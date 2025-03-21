<section id="portfolio" class="adminmain py-3">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title text-center">Appointment</h2>
            <?php # include 'sectionincludes/systemtitle.php'; ?>
            
            <hr>
            
            <!-- Booking Appointment Form -->

            <div class="row">
                <div class="col-md-3">
                    <p class="text-center" style="font-size: 22px;"><b>Book Appointment</b></p>
                    <form method="POST" class="search-form mb-4">
                        <!-- <label for="name">Car Name:</label> -->
                        <input type="text" name="car-name" placeholder="Car Name..." class="form-control" id="name" name="name" required>
                        <br>

                        <!-- <label for="date">Date:</label> -->
                        <input type="date" name="date" class="form-control" id="date" required>
                        <br>
                        
                        <!-- <label for="time">Time:</label> -->
                        <input type="time" name="time" class="form-control" id="time" required>
                        <br>

                        <?php 
                            if (isset($_GET['garageid'])) {
                                $garageid = $_GET['garageid'];
                                $sqlgarage = "SELECT * FROM `garage` WHERE `id` = '$garageid'";
                                $res_garage = $conn->query($sqlgarage);
                                $row = mysqli_fetch_assoc($res_garage);
                        ?>
                        <input type="text" name="garage-name" value="<?php echo $row['name']; ?>" id="" class="form-control" readonly>

                        <?php } else { ?>
                        
                        <input type="text" placeholder="Filter and Select Garage" value="" id="" class="form-control" required>
                        
                        <?php } ?><br>

                        <textarea id="servicedesc" placeholder="Description" name="servicedesc" class="form-control" required rows="5"></textarea><br>

                        <!-- <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly><br> -->

                        <input type="submit" name="book" value="Book Appointment" class="btn btn-primary btn-block">
                        <!-- <a href="moreaboutgaragepage.php"><button type="submit">Book Appointment</button></a> -->
                    </form>
                </div>

                <?php include './phpincludes/sendmessage.php'; ?>

                <div class="col-md-9">
                    <div class="booking-list card" id="bookingList">
                        <?php
                            // include 'adminsectionincludes/usermessageselect.php';
                            include 'sectionincludes/userportfoliosection.php';  
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Book List on User Dashboard -->

        <div>
            <?php include 'adminsectionincludes/usermessageview.php'; ?>
        </div>
    </div>
</section>