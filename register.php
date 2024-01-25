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
    include('config/app.php');
    include('codes/authentication_code.php');
    include('includes/header.php');
?>

<div class="row mt-3">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="justify-content-center">
            <?php include('message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Register</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="input-fname">First name</label>
                            <input type="text" name="fname" id="input-fname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-lname">Last name</label>
                            <input type="text" name="lname" id="input-lname" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-email">Email</label>
                            <input type="email" name="email" id="input-email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-mobile">Mobile</label>
                            <input type="text" name="mobile" id="input-mobile" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="input-password">Password</label>
                            <input type="password" name="password" id="input-password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="input-cpassword">Confirm Pasword</label>
                            <input type="password" name="cpassword" id="input-cpassword" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
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