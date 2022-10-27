

<html>

<head>
    <title>SRS pour voyage</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: linear-gradient(to right top, #564b64, #646382, #6e7da0, #7799bd, #7eb5d8);">
    <header>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </header>
<?php
echo '<script src="js/script.js"></script>';
include_once("class/DB_conn.php"); 
include_once("class/class_client.php"); 

$monvol = new client('','','',$_POST['mail'],'','','','');
$monvol -> afficher($_POST['mail']);




?>

</body>

</html>