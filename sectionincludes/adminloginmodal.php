<div class="modal fade" id="adminloginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary text-white">
<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form method="POST" class="text-center">
<div class="mb-4">
<h2 class="font-weight-bold">Login Form</h2>
<?php include 'sectionincludes/systemtitle.php'; ?>
</div>
<div class="form-group text-left">
<label for="loginemail">Email:</label>
<input type="email" id="loginemail" name="loginEmail" class="form-control" placeholder="Enter your email" title="Enter your email" required>
</div>
<div class="form-group text-left">
<label for="loginpassword">Password:</label>
<input type="password" id="loginpassword" name="loginPassword" class="form-control" placeholder="Enter your password" title="Enter your password" required>
</div>
<button type="submit" name="loginsubmit" class="btn btn-primary btn-block">Login</button>
<div class="mt-3">
<a href="forgotpasswordpage.php">Forgot password?</a>
</div>
</form>
</div>
</div>
</div>
</div>
<?php include 'phpincludes/login.php'; ?>