<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">System User</h2>
<img class="page-section__title-style" src="assets/images/title-style.png" alt="">

<?php
// Fetch system info
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
?>
<p class="page-section__paragraph capitalize"><?php echo htmlspecialchars($row["name"]); ?></p>
<?php
}
}
?>

<?php include 'phpincludes/insertsystemusers.php'; ?>

<div>
<form method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6 form-group">
<label for="firstname">First Name:</label>
<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter your first name" title="Enter your first name" required>
</div>
<div class="col-md-6 form-group">
<label for="lastname">Last Name:</label>
<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter your last name" title="Enter your last name" required>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="phone">Phone Number:</label>
<input type="tel" id="phone" name="phone" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                   title="Phone number (e.g., +1 555-555-5555)" value="+250" class="form-control" placeholder="Enter your phone number" required>
</div>
<div class="col-md-6 form-group">
<label for="email">Email:</label>
<input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" title="Enter your email" required>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="password">Password:</label>
<input type="password" id="password" name="password" class="form-control" placeholder="Enter password" title="Enter password" required>
</div>
<div class="col-md-6 form-group">
<label for="cpassword">Confirm Password:</label>
<input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm password" title="Confirm password" required>
</div>
</div>
<div class="text-center">
<input type="submit" name="insertadmin" class="btn btn-primary" value="Register">
</div>
</form>
</div>
</div>
</div>
</section>