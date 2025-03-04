<?php
if(isset($_POST['updategarageserviceinfo'])) 
{
$updateserviceid = $_POST['updateserviceid'];
$garagename = strtolower($_POST['garagename']);
$servicename = strtolower($_POST['servicename']);
$description = $_POST['description'];
$adminid = $_POST['adminid'];
$serviceprice=$_POST['serviceprice'];
$serviceimg = "";

if(isset($_FILES['serviceimg']) && $_FILES['serviceimg']['error'] === UPLOAD_ERR_OK) 
{
$logo_tmp_name = $_FILES['serviceimg']['tmp_name'];
$serviceimg = $_FILES['serviceimg']['name'];
$logo_destination = "garageinfouploads/" . $serviceimg;
move_uploaded_file($logo_tmp_name, $logo_destination);
$sql = "UPDATE garageservice SET garagename='$garagename', servicename='$servicename', image='$serviceimg', description='$description', adminid='$adminid', price='$serviceprice' WHERE id='$updateserviceid'";
if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Record  updated.",
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
title: "Record not updated.",
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
else
{
$sql = "UPDATE garageservice SET garagename='$garagename', servicename='$servicename', description='$description', adminid='$adminid', price='$serviceprice' WHERE id='$updateserviceid'";
if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Record  updated.",
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
title: "Record not updated.",
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
}
?>
