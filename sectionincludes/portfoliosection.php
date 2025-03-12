<section id="portfolio" class="adminmain py-5">
<div class="container">
<div class="page-section">
<h2 class="page-section__title text-center">Garage List</h2>
<?php include 'sectionincludes/systemtitle.php'; ?>

<form method="POST" class="search-form mb-4">
<div class="row">
<div class="col-md-9 mb-3 mb-md-0">
<input type="search" name="searchvalue" class="form-control" placeholder="Write search value here..">
</div>
<div class="col-md-3">
<input type="submit" name="search" value="Search" class="btn btn-secondary btn-block">
</div>
</div>
</form>

<hr>

<!-- Search Handler -->
<div class="row">
    <?php
        if (isset($_POST['search'])) {
            $searchvalue = $_POST['searchvalue'];
            $sqlgarage = "SELECT * FROM garage LEFT JOIN car ON garage.name = car.garagename WHERE province LIKE '%$searchvalue%' OR district LIKE '%$searchvalue%' OR sector LIKE '%$searchvalue%' OR village LIKE '%$searchvalue%' OR name LIKE '%$searchvalue%' OR phone LIKE '%$searchvalue%' OR email LIKE '%$searchvalue%' OR carname LIKE '%$searchvalue%' OR cartype LIKE '%$searchvalue%' OR carmodel LIKE '%$searchvalue%' OR aboutus LIKE '%$searchvalue%' ORDER BY id ASC";
        // }
        $resultgarage = $conn->query($sqlgarage);
        if ($resultgarage->num_rows > 0) {
        while ($rowgarage = $resultgarage->fetch_assoc())
     {
    ?>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-img-container">
                <img class="card-img-top" src="garageinfouploads/<?php echo $rowgarage['profileimg']; ?>" >
            </div>
            <div class="card-body">
                <h4 class="card-title capitalize"><b><?php echo $rowgarage["name"]; ?></b></h4>
                <p class="card-text">
                    Province: <?php echo ucfirst($rowgarage["province"]); ?><br>
                    District: <?php echo ucfirst($rowgarage["district"]); ?><br>
                    Sector: <?php echo ucfirst($rowgarage["sector"]); ?><br>
                    Village: <?php echo ucfirst($rowgarage["village"]); ?><br>
                    Phone: <?php echo ucfirst($rowgarage["phone"]); ?><br>
                    Email: <?php echo ucfirst($rowgarage["email"]); ?><br>
                    Sample: <?php echo ucfirst($rowgarage["carname"]). ' | '. ucfirst($rowgarage["cartype"]). ' | '. ucfirst($rowgarage["carmodel"]);; ?><br>
                </p>
                <?php
                    if (isset($_SESSION['customerid'])) {
                ?>
                <a href="./moreaboutgaragepage.php?garageid=<?php echo $rowgarage['id']; ?>" class="btn btn-primary">View More Info</a>
                <?php
                    } else {
                ?>
                <a href="#" data-toggle="modal" data-target="#loginmodal" class="btn btn-primary">Login for More Info</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    } else {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
        title: 'No Result Found',
        text: 'Press OK to close.',
        icon: 'info',
        confirmButtonText: 'OK',
        allowOutsideClick: false,
        closeOnClickOutside: false,
        closeOnEsc: false
        });
    </script>
    <?php
    }}
        else {
            $sqlgarage = "SELECT * FROM garage LEFT JOIN car ON garage.name = car.garagename ORDER BY id ASC  LIMIT 6";
        // }
        $resultgarage = $conn->query($sqlgarage);
        if ($resultgarage->num_rows > 0) {
        while ($rowgarage = $resultgarage->fetch_assoc()) {
    ?>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-img-container">
                <img class="card-img-top" src="garageinfouploads/<?php echo $rowgarage['profileimg']; ?>" >
            </div>
            <div class="card-body">
                <h4 class="card-title capitalize"><b><?php echo $rowgarage["name"]; ?></b></h4>
                <p class="card-text">
                    <?php echo ucfirst($rowgarage["province"]). " | " .  $rowgarage["district"] . " | " . $rowgarage["sector"]; ?><br>
                    Phone: <?php echo ucfirst($rowgarage["phone"]); ?><br>
                    Email: <?php echo ucfirst($rowgarage["email"]); ?><br>
                </p>
                <?php
                    if (isset($_SESSION['customerid'])) {
                ?>
                <a href="./moreaboutgaragepage.php?garageid=<?php echo $rowgarage['id']; ?>" class="btn btn-primary">View More Info</a>
                <?php
                    } else {
                ?>
                <a href="#" data-toggle="modal" data-target="#loginmodal" class="btn btn-primary">Login for More Info</a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    } else {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
        title: 'No Result Found',
        text: 'Press OK to close.',
        icon: 'info',
        confirmButtonText: 'OK',
        allowOutsideClick: false,
        closeOnClickOutside: false,
        closeOnEsc: false
        });
    </script>
    <?php
    }}
    ?>
</div>

</div>
</div>
</section>