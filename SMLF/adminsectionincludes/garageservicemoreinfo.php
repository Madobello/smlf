<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Update Service</h2>
<?php
include 'adminsectionincludes/systemtitle.php';
?>

<?php
include 'phpincludes/updategarageserviceinfo.php';
?>
<?php
include 'phpincludes/deletegarageservice.php';
?>

<?php
$serviceid = $_GET['serviceid'];
$sqlgarage = "SELECT * FROM garageservice WHERE id='$serviceid'";
$resultgarage = $conn->query($sqlgarage);
while ($rowservice = $resultgarage->fetch_assoc()) 
{
?>

<form method="POST" enctype="multipart/form-data">
<div class="row">
<div class="col-md-12 mb-3">
<input type="hidden" name="updateserviceid" value="<?php echo $rowservice["id"];?>" required>

<div class="form-group">
<label for="servicename">Service Name:</label>
<input type="text" id="servicename" name="servicename" class="form-control" placeholder="Enter service name" value="<?php echo $rowservice["servicename"];?>" title="Enter service name" required>
</div>

<div class="row mb-3">
<div class="col-md-6">
<div class="form-group">
<label for="garagename">Select Garage:</label>
<select class="form-control" name="garagename" required title="Select garage name">
<option value="<?php echo $rowservice["garagename"];?>"><?php echo $rowservice["garagename"];?></option>
<?php
$garagesql = "SELECT * FROM garage ORDER BY id ASC";
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
<input type="number" min="1" id="price" name="serviceprice" value="<?php echo $rowservice["price"];?>" class="form-control" placeholder="Service price" title="Service price" required>
</div>
</div>
</div>

<div class="form-group mb-3">
<label for="serviceimg">Service Image:</label>
<input type="file" id="serviceimg" name="serviceimg" class="form-control" placeholder="Select service image" title="Select service image" accept="image/*">
</div>

<div class="row mb-3">
<div class="col-md-2">
<label for="description">Current Image:</label>
<img src="garageinfouploads/<?php echo $rowservice['image']; ?>" alt="Current Service Image" class="img-fluid" style="max-width: 220px;">
</div>
<div class="col-md-10">
<div class="form-group">
<label for="description">About Service:</label>
<textarea id="description" name="description" class="form-control" rows="6" placeholder="Write service description..." required><?php echo $rowservice["description"];?></textarea>
</div>
</div>
</div>

<input type="hidden" id="adminid" name="adminid" value="<?php echo $userid; ?>" title="Admin ID" required>

<div class="text-center mb-3">
<input type="submit" name="updategarageserviceinfo" class="btn btn-primary" value="Save Changes">
</div>
</div>
</div>
</form>

<form method="POST" class="text-center">
<input type="hidden" name="deleteserviceid" value="<?php echo $rowservice["id"];?>">
<button type="submit" name="deleteservice" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</button>
</form>

<?php
}
?>
</div>
</div>
</section>