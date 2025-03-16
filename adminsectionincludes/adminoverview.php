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
include 'phpincludes/countgarageservice.php';
include 'phpincludes/countcustomer.php';
include 'phpincludes/countcar.php';
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

                <div class="col-12 col-lg-6 mb-4">
                    <div class="overview__single-section">
                        <h2 class="overview__single-section__number"><?php echo $customer_count; ?></h2>
                        <p class="overview__single-section__title">Customers</p>
                    </div>
                </div>

                <div class="col-12 col-lg-6 mb-4">
                    <div class="overview__single-section">
                        <h2 class="overview__single-section__number"><?php echo $car_count; ?></h2>
                        <p class="overview__single-section__title">Cars</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
}
?>