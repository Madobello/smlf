<style type="text/css">
.header--bg{
<?php
$sql = "SELECT * FROM systeminfo   ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) 
{
?>
  background: url("systeminfouploads/<?php echo $row['logo']; ?>") no-repeat;
<?php
}
?>
  background-size: cover;
  position: relative;
  z-index: 1;

}
.header--bg:after{
  content: '';
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;

  z-index: -1;
  </style>


