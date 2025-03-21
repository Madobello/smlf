<section id="adminmain" class="adminmain">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title">User Message</h2>
                <?php include 'adminsectionincludes/systemtitle.php'; ?>

                <!-- Services List under the Garage Dashboard > Service -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-left">Garage Name</th>
                                <th class="text-left">Name</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Phone</th>
                                <th class="text-left">Service Description</th>
                                <th class="text-left">Date Registered</th>
                                <th class="text-left">Booking Date</th>
                                <th class="text-left" colspan=2>Status</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (!isset($_SESSION['garagename'])) {
                                    $sqlmessage = "SELECT * FROM message ORDER BY id ASC";
                                } else {
                                    $sqlgarage = "SELECT * FROM garage WHERE id='$userid'";
                                    $gname = ''; 

                                    $resultgarage = $conn->query($sqlgarage);
                                    if ($resultgarage->num_rows > 0) {
                                        while ($rowgn = $resultgarage->fetch_assoc()) {
                                            $gname = $rowgn['name']; 
                                        }
                                    }
                                    $sqlmessage = "SELECT * FROM message WHERE garagename='$gname' ORDER BY id ASC";
                                }
                                $resultmessage = $conn->query($sqlmessage);
                                if ($resultmessage->num_rows > 0) {
                                    while ($rowservice = $resultmessage->fetch_assoc()) {
                            ?>
                        <tr>
                            <td class="text-left capitalize"><b><?php echo $rowservice["garagename"]; ?></b></td>
                            <td class="text-left capitalize"><b><?php echo $rowservice["firstname"] . " " . $rowservice["lastname"]; ?></b></td>
                            <td class="text-left"><?php echo $rowservice["email"]; ?></td>
                            <td class="text-left"><?php echo $rowservice["phone"]; ?></td>
                            <td class="text-left"><?php echo $rowservice["servicedescription"]; ?></td>
                            <td class="text-left"><?php echo $rowservice["dat"]; ?></td>
                            <td class="text-left"><?php echo $rowservice["booking_date"]; ?></td>

                            <?php if ($rowservice["appointment"] == ""): ?>
                            
                            <td class="text-left" colspan=2>
                                <div class="btn btn-group">
                                    <a href="./messagemodify.php?serviceid=<?php echo $rowservice['id']; ?>" class="btn btn-success">Accept</a>
                                    <a href="./messagemodify.php?servicerejid=<?php echo $rowservice['id']; ?>" class="btn btn-danger">Reject</a>
                                </div>
                            </td>

                            <?php else: ?>
                            <?php if ($rowservice["appointment"] == "Approved") { ?>

                            <td class="text-left text-success bold" colspan=2><?php echo $rowservice["appointment"]; ?></td>
                            
                            <?php } else { ?>

                            <td class="text-left text-danger bold" colspan=2><?php echo $rowservice["appointment"]; ?></td>
                            
                            <?php } endif ?> 

                            <?php if ($rowservice["appointment"] == ""): ?>
                            
                            <td class="text-left"><a href="./messagemodify.php?deleteid=<?php echo $rowservice['id']; ?>" class="btn btn-danger">Delete</a></td>
                            
                            <?php else: ?>
                            
                            <td class="text-left muted">N/A<?php # echo $rowservice["appointment"]; ?></td>
                            
                            <?php endif ?>
                        </tr>
                        <?php } } else { ?>
                        
                        <tr>
                            <td colspan="6" class="text-center">
                                <script>
                                //swal({
                                //title: "No result found.",
                                //text: "Press Ok to close.",
                                //icon: 'info',
                                //closeOnClickOutside: false,
                                //closeOnEsc: false,
                                //allowOutsideClick: false,
                                //});
                                </script>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>