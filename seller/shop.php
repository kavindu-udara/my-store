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
    $shopData = getShopData();

    ?>
    <div class="row mt-3">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="justify-content-center">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Shop Details</h4>
                    </div>
                    <div class="card-body">



                        <div class="seller-info-form">

                            <div class="text-center">
                                <img src="assets/images/shops/shop_default_imgs/default_shop_img.png" id="shop-img-view" class="rounded img-thumbnail" alt="shop-img">
                                <br>
                                <label class="btn btn-success mt-2" for="shop-img-select">add image</label>
                                <input type="file" class="form-control d-none"  accept="image/*" id="shop-img-select" onchange="addShopPicView()">
                            </div>

                            <div class="mb-3">
                                <label for="input-shop-name">Shop Name</label>
                                <input type="text" name="fname" id="input-shop-name" class="form-control"
                                    value='<?= $shopData['shop_name']; ?>' required >
                            </div>


                            <div class="mb-3">
                                <label for="input-shop-email">Shop email :</label>
                                <input type="email" name="nic" id="input-shop-email" class="form-control"
                                    value='<?= $shopData['shop_email']; ?>' required >
                            </div>
                            <div class="mb-3">
                                <label for="input-shop-mobile">Shop Mobile :</label>
                                <input type="tel" name="input-shop-mobile" id="input-shop-mobile" class="form-control"
                                    value='<?= $shopData['shop_mobile']; ?>' required >
                            </div>

                            <div class="mb-3">
                                <button type="button" class="btn btn-primary">Edit details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>

    </div>

    <?php

    include('includes/footer.php');