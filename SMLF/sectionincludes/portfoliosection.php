<?php 
include 'sectionincludes/systemtitle.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to fetch distinct values for dropdowns
function fetchDistinctValues($conn, $column, $table) {
    $query = "SELECT DISTINCT $column FROM $table WHERE $column IS NOT NULL AND $column != '' ORDER BY $column ASC";
    $result = $conn->query($query);

    if (!$result) {
        die("Error fetching $column: " . $conn->error);
    }

    $values = [];
    while ($row = $result->fetch_assoc()) {
        $values[] = $row[$column];
    }
    return $values;
}

// Fetch location-related data from the `garage` table
$provinces = fetchDistinctValues($conn, 'province', 'garage');
$districts = fetchDistinctValues($conn, 'district', 'garage');
$sectors = fetchDistinctValues($conn, 'sector', 'garage');
$villages = fetchDistinctValues($conn, 'village', 'garage');

// Fetch car-related data from the `garageservice` table
$carNames = fetchDistinctValues($conn, 'carname', 'garageservice');
$carTypes = fetchDistinctValues($conn, 'cartype', 'garageservice');
$tons = fetchDistinctValues($conn, 'ton', 'garageservice');

// Initialize search conditions
$whereConditions = [];
$selectedValues = [];

foreach (["province", "district", "sector", "village", "carname", "cartype", "ton", "description", "servicename"] as $field) {
    if (!empty($_POST[$field])) {
        $selectedValues[$field] = $_POST[$field];
        $whereConditions[] = "$field LIKE '%" . $conn->real_escape_string($_POST[$field]) . "%'";
    } else {
        $selectedValues[$field] = "";
    }
}

// Handle the 'car_issue' search input for both 'servicename' and 'description'
if (!empty($_POST['car_issue'])) {
    $carIssue = $conn->real_escape_string($_POST['car_issue']);
    $whereConditions[] = "(garageservice.servicename LIKE '%$carIssue%' OR garageservice.description LIKE '%$carIssue%')";
}

$query = "SELECT garage.*, garageservice.servicename, garageservice.description, garageservice.carname, garageservice.cartype, garageservice.ton, garage.profileimg 
          FROM garage 
          JOIN garageservice ON garage.name = garageservice.garagename";
if (!empty($whereConditions)) {
    $query .= " WHERE " . implode(" AND ", $whereConditions);
}
$query .= " ORDER BY garage.id ASC LIMIT 6";

$resultgarage = $conn->query($query);

if (!$resultgarage) {
    die("Error fetching garages: " . $conn->error);
}
?>

<section id="portfolio" class="adminmain py-5">
    <div class="container">
        <div class="page-section">
            <h2 class="page-section__title text-center">Garage List</h2>
            <?php include 'sectionincludes/systemtitle.php'; ?>

            <form method="POST" class="search-form mb-4">
                <div class="row">
                    <?php 
                    $filters = [
                        "province" => $provinces,
                        "district" => $districts,
                        "sector" => $sectors,
                        "village" => $villages,
                        "carname" => $carNames,
                        "cartype" => $carTypes,
                        "ton" => $tons
                    ];
                    
                    foreach ($filters as $field => $options) { ?>
                        <div class="col-md-3 mt-2">
                            <select name="<?php echo $field; ?>" class="form-control">
                                <option value="">Select <?php echo ucfirst($field); ?></option>
                                <?php foreach ($options as $option) { 
                                    // Ensure the selected value is handled correctly, even when empty.
                                    $selected = (isset($selectedValues[$field]) && $selectedValues[$field] == $option) ? 'selected' : '';
                                    echo "<option value='$option' $selected>$option</option>"; 
                                } ?>
                            </select>
                        </div>
                    <?php } ?>
                    <div class="col-md-3 mt-2">
                        <input type="text" name="car_issue" class="form-control" placeholder="Enter car issue" value="<?php echo htmlspecialchars($selectedValues['car_issue'] ?? ''); ?>">
                    </div>
                    <div class="col-md-3 mt-2">
                        <input type="submit" value="Search" class="btn btn-secondary btn-block">
                    </div>
                </div>
            </form>

            <hr>

            <div class="row">
                <?php while ($rowgarage = $resultgarage->fetch_assoc()) { ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="garageinfouploads/<?php echo !empty($rowgarage['profileimg']) ? htmlspecialchars($rowgarage['profileimg']) : 'default.jpg'; ?>" class="card-img-top" alt="Garage Image">
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo htmlspecialchars($rowgarage['name']); ?> </h5>
                                <p class="card-text"><strong>Service:</strong> <?php echo htmlspecialchars($rowgarage['servicename']); ?></p>
                                <p class="card-text"><strong>Location:</strong> <?php echo htmlspecialchars($rowgarage['province'] . ', ' . $rowgarage['district'] . ', ' . $rowgarage['sector'] . ', ' . $rowgarage['village']); ?></p>
                                <p class="card-text"><strong>Car Type:</strong> <?php echo htmlspecialchars($rowgarage['cartype']); ?></p>
                                <p class="card-text"><strong>Ton:</strong> <?php echo htmlspecialchars($rowgarage['ton']); ?></p>
                                <p class="card-text"><strong>Description:</strong> <?php echo htmlspecialchars($rowgarage['description']); ?></p>
                                <div class="text-center">
                                    <?php if (isset($_SESSION['customerid'])) { ?>
                                        <a href="./moreaboutgaragepage.php?garageid=<?php echo $rowgarage['id']; ?>" class="btn btn-primary">View More Info</a>
                                    <?php } else { ?>
                                        <a href="#" data-toggle="modal" data-target="#loginmodal" class="btn btn-primary">Login for More Info</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                
                <?php if ($resultgarage->num_rows === 0) { ?>
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
                <?php } ?>
            </div>
        </div>
    </div>
</section>

