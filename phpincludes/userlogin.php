<?php
if (isset($_POST['userlogin'])) 
{
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];
$query = "SELECT * FROM customer WHERE phone='$username' OR email='$username'";
$result = $conn->query($query);
if (mysqli_num_rows($result) > 0) 
{
$user = mysqli_fetch_assoc($result);
if (password_verify($password, $user['password'])) 
{
$_SESSION['customerid'] = $user['id'];
$_SESSION['firstname'] = $user['firstname'];
$_SESSION['lastname'] = $user['lastname'];
$_SESSION['email'] = $user['email'];
$_SESSION['phone'] = $user['phone'];
echo "<script>
swal({
title: 'Welcome " . ucfirst($user['firstname']) . "!',
text: 'Press Ok to continue.',
icon: 'success',
closeOnClickOutside: false
}).then(function (isConfirm) {
if (isConfirm) {
window.location = 'dashboard.php'; // Redirect to dashboard
}
});
</script>";
} 
else 
{
echo "<script>
swal({
title: 'Incorrect credentials.',
text: 'Press Ok to try again.',
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
title: 'User not found.',
text: 'Press Ok to try again.',
icon: 'warning',
closeOnClickOutside: false
});
</script>";
}
}
?>
