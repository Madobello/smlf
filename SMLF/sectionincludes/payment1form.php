<section id="adminmain" class="adminmain py-5">
<div class="container">
<div class="page-section">
<h2 class="page-section__title text-center">Step 1/2 for Payment</h2>
<?php include 'sectionincludes/systemtitle.php'; ?>

<div class="row justify-content-center">
<div class="col-lg-12 col-md-12 col-sm-12">
<form method="POST" class="p-4 border rounded shadow-sm bg-light">
<div class="form-group">
<label for="price">Service Price:</label>
<input type="text" readonly id="price" name="price" class="form-control" value="<?php echo $price; ?>" required>
</div>

<div class="form-group">
<label for="fname">Your First Name:</label>
<input type="text" id="fname" name="fname" class="form-control" placeholder="Enter your first name" title="Enter your first name" required>
</div>

<div class="form-group">
<label for="lname">Your Last Name:</label>
<input type="text" id="lname" name="lname" class="form-control" placeholder="Enter your last name" title="Enter your last name" required>
</div>

<div class="form-group">
<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone" class="form-control" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" 
                   title="Enter phone number with the country code (e.g., +1 555-555-5555)" value="+250" required>
</div>

<div class="text-center">
<button type="submit" name="next" class="btn btn-primary">Next &gt;&gt;</button>
</div>
</form>
</div>
</div>
</div>
</div>
</section>

<?php
if (isset($_POST['next'])) {
$price = $_POST['price'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
title: 'Do you want to pay <?php echo $price ?> Rwf?',
text: 'Press OK to continue or Cancel.',
icon: 'info',
showCancelButton: true,
confirmButtonText: 'OK',
cancelButtonText: 'Cancel'
}).then((result) => {
if (result.isConfirmed) {
window.location = 'payment1page.php';
}
});
</script>

<?php
}
?>