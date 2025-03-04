<div class="container">
<div class="page-section">
<h2 class="page-section__title">Garage Service</h2>
<?php
include 'adminsectionincludes/systemtitle.php';
?>

<?php
include 'phpincludes/insertgarageservice.php';
?>

<div class="row">
<div class="col-md-12">
<div class="form-container">
<form method="POST" enctype="multipart/form-data">
<div class="form-group mb-3">
<label for="servicename">Service Name:</label>
<input type="text" id="servicename" name="servicename" class="form-control" placeholder="Service name" title="Service name" required>
</div>

<div class="row mb-3">
<div class="col-md-6">
<div class="form-group">
<label for="garagename">Select Garage:</label>
<select class="form-control capitalize" name="garagename" required title="Select garage name">
<?php
if (!isset($_SESSION['garagename'])) {
$garagesql = "SELECT * FROM garage ORDER BY id ASC";
}
else
{
   $garagesql = "SELECT * FROM garage WHERE id='$userid'"; 
}
$result = $conn->query($garagesql);
while ($rowgarage = $result->fetch_assoc()) 
{
?>
<option value="<?php echo $rowgarage["name"];?>"><?php echo $rowgarage["name"];?></option>
<?php
}
?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="price">Service Price:</label>
<input type="number" min="1" id="price" name="serviceprice" class="form-control" placeholder="Service price" title="Service price" required>
</div>
</div>
</div>

<div class="form-group mb-3">
<label for="image">Service Image:</label>
<input type="file" id="image" name="serviceimage" class="form-control" placeholder="Select service image" title="Select service image" accept="image/*">
</div>

<div class="form-group mb-3">
<label for="description">Service Description:</label>
<textarea id="description" name="description" class="form-control" rows="4" placeholder="Write service description" required></textarea>
</div>

<input type="hidden" id="adminid" name="adminid" value="<?php echo $userid; ?>" title="Admin ID">

<div class="text-center mb-3">
<input type="submit" name="insertgarageservice" class="btn btn-primary" value="Register">
</div>
</form>
</div>

<div class="text-center mt-3">
<a href="registeredservicepage.php" class="btn btn-secondary">Registered Services</a>
</div>
</div>
</div>
</div>
</div>
</section>