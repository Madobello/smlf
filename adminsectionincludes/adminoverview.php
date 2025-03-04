<?php
if(!isset($_SESSION['garagename']))
{
?>
<div class="container">
<section id="overview" class="bgcolor">
<div class="page-section">
<div class="row text-center">
<?php
include 'phpincludes/countgarage.php';
?>
<?php
include 'phpincludes/countgarageservice.php';
?>

<div class="col-12 col-lg-6 mb-4">
<div class="overview__single-section">
<h2 class="overview__single-section__number"><?php echo $garage_count; ?></h2>
<p class="overview__single-section__title">Registered garage</p>
</div>
</div>

<div class="col-12 col-lg-6 mb-4">
<div class="overview__single-section">
<h2 class="overview__single-section__number"><?php echo $garageservice_count; ?></h2>
<p class="overview__single-section__title">Garage service</p>
</div>
</div>
</div>
</div>
</section>
</div>
<?php
}
?>