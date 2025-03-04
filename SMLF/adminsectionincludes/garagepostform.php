<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Register New Garage</h2>
<?php
include 'adminsectionincludes/systemtitle.php';
?>

<?php
include 'phpincludes/insertgarage.php';
?>
<form method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6 mb-3">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name" class="form-control" placeholder="Enter garage name." title="Enter garage name." required>
</div>

<div class="row">
<div class="col-md-6 mb-3">
<div class="form-group">
<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                   title="Phone number (e.g., +1 555-555-5555)" class="form-control" placeholder="Enter garage phone." value="+250" required>
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
<label for="email">Email:</label>
<input type="email" id="email" name="email" class="form-control" placeholder="Enter garage email." title="Enter garage email." required>
</div>
</div>
</div>









<div class="form-group mb-3">
<label for="profileimg">Profile Image:</label>
<input type="file" id="profileimg" name="profileimg" class="form-control" placeholder="Select garage profile image." title="Select garage profile image." accept="image/*" required>
</div>










<div class="form-group mb-3">
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

<div class="form-group mb-3">
<label for="district">District:</label>
<select class="form-control" id="district" name="district" required>
<!-- Options will be populated dynamically -->
</select>
</div>
</div>

<div class="col-md-6 mb-3">
<div class="form-group mb-3">
<label for="sector">Sector:</label>
<select class="form-control" id="sector" name="sector" required>
<!-- Options will be populated dynamically -->
</select>
</div>

<div class="form-group mb-3">
<label for="village">Village:</label>
<select class="form-control" id="village" name="village" required>
<!-- Options will be populated dynamically -->
</select>
</div>

<div class="form-group mb-3">
<label for="maplink">Map Link:</label>
<input type="text" id="maplink" name="maplink" class="form-control" placeholder="Enter garage map link" title="Enter garage map link" required>
</div>

<div class="form-group mb-3">
<label for="aboutus">About Garage:</label>
<textarea id="aboutus" name="aboutus" class="form-control" rows="5" placeholder="Write garage description..." required></textarea>
</div>

<input type="hidden" id="adminid" name="adminid" class="form-control" value="<?php echo $userid; ?>" title="Admin ID." required>
</div>
</div>

<div class="text-center mb-3">
<input type="submit" name="insertgarage" class="btn btn-primary" value="Register">
</div>
</form>

<div class="text-center">
<a href="registeredgaragepage.php" class="btn btn-secondary">Registered Garages</a>
</div>
</div>
</div>
</section>