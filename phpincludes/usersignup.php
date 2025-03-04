<?php
if(isset($_POST['signup'])) 
{
$firstname = strtolower(mysqli_real_escape_string($conn, $_POST['firstname']));
$lastname = strtolower(mysqli_real_escape_string($conn, $_POST['lastname']));
$email = strtolower(mysqli_real_escape_string($conn, $_POST['email']));
$phone = strtolower(mysqli_real_escape_string($conn, $_POST['phone']));
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if ($password1 !== $password2) 
{
echo "<script>
swal({
title: 'Password does not match.',
text: 'Press Ok to close.',
icon: 'warning',
closeOnClickOutside: false
});
</script>";
} 
else 
{
$checkUser = $conn->query("SELECT * FROM customer WHERE phone='$phone' OR email='$email'");
if (mysqli_num_rows($checkUser) == 0) 
{
$hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
$addUser = $conn->query("INSERT INTO customer (firstname, lastname, email, phone, password) 
 VALUES ('$firstname', '$lastname', '$email', '$phone', '$hashedPassword')");
if ($addUser) 
{
$to = $email;
$from = 'isingizwemariemadeleine99@gmail.com';
$from_name = 'SMCS Support Team';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: " . $from_name . " <" . $from . ">" . "\r\n";
$body = "<h4>Dear " . ucfirst($firstname) . ",</h4>
<p>Thank you for registering with Smart Mechanism Core System (SMCS). Your account has been successfully created.</p>
<p><strong>Email:</strong> $email</p>
<p><strong>Phone:</strong> $phone</p>
<p><strong>Password:</strong> $password1</p>
<p>Please keep this information safe and do not share it with anyone.</p>
<p>Best regards,<br>SMCS Support Team</p>";
if (mail($to, 'Welcome to SMCS!', $body, $headers)) 
{
echo "<script>
swal({
title: 'Account created.',
text: 'Confirmation email sent! Press Ok to login.',
icon: 'success',
closeOnClickOutside: false
});
</script>";
} 
else 
{
echo "<script>
swal({
title: 'Account created.',
text: 'However, the confirmation email could not be sent.',
icon: 'warning',
closeOnClickOutside: false
});
</script>";
}
} 
else 
{
echo "<script>
swal({
title: 'Account not created.',
text: 'Press Ok to close.',
icon: 'warning',
closeOnClickOutside: false
});
</script>";
}
} else {
echo "<script>
swal({
title: 'User already exists.',
text: 'Press Ok to close.',
icon: 'warning',
closeOnClickOutside: false
});
</script>";
}
}
}
?>
