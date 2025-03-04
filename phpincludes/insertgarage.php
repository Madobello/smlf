<?php
if(isset($_POST['insertgarage'])) 
{
$name = strtolower($_POST['name']);
$phone = $_POST['phone'];
$email = $_POST['email'];
$province = $_POST['province'];
$district = $_POST['district'];
$sector = $_POST['sector'];
$village = $_POST['village'];
$maplink = $_POST['maplink'];
$aboutus = $_POST['aboutus'];
$adminid = $_POST['adminid'];


$sqlgarage = "SELECT * FROM garage WHERE name='$name' ";
$resultgarage = $conn->query($sqlgarage);
if ($resultgarage->num_rows > 0) 
{
?>
<script>
swal({
title: "Garage info exist.",
text: "Press Ok to close.",
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
$profile_name = "";
if(isset($_FILES['profileimg']) && $_FILES['profileimg']['error'] === UPLOAD_ERR_OK) 
{
$logo_tmp_name = $_FILES['profileimg']['tmp_name'];
$profile_name = $_FILES['profileimg']['name'];
$logo_destination = "garageinfouploads/" . $profile_name;
move_uploaded_file($logo_tmp_name, $logo_destination);
}
$sql = "INSERT INTO garage (name, phone, email, province, district, sector, village, maplink, aboutus, profileimg, adminid) VALUES ('$name', '$phone', '$email', '$province', '$district', '$sector', '$village', '$maplink', '$aboutus', '$profile_name', '$adminid')";

if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Garage saved.",
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
title: "Garage not saved.",
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
?>
