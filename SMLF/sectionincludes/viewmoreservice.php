<section id="adminmain" class="adminmain">
<?php
include 'phpincludes/updategarageinfo.php';
?>
<?php
include 'phpincludes/deletegarage.php';
?>
<div class="container">
<div class="page-section">
<h2 class="page-section__title">More info</h2>
<?php
include 'sectionincludes/systemtitle.php';
?>

<?php
$serviceid = $_GET['serviceid'];
$sqlservice = "SELECT * FROM garageservice WHERE id='$serviceid'";
$resultservice = $conn->query($sqlservice);
while ($rowservice = $resultservice->fetch_assoc()) {
?>
<div class="card mb-4">
<div class="card-body">
<h4 class="card-title text-center"><?php echo $rowservice["servicename"]; ?></h4>
<div class="row">
<div class="col-md-6 mb-3">
<img src="garageinfouploads/<?php echo $rowservice['image']; ?>" alt="Service Image" class="img-fluid">
</div>
<div class="col-md-6">
<h2>Price: Rwf <?php echo $rowservice["price"]; ?></h2>
<p><?php echo $rowservice["description"]; ?></p>
</div>
</div>
<form method="POST" class="text-center">
<input type="hidden" name="psid" value="<?php echo $rowservice["id"]; ?>" required>
<input type="hidden" name="price" value="<?php echo $rowservice["price"]; ?>" required>
<button type="submit" name="payment1" class="btn btn-primary">Make Payment</button>
</form>
<hr>
<h4 class="text-center">From: <?php echo $rowservice["garagename"]; ?></h4>
</div>
</div>
<?php
}
?>
</div>
</div>
</section>

<?php
if (isset($_POST['payment1'])) {
$psid = $_POST['psid'];
$price = $_POST['price'];

$_SESSION['paymentserviceid'] = $psid;
$_SESSION['price'] = $price;

if ($_SESSION['paymentserviceid'] != '') {
?>

<script>
swal({
title: "Do you want to make payment?",
text: "Press OK to continue or Cancel.",
icon: 'info',
buttons: {
cancel: "Cancel",
confirm: {
text: "OK",
closeModal: false,
},
},
}).then(function (isConfirm) {
if (isConfirm) {
window.location = 'payment1page.php';
}
});
</script>

<?php
}
}
?>