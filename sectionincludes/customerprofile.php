<?php
if (isset($_SESSION['customerid'])) {
$customerid = $_SESSION['customerid'];
?>
<div class="container py-5">
<div class="row justify-content-center">
<div class="col-lg-12">
<div class="card border-primary">
<div class="card-header bg-primary text-white text-center">
<h2>Your Profile</h2>
</div>
<div class="card-body">
<?php
$listprofileinfo = $conn->query("SELECT * FROM customer WHERE id='$customerid' LIMIT 1");
while ($rowinfo = mysqli_fetch_array($listprofileinfo)) {
?>
<form method="POST">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="firstname">Firstname</label>
<input type="text" id="firstname" class="form-control capitalise" required placeholder="Firstname" title="Firstname" value="<?php echo htmlspecialchars($rowinfo['firstname']); ?>" name="firstname">
</div>
<div class="form-group">
<label for="lastname">Lastname</label>
<input type="text" id="lastname" class="form-control capitalise" required placeholder="Lastname" title="Lastname" value="<?php echo htmlspecialchars($rowinfo['lastname']); ?>" name="lastname">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" id="email" readonly value="<?php echo htmlspecialchars($rowinfo['email']); ?>" title="Email" pattern=".+@gmail\.com$" placeholder="email@gmail.com" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="phone">Phone Number</label>
<input type="text" id="phone" readonly title="Phoneno" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                     value="<?php echo htmlspecialchars($rowinfo['phone']); ?>" placeholder="Phone Number" required class="form-control">
</div>
<div class="form-group">
<label for="password1">Password</label>
<input type="password" id="password1" class="form-control" title="Password" value="<?php echo htmlspecialchars($rowinfo['password']); ?>" required placeholder="Password" name="password1">
</div>
<div class="form-group">
<label for="password2">Confirm Password</label>
<input type="password" id="password2" class="form-control" title="Confirm password" value="<?php echo htmlspecialchars($rowinfo['password']); ?>" required placeholder="Confirm password" name="password2">
</div>
</div>
</div>
<div class="text-center">
<button class="btn btn-primary btn-block" type="submit" name="saveprofilechange">Save Changes</button>
</div>
</form>
<?php
}
?>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>
<?php include './phpincludes/customerprofilesave.php'; ?>