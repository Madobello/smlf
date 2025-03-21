<?php 
    include 'phpincludes/updategarageinfo.php'; 
    include 'phpincludes/deletegarage.php'; 
?>

<section id="adminmain" class="adminmain">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title">Make Payment</h2>
            <?php include 'sectionincludes/systemtitle.php'; ?>

            <div class="row">

                <!-- Customer Information -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center"><b>From</b></h3>
                            
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
                                <input type="text" value="<?php echo ucfirst($firstname); ?>" name="" id="" class="form-control" readonly><br>
                                <input type="text" value="<?php echo ucfirst($lastname); ?>" name="" id="" class="form-control" readonly><br>
                                <input type="text" value="<?php echo ucfirst($email); ?>" name="" id="" class="form-control" readonly><br>
                                <input type="text" value="<?php echo ucfirst($phone); ?>" name="" id="" class="form-control" readonly><br>
                            <?php
                                } else {
                                    header("location:./phpincludes/logout.php");
                                }
                            ?>
                            <hr>
                            
                        </div>
                    </div>
                </div>

                <!-- Garage + Service Information -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center"><b>To</b></h3>
                            
                            <hr>
                            <h3>Garage Information</h3>
                            <?php
                                $serviceid = $_GET['serviceid'];
                                $select_service = "SELECT * FROM `garageservice` WHERE `id` = '$serviceid'";

                                $select_service_exec = $conn->query($select_service);

                                if ($rowservice = $select_service_exec->fetch_assoc()) {
                                    $garagename = $rowservice["garagename"];
                                    $select_garage = "SELECT * FROM `garage` WHERE `name` = '$garagename'";
                                    $select_garage_exec = $conn->query($select_garage);

                                    if ($rowgarage = $select_garage_exec->fetch_assoc()) {
                                ?>
                                
                                <input type="text" value="<?php echo ucfirst($rowgarage["name"]); ?>" name="" id="" class="form-control" readonly><br>
                                <input type="text" value="<?php echo ucfirst($rowgarage["province"]).', '.ucfirst($rowgarage["district"]).', '.ucfirst($rowgarage["sector"]); ?>" name="" id="" class="form-control" readonly><br>
                                <input type="text" value="<?php echo $rowgarage["email"]; ?>" name="" id="" class="form-control" readonly><br>
                                <input type="text" value="<?php echo ucfirst($rowgarage["phone"]); ?>" name="" id="" class="form-control" readonly><br>
                                <?php } } ?>
                            <hr>

                            <div class="col-md-12">
                                <h2><b>Price: RWF <?php echo number_format($rowservice["price"]); ?></b></h2>
                                <p><b>Service: </b><?php echo ucfirst($rowservice["servicename"]); ?> | <b>Description: </b><?php echo $rowservice["description"]; ?></p>
                            </div>

                            <?php if ($_GET['go'] == '') { ?>

                            <form method="POST">
                                <div class="row">
                                    <div class="col-sm-6">

                                        <button type="submit" name="confirm" class="btn btn-secondary">Confirm</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>

                            <?php } else { ?>

                            <form method="POST" class="text-center">
                                <input type="hidden" name="service_id" value="<?php echo $_GET['serviceid']; ?>" required>
                                <input type="hidden" name="msg_id" value="<?php echo $_GET['msg']; ?>" required>
                                <input type="hidden" name="service_price" value="<?php echo $rowservice["price"]; ?>" required>
                                <button type="submit" name="payment" class="btn btn-primary">Make Payment</button>
                            </form>

                            <?php } ?>
                            
                        </div>
                    </div>
                </div>

            </div>

            <?php # include './phpincludes/makepayment.php'; ?>
        </div>
    </div>
</section>

<?php 
    if (isset($_POST['confirm'])) {
        $service_id = $_GET['serviceid'];
        $msg_id = $_GET['msg'];
        $go = 1;

?>

<script>
    swal({
    title: "Do you want to make payment?",
    text: "Press OK to continue or Cancel.",
    icon: 'info',
    buttons: {
    cancel: "Cancel",
    confirm: {
    text: "OK",
    closeModal: false,
        },},}).then(function (isConfirm) {
        if (isConfirm) {
            window.location = 'payservicepage.php?serviceid=<?php echo $service_id; ?>&msg=<?php echo $msg_id; ?>&go=<?php echo $go?>';
        }
    });
</script>

<?php } ?>

<?php
    if (isset($_POST['payment'])) {
        $payment_id = $_POST['service_id'];
        // $service_id = $_POST['service_id'];
        $msg_id = $_POST['msg_id'];
        $service_price = $_POST['service_price'];

        // $_SESSION['paymentserviceid'] = $service_id;
        // $_SESSION['service_price'] = $service_price;
        // $_SESSION['msg_id'] = $msg_id;

        // if ($_SESSION['paymentserviceid'] != '') {
    ?>

    <?php
        // $payment_id = $_SESSION['paymentserviceid'];
        // $msg_id = $_SESSION['msg_id'];
        // $service_price = $_SESSION['service_price'];

        $select_service = "SELECT * FROM `garageservice` WHERE `id` = '$payment_id'";
        $select_service_exec = $conn->query($select_service);
        $rowservice = $select_service_exec->fetch_assoc();

        $service_name = $rowservice['servicename'];

        // Message
        $select_message = "SELECT * FROM `message` WHERE `id` = '$msg_id'";
        $select_message_exec = $conn->query($select_message);
        $rowmessage = $select_message_exec->fetch_assoc();
        
        // Garage Select
        $garagename = $rowmessage['garagename'];
        $select_garage = $conn->query("SELECT * FROM `garage` WHERE `name`='$garagename'");
        $rowgarage = $select_garage->fetch_assoc();
        
        $make_payment = $conn->query("UPDATE `message` SET `appointment` = 'Paid' WHERE `id` = '$msg_id'");

        if ($make_payment) {

            $garage_email = $rowgarage['email'];
            $garage_phone = $rowgarage['phone'];

            // Customer Info
            $firstname = $rowmessage['firstname'];
            $lastname = $rowmessage['lastname'];

            $dat = date('Y-m-d H:i:s');

            $to = $rowmessage['email'];
            $subject = 'Service Payment Successful';
            $from = 'intambwesoftware@gmail.com';
            $from_name = 'SMCS Support Team';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: " . $from_name . " <" . $from . ">" . "\r\n";
            $body = "<h4>Dear " . ucfirst($firstname) . " " . ucfirst($lastname) . ",</h4>
                    <p>Thank you for paying for a service request using our system. Below are the Payment details:</p>
                    <p><strong>Garage Name:</strong> $garagename</p>
                    <p><strong>Email:</strong> $garage_email</p>
                    <p><strong>Phone:</strong> $garage_phone</p>
                    <p><strong>Service Paid:</strong> $service_name</p>
                    <p><strong>Amount: RWF</strong> $service_price</p>
                    <p><strong>Submitted on:</strong> $dat</p>
                    <p>Thank you for using this system.</p>
                    <p>Best regards,<br>SMCS Support Team</p>";
            if (mail($to, $subject, $body, $headers)) {
                ?>
                <script>
                    swal({
                        title: "Message sent.",
                        text: "A Payment confirmation email has been sent to your email address. Press Ok to continue.",
                        icon: 'success',
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        allowOutsideClick: false
                    })
                        .then(function (isConfirm) {
                            if (isConfirm) {
                                window.location = 'userinfo.php';
                            }
                        });
                </script>
                <?php
            } else {
                ?>
                <script>
                    swal({
                        title: "Message sent.",
                        text: "However, we couldn't send the confirmation email. Please try again later.",
                        icon: 'warning',
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        allowOutsideClick: false
                    });
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                swal({
                    title: "Message not sent.",
                    text: "Something went wrong, please try again later.",
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    allowOutsideClick: false
                });
            </script>
            <?php
        }
    }
?>








<?php #} } ?>