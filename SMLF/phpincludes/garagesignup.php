<?php
if(isset($_POST['signupgarage'])) 
{
$name = strtolower($_POST['name']);
$phone = $_POST['phone'];
$email = $_POST['email'];
$province = $_POST['province'];
$district = $_POST['district'];
$sector = $_POST['sector'];
$village = $_POST['village'];
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
$sql = "INSERT INTO garage (name, phone, email, province, district, sector, village, password) VALUES ('$name', '$phone', '$email', '$province', '$district','$sector', '$village', '$password2')";

if ($conn->query($sql) === TRUE) 
{
?>
<script>
swal({
title: "Garage account created.",
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
title: "Garage account not created.",
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
}
?>
