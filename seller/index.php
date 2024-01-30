<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php

    include('../config/app.php');
    include('codes/authenticationCode.php');
    include('includes/header.php');

    ?>

    <h1>seller home</h1>

    <?php
    if (isset($_SESSION['seller_verify'])) {
        if ($_SESSION['seller_verify'] == '0') {
            ?>
            <p>please fill the informatin to become a seller</p>

            <a href="fillSellerInfo.php">fill info</a>

            <?php
        } else if ($_SESSION['seller_verify'] == '1') {
            ?>
                <p>your details is under review</p>
                <p>It's takes some days two check your submitted details and verify</p>
                <a href="#">contact customer support</a>
            <?php
        } else if ($_SESSION['seller_verify'] == '2') {
            ?>
                    <p>your seller account is verified !</p>
                    <p>now time to make your shop</p>
                    <a href="#">make shop</a>
                    <h1>sell some products</h1>
            <?php
        }
    }
    ?>

    <?php

    include('includes/footer.php');