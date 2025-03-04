<?php
if(isset($_POST['insertsysteminfo'])) 
{
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$quote = $_POST['quote'];
$aboutus = $_POST['aboutus'];
$adminid = $_POST['adminid'];
$logo_name = "";
if(isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) 
{
$logo_tmp_name = $_FILES['logo']['tmp_name'];
$logo_name = $_FILES['logo']['name'];
$logo_destination = "systeminfouploads/" . $logo_name; // Example path where you want to store the file
move_uploaded_file($logo_tmp_name, $logo_destination);
}

$sql = "INSERT INTO systeminfo (name, phone, email, address, logo,quote,aboutus, adminid) VALUES ('$name', '$phone', '$email', '$address', '$logo_name', '$quote', '$aboutus', '$adminid')";

if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "System info saved.",
text: "Press Ok to close.",
icon: 'success',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
<?php
} 
else 
{
?>
<script>
swal({
title: "System info not saved.",
text: "Press Ok to close.",
icon: 'error',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
<?php
}
}
?>
