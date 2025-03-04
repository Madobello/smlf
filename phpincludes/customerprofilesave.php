<?php
if(isset($_POST['saveprofilechange']))
{
$firstname=strtolower($_POST['firstname']);
$lastname=strtolower($_POST['lastname']);
$password1=$_POST['password1'];
$password2=$_POST['password2'];
if($password1!=$password2)
{
?>
<script>
swal({
title: "Password not match.",
text: "Press Ok, to close.",
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
$updateto=$conn->query("UPDATE customer SET firstname='$firstname',lastname='$lastname',password='$password1' WHERE id='$customerid'");
if($updateto)
{
?>
<script>
swal({
    title: "Account updated.",
    text: "Press Ok, to login.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = './customerprofile.php';
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
title: "Account not updated.",
text: "Press Ok, to close.",
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
