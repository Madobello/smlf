<section id="overview" class="overview bgcolor py-5">
<div class="container">
<div class="page-section">
<div class="row text-center gutters-140">

<?php  include 'phpincludes/countgarage.php'; ?>
<?php  include 'phpincludes/countgarageservice.php'; ?>

<div class="col-12 col-md-6 overview__single-section mb-4">
<h2 class="overview__single-section__number display-4 font-weight-bold">
<?php echo $garage_count; ?> +
</h2>
<p class="overview__single-section__title h5">
Registered Garages
</p>
</div>

<div class="col-12 col-md-6 overview__single-section mb-4">
<h2 class="overview__single-section__number display-4 font-weight-bold">
<?php echo $garageservice_count; ?> +
</h2>
<p class="overview__single-section__title h5">
Garage Services
</p>
</div>

</div>
</div>
</div>
</section>
