<footer id="footer" class="footer bgcolor">
<div class="container text-center">
<?php
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) 
{
?>
<h1 class="footer__title capitalize"><?php echo $row["name"];?></h1>
<ul class="footer__contact-information">
<li><a href="te:<?php echo $row["phone"];?>">Phone: <?php echo $row["phone"];?></a></li>
<li><a href="mailto:<?php echo $row["email"];?>">Email: <?php echo $row["email"];?></a></li>
<li><a href='#'><i class='material-icons'></i> Location: <?php echo $row["address"];?></a></li>
</ul>
<?php
}
} 
else
{
?>
<ul class="footer__contact-information">
<li><a href="#">Phone:</a></li>
<li><a href="#">Email:</a></li>
<li><a href="#"><i class="material-icons"></i> Location:</a></li>
</ul>
<?php
}
?>
</div>
<hr style="border: 0;border-top: 1px solid #525B60;display:block;margin-top: 40px;">
<div class="container text-center">
<p class="footer__paragraph"> Copyright &copy; <?php echo date("Y"); ?> By <a href="#" data-toggle="modal" data-target="#adminloginmodal"> Paul Marie Madeleine ISINGIZWE</a>, All Rights Reserved.</p>
</div>
</footer>
