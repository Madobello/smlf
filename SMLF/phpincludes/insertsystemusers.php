<?php
if(isset($_POST['insertadmin'])) 
{
$firstname = strtolower($_POST['firstname']);
$lastname = strtolower($_POST['lastname']);
$phone = $_POST['phone'];
$email = strtolower($_POST['email']);
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
$sqluser = "SELECT * FROM admin WHERE phone='$phone' OR email='$email' ";
$resultuser = $conn->query($sqluser);
if ($resultuser->num_rows > 0) 
{
?>
<script>
swal({
title: "Account info exists.",
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
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO admin (firstname, lastname, phone, email, password, status) 
VALUES ('$firstname', '$lastname', '$phone', '$email', '$hashed_password', 'active')";
if ($conn->query($sql) === TRUE) 
{
$to = $email;
$subject = 'Account Created';
$from = 'isingizwemariemadeleine99@gmail.com';
$from_name = 'SMCS Support Team';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: " . $from_name . " <" . $from . ">" . "\r\n";
$body = "<h4>Dear " . ucfirst($firstname) . " " . ucfirst($lastname) . ",</h4>
<p>Congratulations! Account has been successfully created.</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Phone:</strong> $phone</p>
<p><strong>Status:</strong> Active</p>
<p><strong>Password:</strong> $password</p>
<p>Please keep this information safe and do not share it with others.</p>
<p>Best regards,<br>SMCS Support Team</p>";
if (mail($to, $subject, $body, $headers)) 
{
?>
<script>
swal({
title: "Account created.",
text: "A confirmation email has been sent to the admin. Press Ok to close.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false
});
</script>
<?php
} 
else 
{
?>
<script>
swal({
title: "Account created.",
text: "However, the confirmation email could not be sent.",
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
title: "Account not created.",
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
}
?>
