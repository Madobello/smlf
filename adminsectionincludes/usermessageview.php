<!-- <section id="portfolio" class="adminmain py-5">
    <div class="container">
        <div class="page-section"> -->
            <h2 class="page-section__title text-center">Booking List</h2>
            <?php include 'sectionincludes/systemtitle.php'; ?>

            <!-- <form method="POST" class="search-form mb-4">
                <div class="row">
                    <div class="col-md-9 mb-3 mb-md-0">
                        <input type="search" name="searchvalue" class="form-control" placeholder="Write search value here..">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="search" value="Search" class="btn btn-secondary btn-block">
                    </div>
                </div>
            </form> -->

            <hr>

            <!-- Search Handler -->
            <div class="row">
                <?php
                    if (isset($_POST['search'])) {
                        $searchvalue = $_POST['searchvalue'];
                        $sqlgarage = "SELECT * FROM garage LEFT JOIN car ON garage.name = car.garagename WHERE province LIKE '%$searchvalue%' OR district LIKE '%$searchvalue%' OR sector LIKE '%$searchvalue%' OR village LIKE '%$searchvalue%' OR name LIKE '%$searchvalue%' OR phone LIKE '%$searchvalue%' OR email LIKE '%$searchvalue%' OR carname LIKE '%$searchvalue%' OR cartype LIKE '%$searchvalue%' OR carmodel LIKE '%$searchvalue%' OR aboutus LIKE '%$searchvalue%' ORDER BY id ASC";
                    // }
                    $resultgarage = $conn->query($sqlgarage);
                    if ($resultgarage->num_rows > 0) {
                    while ($rowgarage = $resultgarage->fetch_assoc()) {
                ?>

                <?php } } else { ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                    title: 'No Result Found',
                    text: 'Press OK to close.',
                    icon: 'info',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                    });
                </script>
                <?php } } else {
                    $sqlgarage = "SELECT * FROM garage LEFT JOIN car ON garage.name = car.garagename ORDER BY id ASC  LIMIT 6";
                    // }
                    $resultgarage = $conn->query($sqlgarage);
                    if ($resultgarage->num_rows > 0) {
                        while ($rowgarage = $resultgarage->fetch_assoc()) {
                ?>

                <?php } } else { ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                    title: 'No Result Found',
                    text: 'Press OK to close.',
                    icon: 'info',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    closeOnClickOutside: false,
                    closeOnEsc: false
                    });
                </script>
                <?php } } ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead> 
                            <tr>
                            <th class="text-left">Appoint ID</th>
                            <th class="text-left">Garage Name</th>
                            <th class="text-left">Garage Phone</th>
                            <th class="text-left">Service Description</th>
                            <th class="text-left">Submitted On</th>
                            <th class="text-left">Booking Date</th>
                            <!-- <th class="text-left">Date Registered</th> -->
                            <th class="text-left">Status</th>
                            <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!isset($_SESSION['lastname'])) { ?>
                            <tr><td colspan="8" style="text-align: center;"><p id="noBookingsMessage">No bookings yet.</p></td></tr>
                        <?php } else {
                                $lastname = $_SESSION['lastname'];
                                $sqlmessage = "SELECT * FROM `message` WHERE `lastname`='$lastname' ORDER BY id ASC";

                                $resultmessage = $conn->query($sqlmessage);
                                if ($resultmessage->num_rows > 0) {
                                    while ($rowservice = $resultmessage->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="text-left capitalize"><b><?php echo "P0".$rowservice["id"]; ?></b></td>
                                <td class="text-left"><b><?php echo ucwords($rowservice["garagename"]); ?></b></td>
                                <?php 
                                    $garagename = $rowservice['garagename'];
                                    $select_garage_phone = "SELECT `phone` FROM `garage` WHERE `name` = '$garagename'";
                                    $res_phone = $conn->query($select_garage_phone);
                                    if ($res_phone->num_rows > 0) {
                                        while ($rowgarage = $res_phone->fetch_assoc()) {
                                            ?>
                                <td class="text-left">
                                    <?php echo $rowgarage["phone"]; ?>
                                </td>
                                <?php } } ?>
                                <td class="text-left"><?php echo $rowservice["servicedescription"]; ?></td>
                                <td class="text-left"><?php echo $rowservice["dat"]; ?></td>
                                <td class="text-left"><?php echo $rowservice["booking_date"]; ?></td>
                                <!-- <td class="text-left"><?php # echo $rowservice["booking_date"]; ?></td> -->

                                <?php 
                                    $appoint = $rowservice["appointment"]; 
                                    if (($appoint == "Paid") || ($appoint == "Approved")) { ?>
                                    <td class="text-left text-success bold"><?php echo $rowservice["appointment"]; ?></td>

                                <?php } else if ($rowservice["appointment"] == "Rejected") { ?>
                                    <td class="text-left text-danger bold"><?php echo $rowservice["appointment"]; ?></td>

                                <?php } else { ?>
                                    <td class="text-left"><a href="#" class="text-danger">Queued</a></td>
                                
                                <?php } ?> 

                                <?php if ($appoint == "Paid" || $appoint == "Rejected") { ?>
                                    <td class="text-left muted">N/A<?php # echo $rowservice["appointment"]; ?></td>

                                <?php } else if ($appoint == "Approved") { ?>
                                    <?php 
                                        $select_garage_id = "SELECT `id` FROM `garage` WHERE `name` = '$garagename'";
                                        $sql_exec_id = $conn->query($select_garage_id);
                                        if ($sql_exec_id->num_rows > 0) {
                                            while ($rowgarageid = $sql_exec_id->fetch_assoc()) {    
                                    ?>
                                    <td class="text-left"><a href="./paygarage.php?garageid=<?php echo $rowgarageid['id']; ?>&msg=<?php echo $rowservice['id']; ?>" class="btn btn-success">Pay</a></td>

                                <?php } } } else { ?>
                                    <td class="text-left"><a href="./messagemodify.php?bookdeleteid=<?php echo $rowservice['id']; ?>" class="btn btn-danger">Delete</a></td>
                                <?php } ?> 
                            </tr>
                            <?php } } } ?>
                        </tbody>
                    </table>
                </div>

        <!-- </div>
    </div>
</section> -->