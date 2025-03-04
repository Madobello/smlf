<?php
if(isset($_POST['deletegarage'])) 
{
$deletegarageid = $_POST['deletegarageid'];
$dltgarage = "DELETE FROM garage WHERE id='$deletegarageid'";

if ($conn->query($dltgarage) === TRUE) 
{
?>
<script>
swal({
title: "Garage deleted.",
text: "Press Ok to close.",
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
title: "Garage not deleted.",
text: "Press Ok to close.",
icon: 'warning',
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
}
?>
