<?php
if (isset($_POST['updateprofile'])) 
{
$userid = $_SESSION['admin_id'];
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if ($password !== $cpassword) 
{
echo "<script>
swal({
title: 'Passwords do not match.',
text: 'Press Ok to close.',
icon: 'warning',
closeOnClickOutside: false
});
</script>";
} 
else 
{
$sql = "SELECT password FROM admin WHERE id='$userid' AND status='active'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
$admin = $result->fetch_assoc();
if (!empty($password)) 
{
$newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
$passwordSQL = ", password='$newPasswordHash'";
} 
else 
{
$passwordSQL = "";
}
$updateSQL = "UPDATE admin SET firstname='$firstname', lastname='$lastname' $passwordSQL WHERE id='$userid'";
if ($conn->query($updateSQL) === TRUE) 
{
echo "<script>
swal({
title: 'Profile updated.',
text: 'Press Ok to close.',
icon: 'success',
closeOnClickOutside: false
});
</script>";
} else {
echo "<script>
swal({
title: 'Profile not updated.',
text: 'Press Ok to close.',
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
title: 'Invalid user.',
text: 'Press Ok to close.',
icon: 'error',
closeOnClickOutside: false
});
</script>";
}
}
}
?>
