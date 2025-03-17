<?php
    if (isset($_POST['login'])) {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $selectfromcust=$conn->query("SELECT * FROM `garage` WHERE `phone`='$username' AND password='$password'");
        $check=mysqli_num_rows($selectfromcust);
        
        if($check==1) {
            $rowcus=mysqli_fetch_array($selectfromcust); 
            $userid=$rowcus['id'];
            $garagename=$rowcus['name'];
            $_SESSION['loginuserid']=$userid;
            $_SESSION['garagename']=$garagename;

            if(isset($_SESSION['loginuserid'])) {
?>

<script>
swal({
    title: "Welcome.",
    text: "Press Ok, to continue.",
    icon: 'success',
    closeOnClickOutside: false,
    closeOnEsc: false,
    allowOutsideClick: false,
})
.then(function (isConfirm) {
    if (isConfirm) {
        window.location = 'dashboard-garage.php';
    }
});
</script>
<?php } } else { ?>
<script>
swal({
    title: "Incorect credential.",
    text: "Press Ok, to close.",
    icon: 'warning',
    closeOnClickOutside: false,
    closeOnEsc: false,
    allowOutsideClick: false,
});
</script>
<?php } } ?>