<div id="hero" class="header__content d-flex align-items-center justify-content-center text-center" >
<div class="overlay bg-dark opacity-70 w-100 h-100 d-flex flex-column align-items-center justify-content-center">
<?php
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
?>
<h1 class="header__content__title text-white text-uppercase mb-4 roadbgcolor"><?php echo htmlspecialchars($row["name"]); ?></h1>
<?php
}
?>
<ul class="list-unstyled header__content__sub-title text-white">
<?php
$count = 1;
$sqlgarageservice = "SELECT DISTINCT(servicename) FROM garageservice ORDER BY servicename ASC LIMIT 3 ";
$resultgarageservice = $conn->query($sqlgarageservice);
while ($rowgarageservice = $resultgarageservice->fetch_assoc()) {
?>
<li class="capitalize mb-2"><span class="mx-2">—</span> <?php echo htmlspecialchars($rowgarageservice["servicename"]); ?></li>
<?php
$count++;
}
?>
</ul>
</div>
<!-- <div class="roadbgcolor text-white w-100 text-center mt-3">
<p><span class="float-left ml-4"><<<< Left side</span></p>
<hr class="navborder border-light w-50 mx-auto">
<p><span class="float-right mr-4">Right side >>>></span></p>
</div> -->
</div>
