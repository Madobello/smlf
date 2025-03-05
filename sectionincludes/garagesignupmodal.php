<div class="modal fade" id="garagesignupmodal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary text-white">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php
include 'phpincludes/insertgarage.php';
?>
<form method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-md-12 mb-3">
<div class="form-group">
<label for="name">Garage Name:</label>
<input type="text" id="name" name="name" class="form-control" placeholder="Enter garage name." title="Enter garage name." required>

<div class="form-group">
<label for="phone">Garage Phone:</label>
<input type="text" id="phone" name="phone" class="form-control" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                   title="Please enter a valid phone number with the country code (e.g., +1 555-555-5555)" value="+250" required>
</div>

<div class="form-group">
<label for="email">Garage Email:</label>
<input type="email" id="email" name="email" class="form-control" placeholder="Enter garage email." title="Enter garage email." required>
</div>
<div class="form-group">
<label for="province">Province:</label>
<select class="form-control" id="province" name="province" required>
<option selected disabled>Select Province</option>
<option value="kigali">Kigali City</option>
<option value="east">Eastern Province</option>
<option value="west">Western Province</option>
<option value="north">Northern Province</option>
<option value="south">Southern Province</option>
</select>
</div>

<div class="form-group">
<label for="district">District:</label>
<select class="form-control" id="district" name="district" required>
<!-- Options will be populated dynamically -->
</select>
</div>

<div class="form-group">
<label for="sector">Sector:</label>
<select class="form-control" id="sector" name="sector" required>
<!-- Options will be populated dynamically -->
</select>
</div>

<div class="form-group">
<label for="village">Village:</label>
<select class="form-control" id="village" name="village" required>
<!-- Options will be populated dynamically -->
</select>
</div>

<div class="form-group">
<label for="password1">Enter your password:</label>
<input type="password" id="password1" name="password1" class="form-control" placeholder="Enter new password" required>
</div>
<div class="form-group">
<label for="password2">Confirm password:</label>
<input type="password" id="password2" name="password2" class="form-control" placeholder="Confirm password" required>
</div>



</div>


<div class="text-center mb-3">
<input type="submit" name="signupgarage" class="btn btn-primary" value="Register">
</div>
</div>
</div>
</form>

</div>
</div>
</div>
</div>

<?php include 'phpincludes/garagesignup.php'; ?>
