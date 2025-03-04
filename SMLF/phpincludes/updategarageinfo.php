<?php
if(isset($_POST['updategarageinfo'])) 
{
$updategarageid = $_POST['updategarageid'];
$name = strtolower($_POST['name']);
$exname = strtolower($_POST['exname']);
$phone = $_POST['phone'];
$email = $_POST['email'];
$maplink = $_POST['maplink'];
$aboutus = $_POST['aboutus'];
$adminid = $_POST['adminid'];


$profileimg = "";
if(isset($_FILES['profileimg']) && $_FILES['profileimg']['error'] === UPLOAD_ERR_OK) 
{
$logo_tmp_name = $_FILES['profileimg']['tmp_name'];
$profileimg = $_FILES['profileimg']['name'];
$logo_destination = "garageinfouploads/" . $profileimg;
move_uploaded_file($logo_tmp_name, $logo_destination);
$sql = "UPDATE garage SET name='$name', phone='$phone', email='$email', maplink='$maplink', profileimg='$profileimg', aboutus='$aboutus', adminid='$adminid' WHERE id='$updategarageid'";
$updateservice="UPDATE garageservice SET garagename='$name' WHERE garagename='$exname'";
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
window.location = 'registeredgaragepage.php';
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
window.location = 'registeredgaragepage.php';
}
});
</script>
<?php
}
}
else
{
$sql = "UPDATE garage SET name='$name', phone='$phone', email='$email', maplink='$maplink', aboutus='$aboutus', adminid='$adminid' WHERE id='$updategarageid'";
$updateservice="UPDATE garageservice SET garagename='$name' WHERE garagename='$exname'";
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
window.location = 'registeredgaragepage.php';
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
window.location = 'registeredgaragepage.php';
}
});
</script>
<?php
}
}
}
?>
