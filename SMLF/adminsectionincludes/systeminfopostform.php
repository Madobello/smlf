<section id="adminmain" class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">System Information</h2>
<?php include 'adminsectionincludes/systemtitle.php'; ?>

<?php include 'phpincludes/systeminfoformupdate.php'; ?>
<?php include 'phpincludes/insertsysteminfo.php'; ?>

<div class="row">

<?php
// Check if there's existing system info
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);

// Form for inserting new system info
if ($result->num_rows == 0) {
?>
<div class="col-md-12">
<div>
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name" class="form-control" placeholder="Enter company name." title="Enter company name." required>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                   title="Phone number (e.g., +1 555-555-5555)" class="form-control" value="+250" placeholder="Enter company phone."  required>
</div>
<div class="col-md-6 form-group">
<label for="email">Email:</label>
<input type="email" id="email" name="email" class="form-control" placeholder="Enter company email." title="Enter company email." required>
</div>
</div>
<div class="form-group">
<label for="address">Address:</label>
<input type="text" id="address" name="address" class="form-control" placeholder="Enter company address." title="Enter company address." required>
</div>
<div class="form-group">
<label for="logo">Logo:</label>
<input type="file" id="logo" name="logo" class="form-control" placeholder="Select company logo." title="Select company logo." accept="image/*">
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="quote">Quote:</label>
<textarea id="quote" class="form-control" name="quote" rows="4" placeholder="Enter company quote." title="Enter company quote." required></textarea>
</div>
<div class="col-md-6 form-group">
<label for="aboutus">About company:</label>
<textarea id="aboutus" class="form-control" name="aboutus" rows="4" placeholder="Write company description." title="Write company description." required></textarea>
</div>
</div>
<input type="hidden" id="adminid" name="adminid" class="form-control" value="<?php echo $userid; ?>" title="Admin id." >
<div class="text-center">
<input type="submit" name="insertsysteminfo" class="btn btn-primary" value="Submit">
</div>
</form>
</div>
</div>
<?php
} else {
?>
<div class="col-md-12">
<div>
<form method="POST" enctype="multipart/form-data">
<?php while ($row = $result->fetch_assoc()) { ?>
<div class="form-group">
<label for="name">Name:</label>
<input type="text" id="name" name="name" class="form-control" placeholder="Enter company name." title="Enter company name." value="<?php echo $row['name']; ?>" required>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone" class="form-control" placeholder="Enter company phone." title="Enter company phone." value="<?php echo $row['phone']; ?>" required>
</div>
<div class="col-md-6 form-group">
<label for="email">Email:</label>
<input type="email" id="email" name="email" class="form-control" placeholder="Enter company email." title="Enter company email." value="<?php echo $row['email']; ?>" required>
</div>
</div>
<div class="form-group">
<label for="address">Address:</label>
<input type="text" id="address" name="address" class="form-control" placeholder="Enter company address." title="Enter company address." value="<?php echo $row['address']; ?>" required>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="quote">Quote:</label>
<textarea id="quote" class="form-control" name="quote" rows="4" placeholder="Enter company quote." title="Enter company quote."><?php echo $row['quote']; ?></textarea>
</div>
<div class="col-md-6 form-group">
<label for="aboutus">About company:</label>
<textarea id="aboutus" class="form-control" name="aboutus" rows="4" placeholder="Write company description."><?php echo $row['aboutus']; ?></textarea>
</div>
</div>
<div class="row">
<div class="col-md-6 form-group">
<label for="logo">Logo:</label>
<input type="file" id="logo" name="logo" class="form-control" placeholder="Select company logo." title="Select company logo." accept="image/*">
</div>
<div class="col-md-6 form-group">
<img src="systeminfouploads/<?php echo $row['logo']; ?>" alt="Current Logo" class="img-fluid" style="max-width: 220px;">
</div>
</div>
<input type="hidden" id="adminid" name="adminid" class="form-control" value="<?php echo $row['adminid']; ?>" title="Admin id." required>
<div class="text-center">
<input type="submit" name="updatesysteminfo" class="btn btn-primary" value="Update">
</div>
<?php } ?>
</form>
<div class="text-center mt-3">
<a href="systemuserspage.php" class="btn btn-primary">Add System User</a>
</div>
</div>
</div>
<?php
}
?>

</div>
</div>
</div>
</section>