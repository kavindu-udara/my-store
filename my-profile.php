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
                        <h4 class="text-center">User Details</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['authenticated']) == TRUE) {
                            ?>
                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label for="input-fname">First Name</label>
                                    <input type="text" name="fname" id="input-fname" class="form-control" value='<?= $_SESSION['auth_user']['user_fname']; ?>' required>
                                </div>
                                <div class="mb-3">
                                    <label for="input-lname">Last Name</label>
                                    <input type="text" name="lname" id="input-lname" value='<?= $_SESSION['auth_user']['user_lname']; ?>' class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="input-email">Email</label>
                                    <input type="email" name="email" id="input-email" value='<?= $_SESSION['auth_user']['user_email']; ?>' class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="input-mobile">Phone</label>
                                    <input type="text" name="mobile" id="input-mobile" value='<?= $_SESSION['auth_user']['user_mobile']; ?>' class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" name="edit_profile">Save Changes</button>
                                </div>
                                <div class="mb-3">
                                    <a href="change-password.php">Change Password</a>
                                </div>
                            </form>
                            <?php
                        } else {
                            redirect('you need to login first!', 'login.php');
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-3"></div>

    </div>


    <?php
    include("includes/footer.php");
    ?>