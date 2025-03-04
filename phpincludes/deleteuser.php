<?php
if(isset($_POST['deleteuser'])) 
{
$userid = $_POST['userid'];
$dltuser = "UPDATE admin SET status='disable' WHERE id='$userid'";

if ($conn->query($dltuser) === TRUE) 
{
?>
<script>
swal({
title: "Account deleted.",
text: "Press Ok to close.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = 'registeredusers.php';
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
title: "Account not deleted.",
text: "Press Ok to close.",
icon: 'error',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = 'registeredusers.php';
}
});
</script>
<?php
}
}
?>
