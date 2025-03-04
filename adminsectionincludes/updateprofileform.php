<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Update Your Profile</h2>
<?php include 'adminsectionincludes/systemtitle.php'; ?>

<div class="d-flex justify-content-center">
<div class="onediv padding">
<?php
$sqluser = "SELECT * FROM admin WHERE status='active' AND id='$userid' ORDER BY id ASC";
$resultuser = $conn->query($sqluser);
if ($resultuser->num_rows > 0) {
while ($rowuser = $resultuser->fetch_assoc()) {
?>
<form method="POST">
<div class="row">
<div class="col-md-6 form-group">
<label for="firstname">First Name:</label>
<input type="text" id="firstname" name="firstname" class="form-control" value="<?php echo htmlspecialchars($rowuser["firstname"]); ?>" placeholder="Enter your first name" title="Enter your first name" required>
</div>
<div class="col-md-6 form-group">
<label for="lastname">Last Name:</label>
<input type="text" id="lastname" name="lastname" class="form-control" value="<?php echo htmlspecialchars($rowuser["lastname"]); ?>" placeholder="Enter your last name" title="Enter your last name" required>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="password">Your Password:</label>
<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" title="Enter your password" required>
</div>
<div class="col-md-6 form-group">
<label for="cpassword">Confirm Password:</label>
<input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm password" title="Confirm password" required>
</div>
</div>
<div class="text-center">
<button type="submit" name="updateprofile" class="btn btn-primary">Update Info</button>
</div>
</form>
<?php
}
}
?>
</div>
</div>
</div>
</div>
</section>