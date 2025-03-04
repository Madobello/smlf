<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary text-white">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="POST">
	<h2>Signup form</h2>
<div class="form-group">
<label for="firstname">Enter your firstname:</label>
<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter your firstname" maxlength="40" required>
</div>
<div class="form-group">
<label for="lastname">Enter your lastname:</label>
<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Enter your lastname" maxlength="40" required>
</div>
<div class="form-group">
<label for="email">Enter your email:</label>
<input type="email" id="email" name="email" pattern=".+@gmail\.com$" placeholder="Enter your email" class="form-control" required>
</div>
<div class="form-group">
<label for="phone">Enter your phone number:</label>
<input type="text" id="phone" name="phone" class="form-control" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                   title="Phone number (e.g., +1 555-555-5555)" value="+250" required>
</div>
<div class="form-group">
<label for="password1">Enter your password:</label>
<input type="password" id="password1" name="password1" class="form-control" placeholder="Enter new password" required>
</div>
<div class="form-group">
<label for="password2">Confirm password:</label>
<input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm password" required>
</div>
<button type="submit" name="signup" class="btn btn-primary btn-block">Sign Up</button>
</form>
</div>
</div>
</div>
</div>

<?php include 'phpincludes/usersignup.php'; ?>
