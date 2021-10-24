<?php include '../config.php' ?>

<html>

<head>
    <title>EASE</title>
    <?php echo BASE_RESOURCES ?>
    <link rel='stylesheet' href='<?php echo ROOT ?>/.res/css/auth.css?<?php echo $unixTime ?>'>
</head>

<body>
    <?php include '.layout/header.php' ?>
    <div class="page-backdrop grid-x">
        <div class="cell large-auto">
            <div class="login-container">
                <form action="/" method="POST">
                    <div>Log In</div>
                    <input type="text" placeholder="Phone number / Email">
                    <input type="password" placeholder="Password">
                    <a href="forgotpassword/">Forgot Password</a>
                    <button>Log In</button>
                    <a href="register/?registerAs=member">Register Now</a>
                    <div>Or log in with</div>
                </form>
            </div>
        </div>
        <div class="login-banner cell large-auto show-for-large">
            <div>Ease</div>
            <div>Tagline for Ease</div>
        </div>
    </div>
</body>

</html>