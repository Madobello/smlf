<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatesysteminfo"])) 
{
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$quote = $_POST['quote'];
$aboutus = $_POST['aboutus'];
$adminid = $_POST["adminid"];
$logo_name = "";
if(isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) 
{
$logo_tmp_name = $_FILES['logo']['tmp_name'];
$logo_name = $_FILES['logo']['name'];
$logo_destination = "systeminfouploads/" . $logo_name; // Example path where you want to store the file
move_uploaded_file($logo_tmp_name, $logo_destination);
$sql = "UPDATE systeminfo SET name='$name', phone='$phone', email='$email', address='$address', adminid='$adminid',logo='$logo_name', quote='$quote', aboutus='$aboutus' ORDER BY id ASC LIMIT 1";
if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Record updated.",
text: "Press Ok to close.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = '';
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
});
</script>
<?php
}
}
else
{
$sql = "UPDATE systeminfo SET name='$name', phone='$phone', email='$email', address='$address', adminid='$adminid', quote='$quote', aboutus='$aboutus' ORDER BY id ASC LIMIT 1";
if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Record updated.",
text: "Press Ok Button To Close...",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
})
.then(function (isConfirm) {
if (isConfirm) {
window.location = '';
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
text: "Press Ok Button To Close...",
text: "Press Ok to close.",
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
