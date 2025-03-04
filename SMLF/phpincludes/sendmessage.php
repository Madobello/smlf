<?php
if (isset($_POST['send'])) 
{
$garagename = mysqli_real_escape_string($conn, $_POST['garagename']);
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$servicedesc = mysqli_real_escape_string($conn, $_POST['servicedesc']);
$dat = date('Y-m-d H:i:s');
$sql = $conn->query("INSERT INTO message (garagename, firstname, lastname, email, phone, servicedescription, dat) 
VALUES ('$garagename', '$firstname', '$lastname', '$email', '$phone', '$servicedesc', '$dat')");
if ($sql) 
{
$to = $email;
$subject = 'Your Service Request has been Received';
$from = 'intambwesoftware@gmail.com';
$from_name = 'SMCS Support Team';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: " . $from_name . " <" . $from . ">" . "\r\n";
$body = "<h4>Dear " . ucfirst($firstname) . " " . ucfirst($lastname) . ",</h4>
<p>Thank you for submitting a service request to our system. Below are the details you submitted:</p>
<p><strong>Garage Name:</strong> $garagename</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Phone:</strong> $phone</p>
<p><strong>Service Description:</strong> $servicedesc</p>
<p><strong>Submitted on:</strong> $dat</p>
<p>Our team will get back to you shortly.</p>
<p>Best regards,<br>SMCS Support Team</p>";
if (mail($to, $subject, $body, $headers)) 
{
?>
<script>
swal({
title: "Message sent.",
text: "A confirmation email has been sent to your email address. Press Ok to continue.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = 'garagepage.php';
}
});
</script>
<?php
} 
else 
{
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
} 
else 
{
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
