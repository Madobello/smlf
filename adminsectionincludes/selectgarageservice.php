<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Registered Service</h2>
<?php include 'adminsectionincludes/systemtitle.php'; ?>

<div class="table-responsive">
<table class="table table-hover">
<?php
$count = 1;

if (!isset($_SESSION['garagename'])) {
$sqlservice = "SELECT * FROM garageservice ORDER BY id ASC";
} else {
$sqlgarage = "SELECT * FROM garage WHERE id='$userid'";
$gname = ''; 

$resultgarage = $conn->query($sqlgarage);
if ($resultgarage->num_rows > 0) {
while ($rowgn = $resultgarage->fetch_assoc()) {
$gname = $rowgn['name']; 
}
}

$sqlservice = "SELECT * FROM garageservice WHERE garagename='$gname' ORDER BY id ASC";
}

$resultservice = $conn->query($sqlservice);

if ($resultservice->num_rows > 0) {
?>
<tbody>
<?php
while ($rowservice = $resultservice->fetch_assoc()) {
?>
<tr>
<td class="text-left capitalize">
<b><?php echo $rowservice["garagename"]; ?></b><br>
<img class="img-fluid" src="garageinfouploads/<?php echo $rowservice['image']; ?>" alt="Service Image" style="max-height: 220px; width: auto;"><br>
<b class="capitalize"><?php echo $rowservice["servicename"]; ?></b><br>
<?php echo $rowservice["description"]; ?><br>
<a class="btn btn-info btn-sm" href="garageservicemoreinfopage.php?serviceid=<?php echo $rowservice['id']; ?>">More..</a>
</td>
</tr>
<?php
$count++;
}
?>
</tbody>
<?php
} else {
?>
<tbody>
<tr>
<td colspan="1" class="text-center">
<script>
swal({
title: "No result found.",
text: "Press Ok to close.",
icon: 'info',
closeOnClickOutside: false,
closeOnEsc: false,
allowOutsideClick: false,
});
</script>
</td>
</tr>
</tbody>
<?php
}
?>
</table>
</div>
</div>
</div>
</section>
