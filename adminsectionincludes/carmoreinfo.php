<section id="adminmain" class="adminmain">
<?php
include 'phpincludes/updategarageinfo.php';
?>
<?php
include 'phpincludes/deletegarage.php';
?>
<div class="container">
<div class="page-section">
<h2 class="page-section__title">Be Seen | Add Sample Car types, Mode</h2>
<?php
include 'adminsectionincludes/systemtitle.php';
?>

<?php
$garageid = $_GET['garageid'];
$sqlgarage = "SELECT * FROM garage WHERE name='$garageid'";
$resultgarage = $conn->query($sqlgarage);
while ($rowgarage = $resultgarage->fetch_assoc()) {
?>

<form method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="col-md-6 mb-3">
        <input type="hidden" name="updategarageid" value="<?php echo $rowgarage["id"]; ?>" required>
        <input type="hidden" name="exname" value="<?php echo $rowgarage["name"]; ?>" >
        <div class="form-group">
            <label for="name">Garage Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter garage name." value="<?php echo ucfirst($rowgarage["name"]); ?>" title="Enter garage name." required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="carname">Car name:</label>
                <input type="text" id="carname" name="carname" class="form-control" placeholder="Enter Sample Car e.g Prius" title="Enter sample car name" required><br>

                <select name="car type" id="" class="form-control">
                    <option value=""></option>
                </select>
                <input type="text" id="cartype" name="cartype" class="form-control" placeholder="Enter Sample Car e.g Prius" title="Enter sample car type" required><br>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $rowgarage["email"]; ?>" placeholder="Enter garage email." title="Enter garage email." >
            </div>
        </div>
    </div>

<div class="form-group">
<label for="profileimg">Profile Image:</label>
<input type="file" id="profileimg" name="profileimg" class="form-control" placeholder="Select garage profile." title="Select garage profile image." accept="image/*">
<img src="garageinfouploads/<?php echo $rowgarage['profileimg']; ?>" alt="Current Profile" class="img-fluid mt-2" style="max-width: 220px;">
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
<label for="maplink">Map Link:</label>
<input type="text" id="maplink" name="maplink" value="<?php echo $rowgarage["maplink"]; ?>" class="form-control" placeholder="Enter garage maplink" title="Enter garage maplink" >
</div>
<div class="form-group">
<label for="aboutus">About Garage:</label>
<textarea id="aboutus" class="form-control"  name="aboutus" rows="5" placeholder="Write garage description......."><?php echo $rowgarage["aboutus"]; ?></textarea>
</div>
<input type="hidden" id="adminid" name="adminid" class="form-control" value="<?php echo $userid; ?>" placeholder="Admin id" title="Admin id." required>
</div>
</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xl-6">
<div class="text-center mb-3">
<input type="submit" name="updategarageinfo" class="btn btn-primary" value="Save Changes">
</div>
</div>
<div class="col-md-6 col-sm-6 col-xl-6">
<a class="btn btn-primary" href="registeredgaragepage.php">View all info</a>
</div>
    
</div>
</form>
<form method="POST">
<div class="text-center">
<input type="hidden" required name="deletegarageid" value="<?php echo $rowgarage["id"]; ?>">
<button type="submit" name="deletegarage" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?');">Delete</button>
</div>
</form>

<?php
}
?>
</div>
</div>
</section>