<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuzzy Mata - Diagnosa</title>
    <?php require('inc/links.php'); ?>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="css/common.css" />

</head>

<body class="bg-light">
    <?php  require('inc/header.php') ?>
    <?php 
$top=$_GET['top'];
if(empty($top) || $top == ''){
    $on_top="home.php";
}
else{
    $on_top=$top;
include "$on_top";
//include "hasil_diagnosa.php"; 
}
?></p>


    </div>
        <div class="cleared"></div>
    </div>

    <div class="cleared"></div>
    </div>
    </div>

    <div class="cleared"></div>
    </div>
    </div>
    </div>
    <?php require ('inc/footer.php'); ?>
</body>

</html>