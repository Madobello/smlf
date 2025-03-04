<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Registered Users</h2>
<?php include 'adminsectionincludes/systemtitle.php'; ?>

<?php include 'phpincludes/deleteuser.php'; ?>

<div class="table-responsive">
<table class="table table-hover">
<?php
$count = 1;
$sqluser = "SELECT * FROM admin WHERE status='active' ORDER BY id ASC";
$resultuser = $conn->query($sqluser);
// Display data
if ($resultuser->num_rows > 0) {
?>
<thead>
<tr>
<td colspan="6" class="text-center capitalize">List of Registered Users</td>
</tr>
<tr>
<th class="text-left">NO:</th>
<th class="text-left">FIRST NAME:</th>
<th class="text-left">LAST NAME:</th>
<th class="text-left">EMAIL:</th>
<th class="text-center" colspan="2">ACTION:</th>
</tr>
</thead>
<tbody>
<?php
while ($rowuser = $resultuser->fetch_assoc()) {
$activeid = $rowuser["id"];
?>
<tr>
<td class="text-left"><?php echo $count; ?></td>
<td class="text-left capitalize"><?php echo $rowuser["firstname"]; ?></td>
<td class="text-left capitalize"><?php echo $rowuser["lastname"]; ?></td>
<td class="text-left"><?php echo $rowuser["email"]; ?></td>
<td class="text-center">
<?php if ($activeid == $userid) { ?>
<a href="updateprofilepage.php" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to update?')">Update</a>
<?php } else { ?>
<span class="text-muted">Disabled</span>
<?php } ?>
</td>
<td class="text-center">
<?php if ($activeid == $userid) { ?>
<form method="POST" style="display: inline;">
<input type="hidden" name="userid" required value="<?php echo $rowuser["id"]; ?>">
<a href="" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete X</a>
</form>
<?php } else { ?>
<span class="text-muted">Disabled</span>
<?php } ?>
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
<td colspan="6" class="text-center">
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