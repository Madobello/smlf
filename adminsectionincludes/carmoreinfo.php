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
        <div class="col-md-2 mb-3">
            <input type="hidden" name="updategarageid" value="<?php echo $rowgarage["id"]; ?>" required>
            <input type="hidden" name="exname" value="<?php echo $rowgarage["name"]; ?>" >
            <div class="form-group">
                <label for="name">Garage Name:</label>
                <input type="text" id="name" name="garagename" class="form-control" placeholder="Enter garage name." value="<?php echo ucfirst($rowgarage["name"]); ?>" title="Enter garage name." required>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="carname">Car Name:</label>
                <input type="text" id="carname" name="carname" class="form-control" placeholder="Enter Sample Car e.g Prius" title="Enter sample car name" required>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="carbrand">Car Brand:</label>
                <select name="carbrand" id="" class="form-control">
                    <option value="Audi">Audi</option>
                    <option value="Bentley">Bentley</option>
                    <option value="BMW">BMW</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Dodge">Dodge</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="Hundai">Hyundai</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Kia">Kia</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Porsche">Porsche</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Tesla">Tesla</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volvo">Volvo</option>
                </select>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="cartype">Car Type:</label>
                <select name="cartype" id="" class="form-control">
                    <option value="Hybrid">Hybrid</option>
                    <option value="EV">EV</option>
                    <option value="Fuel">Fuel</option>
                </select>
            </div>
        </div>
        <div class="col-md-2 mb-3">
            <div class="form-group">
                <label for="type">Manual or Auto:</label>
                <select name="type" id="" class="form-control">
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                </select>
            </div>
        </div>
        <div class="col-md-1 mb-3">
            <div class="form-group">
                <label for="cartype">Submit</label>
                <input type="submit" name="addcar" class="btn btn-primary" value="Save">
            </div>
        </div>
    </div>
</form>

<?php
if(isset($_POST['addcar'])) {
    $carname = $_POST['carname'];
    $cartype = $_POST['cartype'];
    $garagename = $_POST['garagename'];
    $carbrand = $_POST['carbrand'];
    $type = $_POST['type'];
    $adminid = '5';

    $sql_insert = $conn -> query ("INSERT INTO `car`(`carname`, `cartype`, `carmodel`, `country`, `type`, `adminid`, `garagename`) VALUES ('$carname','$cartype','$carbrand','N/A','$type','$adminid','$garagename')");

    if ($sql_insert) {
        echo "<script>alert('Successfull Added')</script>";
    }
}
?>

<?php
}
?>

    <label for="table-head"><h2>Car Sample Added</h2></label>
    <div class="table-responsive">
        <table class="table table-hover">
        <thead>
            <tr>
            <th class="text-left">Car Name</th>
            <th class="text-left">Brand</th>
            <th class="text-left">Ignition Type</th>
            <th class="text-left">Type</th>
            <th class="text-left">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql_car = "SELECT * FROM `car` WHERE `garagename` = '$garageid' ORDER BY carid ASC";
            $result_car = $conn->query($sql_car);
            if ($result_car->num_rows > 0) {
                while ($rowcar = $result_car->fetch_assoc()) {
        ?>
        <tr>
            <td class="text-left"><?php echo $rowcar["carname"]; ?></td>
            <td class="text-left"><?php echo $rowcar["cartype"]; ?></td>
            <td class="text-left"><?php echo $rowcar["carmodel"]; ?></td>
            <td class="text-left"><?php echo $rowcar["Type"]; ?></td>
            <td class="text-left"><a href="./adminsectionincludes/delete_car.php?garageid=<?php echo $garageid; ?>&carid=<?php echo $rowcar["carid"]; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="6" class="text-center">
                <script>
                    swal({
                        title: "No result found.",
                        text: "Press Ok to close.",
                        icon: 'info',
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        allowOutsideClick: false,
                    });
                </script>
            </td>
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
</div>
</div>
</section>