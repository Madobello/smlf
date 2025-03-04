<?php
if(isset($_POST['insertgarageservice'])) 
{
$garagename = strtolower($_POST['garagename']);
$servicename = strtolower($_POST['servicename']);
$description = $_POST['description'];
$adminid = $_POST['adminid'];
$serviceprice=$_POST['serviceprice'];
$service_image = "";


$sqlservice = "SELECT * FROM garageservice WHERE servicename='$servicename' AND garagename='$garagename' ";
$resultservice = $conn->query($sqlservice);
if ($resultservice->num_rows > 0) 
{
?>
<script>
swal({
title: "Service info exist.",
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


if(isset($_FILES['serviceimage']) && $_FILES['serviceimage']['error'] === UPLOAD_ERR_OK) 
{
$logo_tmp_name = $_FILES['serviceimage']['tmp_name'];
$service_image = $_FILES['serviceimage']['name'];
$logo_destination = "garageinfouploads/" . $service_image;
move_uploaded_file($logo_tmp_name, $logo_destination);
}
$sql = "INSERT INTO garageservice (garagename, servicename, image, description, adminid, price) VALUES ('$garagename', '$servicename', '$service_image', '$description', '$adminid', '$serviceprice')";

if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Service saved.",
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
title: "Service not saved.",
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
}
?>
