<section id="adminmain"class="adminmain">
<div class="container">
<div class="page-section">
<h2 class="page-section__title">MAIN DASHBOARD</h2>
<?php
include 'adminsectionincludes/systemtitle.php';
?>
<?php
include 'adminsectionincludes/adminoverview.php';
?>
<div class="row gutters-40">
<?php
$count=1;
$sqlgarage = "SELECT * FROM garage ORDER BY id ASC ";
if(!isset($_SESSION['garagename']))
 {
$sqlgarage = "SELECT * FROM garage ORDER BY id ASC";
}
else
{
$sqlgarage = "SELECT * FROM garage WHERE id='$userid'";
}
$resultgarage = $conn->query($sqlgarage);
if ($resultgarage->num_rows > 0) 
{
while ($rowgarage = $resultgarage->fetch_assoc()) 
{
?>

<div class="row">
    <div class="col-md-4">
        <div class="thumbnail text-center">
            <img class="img-responsive" src="garageinfouploads/<?php echo $rowgarage['profileimg']; ?>"  style="height: 220px;">
            <a href="#"><h4 class="adminmain__single__title capitalize"><?php echo $rowgarage["name"];?></h4></a>
            <p class="adminmain__single__paragraph"><a href="garagemoreinfopage.php?garageid=<?php echo $rowgarage['id']; ?>" class="btn btn-primary">READ MORE...</a></p>
        </div>
        
    </div>
    <div class="col-md-4">
        <p><a href="carmoreinfopage.php?garageid=<?php echo $rowgarage['name']; ?>" class="btn btn-primary">Register Associate Car Services</a></p>
    </div>
</div>
<?php
$count++;
}
}
else
{
?>
<label> result found..</label>
<?php
}
?>
</div>
</div>
</div>
</section>