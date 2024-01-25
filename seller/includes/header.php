<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">My Store</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav d-flex">
                <?php
                if (isset($_SESSION['seller_auth']) == TRUE) {
                    ?>
                    <li class="nav-item">
                        <form action="" method="POST">
                            <button type="submit" class="btn btn-secondary" name="user_profile_btn"><?= $_SESSION['auth_seller']['seller_fname']; ?></button>
                            <button type="submit" class="btn btn-secondary" name="seller_logout_btn">Logout</button>
                        </form>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>