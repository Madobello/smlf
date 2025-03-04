<section id="adminmain" class="adminmain py-5 bg-light">
<div class="container">
<div class="page-section">
<h2 class="page-section__title text-center mb-4">Forgot Password</h2>
<?php include 'sectionincludes/systemtitle.php'; ?>
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card p-4 shadow-sm">
<form method="POST">
<div class="form-group">
<label for="phone">Phone:</label>
<input type="tel" id="phone" name="phone" class="form-control" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
title="Please enter a valid phone number with the country code (e.g., +1 555-555-5555)" value="+250" required>
</div>
<div class="form-group">
<label for="password">New Password:</label>
<input type="password" id="password" name="password" class="form-control" placeholder="Enter new password" title="Enter new password" required>
</div>
<div class="form-group">
<label for="cpassword">Confirm Password:</label>
<input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm password" title="Confirm password" required>
</div>
<div class="text-center">
<button type="submit" name="forgotpassword" class="btn btn-primary btn-block">Save Changes</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>