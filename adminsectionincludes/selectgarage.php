<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Registered Garage</h2>
<?php include 'adminsectionincludes/systemtitle.php'; ?>

<div class="table-responsive">
<table class="table table-hover">
<?php
$count = 1;


 if(!isset($_SESSION['garagename']))
  {
$sqlgarage = "SELECT * FROM garage ORDER BY id ASC";
}
else
{
$sqlgarage = "SELECT * FROM garage WHERE id='$userid' ORDER BY id ASC LIMIT 1";
}
$resultgarage = $conn->query($sqlgarage);
// Display data
if ($resultgarage->num_rows > 0) {
?>
<thead>
<tr>
<th colspan="8" class="text-center capitalize">List of Registered Garages</th>
</tr>
<tr>
<th class="text-left">NO:</th>
<th class="text-left">NAME:</th>
<th class="text-left">PHONE:</th>
<th class="text-left">EMAIL:</th>
<th class="text-left">PROVINCE:</th>
<th class="text-left">DISTRICT:</th>
<th class="text-left">SECTOR:</th>
<th class="text-left">VILLAGE:</th>
</tr>
</thead>
<tbody>
<?php
while ($rowgarage = $resultgarage->fetch_assoc()) {
?>
<tr>
<td class="text-left"><?php echo $count; ?></td>
<td class="text-left capitalize"><?php echo $rowgarage["name"]; ?></td>
<td class="text-left"><?php echo $rowgarage["phone"]; ?></td>
<td class="text-left"><?php echo $rowgarage["email"]; ?></td>
<td class="text-left capitalize"><?php echo $rowgarage["province"]; ?></td>
<td class="text-left capitalize"><?php echo $rowgarage["district"]; ?></td>
<td class="text-left capitalize"><?php echo $rowgarage["sector"]; ?></td>
<td class="text-left capitalize"><?php echo $rowgarage["village"]; ?></td>
</tr>
<tr>
<td colspan="8" class="text-left capitalize">
<?php echo $rowgarage["aboutus"]; ?>
<a class="btn btn-info btn-sm" href="garagemoreinfopage.php?garageid=<?php echo $rowgarage['id']; ?>">More..</a>
</td>
</tr>
<?php
$count++;
}
} else {
?>
<tr>
<td colspan="8" class="text-center">
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
<?php
}
?>
</tbody>
</table>
</div>
</div>
</div>
</section>