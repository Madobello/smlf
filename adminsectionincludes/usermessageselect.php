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
                <?php }} ?>
                <td class="text-left"><?php echo $rowservice["servicedescription"]; ?></td>
                <td class="text-left"><?php echo $rowservice["dat"]; ?></td>
                <td class="text-left"><?php echo $rowservice["booking_date"]; ?></td>
                <!-- <td class="text-left"><?php # echo $rowservice["booking_date"]; ?></td> -->

                <?php if ($rowservice["appointment"] == ""): ?>
                <!-- <td class="text-left"><a href="./messagemodify.php?serviceid=<?php # echo $rowservice['id']; ?>" class="btn btn-danger">Queued</a></td> -->
                <td class="text-left"><a href="#" class="text-danger">Queued</a></td>
                <?php else: ?>
                <td class="text-left text-success bold"><?php echo $rowservice["appointment"]; ?></td>
                <?php endif ?> 

                <?php if ($rowservice["appointment"] == ""): ?>
                <td class="text-left"><a href="./messagemodify.php?bookdeleteid=<?php echo $rowservice['id']; ?>" class="btn btn-danger">Delete</a></td>
                <?php else: ?>
                <td class="text-left muted">N/A<?php # echo $rowservice["appointment"]; ?></td>
                <?php endif ?> 
            </tr>
            <?php } } } ?>
        </tbody>
    </table>
</div>