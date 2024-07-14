<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Qfs-firm.com">
    <meta name="description" content="Qfs-firm.com">
    <meta name="keywords" content="Token and Staking Platform">
    <meta property="og:image" content="https://qfs-firm.com/img/logo.jpg">
    <meta property="og:url" content="/login">
    <meta property="og:type" content="article">
    <meta property="og:description" content="Token and Staking Platform">
    <meta property="og:image" content="https://www.qfs-firm.com/img/logo.jpg">
    <link href='https://www.qfs-firm.com/img/logo.jpg' rel='image_src'>
    <link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/fonts.css">
    <link rel="stylesheet" href="fonts/icons-alipay.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="styles/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <title>Account Login | QFS FIRM</title>
    <style>
        h1, h2, h3, h4, h5, p { /*font-size: 100% !important;*/ }
        .form-group { /*background:#f9fbfc;*/ padding: 12px; }
        .login_error { background: #991d00; color: white; font-size: 60%; height: 40px; padding: 5px; border-radius: 100px; text-align: center; }
        #wrap { white-space: pre-wrap; }
        .text-white, .dtr-styled-heading, .dtr-img-feature-heading, label { color: white !important; }
        .fa-arrow-alt-circle-right { margin-top: 4px !important; }
        label { color: black !important; font-weight: bold; }
    </style>
    <script type="text/javascript">
        // window.location.href = "logout.php?"
    </script>
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '2924ddeb399034af673a7042631ae2c70526ef26';
        window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>
</head>
<body>
<div class="container">
    <br><br>
    <div class="login-box">
        <div class="card card-outline">
            <div class="card-body">
                <h4 class="gold"></h4>
                <div class="mt-7 login-section">
                    <div class="tf-container">
                        <section class="section-b-space">
                            <div class="custom-container">
                                <div class="currency-transfer">
                                    <form class="auth-form crypto-form" action="" method="post">
                                        <div class="form-group">
                                            <center>
                                                <div style="width: 130px;">
                                                    <img src="img/logo.png" style="width:30%">
                                                </div>
                                                <br>
                                                <div class="group-input">
                                                    <h1 style="text-align:left !important">Email Address</h1>
                                                    <input type="text" placeholder="example@gmail.com" name="user" required>
                                                </div>
                                                <div class="group-input auth-pass-input last">
                                                    <h1 style="text-align:left">Password</h1>
                                                    <input type="password" class="password-input" name="pass" placeholder="Password" required>
                                                </div>
                                                <a href="forgot_password.html" class="auth-forgot-password mt-3">Forgot Password?</a>
                                                <button type="submit" class="tf-btn accent large" name="submit">Log In</button>
                                            </center>
                                        </div>
                                    </form>
                                    <br>
                                    <p class="mb-9 fw-3 text-center">Already have an Account? <a href="register.php" class="auth-link-rg">Sign up</a></p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/password-addon.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script type="text/javascript" src="javascript/init.js"></script>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Database connection
    $servername = "dgh.h.filess.io";
    $username_db = "QFSFIRM_suchsteel";
    $password_db = "fb6ae4d388868bbfa7cdaebd814b5f2515e51c06";
    $dbname = "QFSFIRM_suchsteel";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && $pass == $hashed_password) { // Compare plain text passwords
        header("Location: account.html");
        exit();
    } else {
        echo '<div class="login_error">Invalid email or password.</div>';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

</body>
</html>

<?php
ob_end_flush();
?>
