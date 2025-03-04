<?php
if(isset($_POST['deleteservice'])) 
{
$deleteserviceid = $_POST['deleteserviceid'];
$dltservice = "DELETE FROM garageservice WHERE id='$deleteserviceid'";

if ($conn->query($dltservice) === TRUE) 
{
?>
<script>
swal({
title: "Service deleted.",
text: "Press Ok to close.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = 'registeredservicepage.php';
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
title: "Service not deleted.",
text: "Press Ok to close.",
icon: 'warning',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = 'registeredservicepage.php';
}
});
</script>
<?php
}
}
?>
