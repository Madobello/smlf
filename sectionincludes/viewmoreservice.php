<section id="adminmain" class="adminmain">
    <?php 
        include 'phpincludes/updategarageinfo.php'; 
        include 'phpincludes/deletegarage.php';
    ?>
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title">More info</h2>
            <?php 
                include 'sectionincludes/systemtitle.php'; 
                $serviceid = $_GET['serviceid'];
                $sqlservice = "SELECT * FROM garageservice WHERE id='$serviceid'";
                $resultservice = $conn->query($sqlservice);
                while ($rowservice = $resultservice->fetch_assoc()) {
            ?>
            <div class="row">
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center">Customer Information</h4>
                            <h4 class="card-title text-center"><?php echo $rowservice["servicename"]; ?></h4>
                            <div class="row">
                                <?php 
                                    if (isset($_SESSION['customerid'])) {
                                        $customerid = $_SESSION['customerid'];
                                        $firstname = $_SESSION['firstname'];
                                        $lastname = $_SESSION['lastname'];
                                        $email = $_SESSION['email'];
                                        $phone = $_SESSION['phone'];
                                    }
                                    else {
                                        echo "hello";
                                    }
                                ?>
                                <div class="col-md-6">
                                    <img src="garageinfouploads/<?php echo $rowservice['image']; ?>" alt="Service Image" class="img-fluid">
                                    <input type="text" name="<?php echo $firstname; ?>" value="" id="" class="form-control">
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
                </div>

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo $rowservice["servicename"]; ?></h4>
                            <div class="row">
                                <div class="col-md-6">
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
                </div>

            </div>

        </div>
        <?php } ?>
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
        },},}).then(function (isConfirm) {
        if (isConfirm) {
            window.location = 'payment1page.php';
        }
    });
</script>

<?php
}
}
?>