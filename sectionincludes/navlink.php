<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php
$sql = "SELECT * FROM systeminfo ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) 
{
?>
<title><?php echo $row["name"];?></title>
<?php
}
?>
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="stylesheet" href="assets/fonts/flat-icon/flaticon.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="test/style.css">
<script src="js/sweetalert.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en', // The language of your page
        includedLanguages: 'en,es,fr,de,it,pt,zh-CN,ja,ko,ru,ar,rw', // Include additional languages here
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>
<?php
include 'herobackground.php';
?>