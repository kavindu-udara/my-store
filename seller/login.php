<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php
    include('../config/app.php');
    include('codes/authenticationCode.php');
    include('includes/header.php');
?>

<div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="justify-content-center">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Seller Login</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                        <div class="mb-3">
                            <label for="input-email">Email</label>
                            <input type="email" name="email" id="input-email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-password">Password</label>
                            <input type="password" name="password" id="input-password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="seller_login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3"></div>

</div>


<?php
    include("includes/footer.php");
?>