<?php include '../../config.php';
if (!isset($_GET['registerAs']) || ($_GET['registerAs'] != USER_TYPE_MEMBER) && $_GET['registerAs'] != USER_TYPE_VENDOR) {
    $_GET['registerAs'] = USER_TYPE_MEMBER;
}
?>

<html>

<head>
    <title>EASE</title>
    <?php echo BASE_RESOURCES ?>
    <link rel='stylesheet' href='<?php echo ROOT ?>/.res/css/auth.css?<?php echo $unixTime ?>'>
</head>

<body>
    <?php include '../.layout/header.php' ?>
    <div class="page-backdrop grid-x">
        <div class="cell large-auto">
            <?php if ($_GET['registerAs'] == USER_TYPE_MEMBER) { ?>
                <div class="register-member-container">
                    <form action="/" method="POST">
                        <div>Register <span>as member</span></div>
                        <input type="text" placeholder="Full Name">
                        <input type="email" placeholder="Email">
                        <input type="tel" placeholder="Phone Number">
                        <input type="password" placeholder="Password">
                        <input type="password" placeholder="Confirm Password">
                        <a href="?registerAs=vendor">Register as Vendor</a>
                        <button href="register/">Register</button>
                        <a href="/">Log In</a>
                    </form>
                </div>
            <?php } ?>

            <?php if ($_GET['registerAs'] == USER_TYPE_VENDOR) { ?>
                <div class="register-vendor-container">
                    <form action="/" method="POST">
                        <div>Register <span>as vendor</span></div>
                        <input type="text" placeholder="Full Name">
                        <input type="email" placeholder="Email">
                        <input type="tel" placeholder="Phone Number">
                        <input type="password" placeholder="Password">
                        <input type="password" placeholder="Confirm Password">
                        <input type="text" placeholder="Referral Code">
                        <a href="?registerAs=member">Register as Member</a>
                        <button href="register/">Register</button>
                        <a href="/">Log In</a>
                    </form>
                </div>
            <?php } ?>
        </div>
        <div class="login-banner cell large-auto show-for-large">
            <div>Ease</div>
            <div>Tagline for Ease</div>
        </div>
    </div>
</body>

</html>