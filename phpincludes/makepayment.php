<?php
    session_start();

    include '../phpincludes/dbconnection.php';

    $payment_id = $_SESSION['paymentserviceid'];
    $msg_id = $_SESSION['msg_id'];
    $service_price = $_SESSION['service_price'];

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
                            window.location = '../smlf/userinfo.php';
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
?>