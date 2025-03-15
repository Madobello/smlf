<section id="portfolio" class="adminmain py-5">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title text-center">Appointment</h2>
                <?php include 'sectionincludes/systemtitle.php'; ?>

            <hr>

            <div class="row">
                <div class="col-md-3">
                    <form method="POST" class="search-form mb-4">
                        <!-- <label for="name">Car Name:</label> -->
                        <input type="text" placeholder="Car Name..." class="form-control" id="name" name="name" required>
                        <br>

                        <!-- <label for="date">Date:</label> -->
                        <input type="date" class="form-control" id="date" name="date" required>
                        <br>
                        
                        <!-- <label for="time">Time:</label> -->
                        <input type="time" class="form-control" id="time" name="time" required>
                        <br>

                        <input type="submit" value="Book Appointment" class="btn btn-secondary btn-block">
                        <!-- <a href="moreaboutgaragepage.php"><button type="submit">Book Appointment</button></a> -->
                    </form>
                </div>
                <div class="col-md-9">
                    <h2 style="text-align: center">Booking List</h2>
                    <div class="booking-list card bg-success" id="bookingList">
                        <?php
                            include 'adminsectionincludes/usermessageselect.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>