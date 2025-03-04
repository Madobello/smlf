<?php
if(isset($_POST['loginsubmit'])) 
{
$loginemail = $_POST['loginEmail'];
$loginpassword = $_POST['loginPassword'];
$sql = "SELECT * FROM admin WHERE email='$loginemail' AND status='active'";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
while ($rowuser = $result->fetch_assoc()) 
{
$userid = $rowuser['id'];
$stored_password = $rowuser['password'];
if (password_verify($loginpassword, $stored_password)) 
{
$_SESSION['loginuserid'] = $userid;
?>
<script>
swal({
title: "Welcome.",
text: "Press Ok to continue.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = 'dashboard.php';
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
title: "Incorrect password.",
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
title: "User not found.",
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
?>