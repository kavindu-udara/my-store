<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
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
                        <h4 class="text-center">Fill this details to verify as a Seller</h4>
                    </div>
                    <div class="card-body">
                        <div class="seller-info-form">
                            <div class="mb-3">
                                <label for="input-full-name">Full Name :</label>
                                <input type="text" name="fname" id="input-full-name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="input-nic">NIC No :</label>
                                <input type="text" name="nic" id="input-nic" class="form-control" pattern="[0-9]{7}[vV]"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="input-bid">Birthday :</label>
                                <input type="date" name="birthdate" id="input-bid" class="form-control"
                                    value="2003-09-09" required>
                            </div>

                            <div class="mb-3">
                                <label for="input-addr">Address :</label>
                                <input type="text" name="address" id="input-addr" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="input-ppict">Your Passport Size Picture :</label>
                                <input type="file" name="ppic" id="input-ppict" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="input-nicfpic">NIC front Picture :</label>
                                <input type="file" name="NICfront" id="input-nicfpic" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="input-nicbpic">NIC Back Picture :</label>
                                <input type="file" name="NICback" id="input-nicbpic" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="input-shop-name">Name for your shop :</label>
                                <input type="text" name="shopname" id="input-shop-name" class="form-control"
                                    minlength="5" maxlength="15" required>
                            </div>
                            <div class="mb-3">
                                <label for="input-shop-email">add email for your shop :</label>
                                <input type="email" name="shopemail" id="input-shop-email" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="input-shop-mobile">add phone no for your shop :</label>
                                <input type="tel" name="shopmobile" id="input-shop-mobile" class="form-control"
                                    required>
                            </div>

                            <!-- progress bar -->
                            <div class="progress" role="progressbar" aria-label="Animated striped example"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                    id="progress-bar-ppic" style="width: 0%">
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="uploadFileTest()" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>

    </div>




    <div class="mb-3">
        <label for="input-ppic">Your Passport Size Picture fhtg:</label>

        <input type="file" id="input-ppic" class="form-control" required>

        <button type="button" class="btn btn-primary" onclick="uploadFileTest()">submit picture</button>


    </div>






    <?php
    include("includes/footer.php");
    ?>