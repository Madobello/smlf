<?php
if(isset($_POST['forgotpassword'])) 
{
$phone = $_POST['phone'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if($password !== $cpassword) 
{
?>
<script>
swal({
title: "Passwords do not match.",
text: "Press Ok to close.",
icon: 'warning',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
<?php
}
else
{
// Use the customer table instead of the admin table
$sql = "SELECT * FROM customer WHERE phone='$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
while ($rowuser = $result->fetch_assoc()) 
{
$userid = $rowuser['id'];
$hashed_password = password_hash($cpassword, PASSWORD_DEFAULT);
$changepassword = "UPDATE customer SET password='$hashed_password' WHERE id='$userid' ";

if ($conn->query($changepassword) === TRUE) 
{
$to = $rowuser['email'];
$subject = "Password Reset Confirmation";
$from = 'isingizwemariemadeleine99@gmail.com';
$from_name = 'SMCS Support Team';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: " . $from_name . " <" . $from . ">" . "\r\n";
$body = "<h4>Dear " . ucfirst($rowuser['firstname']) . " " . ucfirst($rowuser['lastname']) . ",</h4>
<p>Your password has been successfully reset.</p>
<p><strong>New Password:</strong> $cpassword</p>
<p>Please keep this information safe and do not share it with others.</p>
<p>Best regards,<br>SMCS Support Team</p>";

if (mail($to, $subject, $body, $headers)) 
{
?>
<script>
swal({
title: "Password changed.",
text: "A confirmation email has been sent to your email address.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
<?php
} 
else 
{
?>
<script>
swal({
title: "Password changed.",
text: "However, the confirmation email could not be sent.",
icon: 'warning',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
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
title: "Password not changed.",
text: "Press Ok to close.",
icon: 'warning',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
<?php
}
}
} 
else 
{
?>
<script>
swal({
title: "Invalid phone number.",
text: "Press Ok to close.",
icon: 'warning',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
<?php
}
}
}
?>
