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
    $shopUrl = shopPicture();

    ?>

    <div class="row mt-3">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="justify-content-center">
                <?php include('message.php'); ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Your Shop Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">

                            <div class="text-center mb-3">
                                <img src="assets/images/shops/shop_images/<?= basename($shopUrl['shop_image']); ?>" class="rounded img-thumbnail" alt="shop-default-img" id="shop-img-view">
                                <br>
                                <input accept="image/*" type="file" class="d-none" onchange="addShopPicView();" id="shop-img-select">
                                <label class="btn btn-success mt-3" for="shop-img-select">Select Image</label>
                            </div>

                            <div class="mb-3">
                                <label for="input-shop-name">Shop name :</label>
                                <input type="text" name="fname" id="input-shop-name" class="form-control"
                                    value="<?= $shopData['shop_name']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="input-shop-email">Email</label>
                                <input type="email" name="email" id="input-shop-email" class="form-control"
                                    value="<?= $shopData['shop_email']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="input-shop-mobile">Mobile</label>
                                <input type="text" name="mobile" id="input-shop-mobile" class="form-control"
                                    value="<?= $shopData['shop_mobile']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <button type="button" onclick="changeShopDetails()" class="btn btn-primary">Edit
                                    details</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
    </div>


    <?php

    include('includes/footer.php');