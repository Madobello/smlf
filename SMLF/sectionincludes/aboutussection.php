<section id="about" class="about py-5">
<div class="container">
<div class="text-center mb-5">
<h2 class="text-uppercase font-weight-bold">About Us</h2>
<img src="assets/images/title-style.png" alt="" class="img-fluid mt-2">
</div>
<?php
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
?>

<hr>
<div class="row align-items-center mt-4">
<div class="col-md-4 text-center">
<div class="about__image mb-4 mb-md-0">
<img src="systeminfouploads/<?php echo $row["logo"]; ?>" class="img-fluid rounded-circle" style="width:400px;" alt="">
</div>
</div>
<div class="col-md-8">
<p class="about__description text-justify"><?php echo $row["aboutus"]; ?></p>
</div>
</div>
<hr class="mt-4">
<?php
}
?>
</div>
</section>