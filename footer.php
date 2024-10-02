<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>
    <style type="text/css">
    .footer_menu {
        margin-bottom: 5px;
    }

    .footer_menu a {
        text-decoration: none;
        pointer-events: all;
    }

    .footer_menu:hover,.active {
        font-weight: 500;
        color: yellow;
    }

    #footer_hr {
        width: 80px;
        background-color: #ffffff;
        height: 2px;
    }

    #footer_detail {
        margin-right: 10px;
        margin-left: 0px;
    }

    .footer_deta {
        pointer-events: all;
        cursor: pointer;
    }

    .footer_deta:hover {
        color: yellow;
    }

    .footer_div {
        pointer-events: none;
    }

    .footer_icon {
        height: 50px;
        width: 100px;
    }
    </style>
    <title></title>
</head>

<body>
    <div class="m-1">
        <footer class="text-center text-lg-start text-white p-2 bg-dark">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 footer_div">
                        <h6 class="text-uppercase fw-bold">Library Management System</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" id="footer_hr" />
                        <p>
                            Members of our library are invited to take advantage of a wealth of affordable cultural and
                            recreational offerings, including concerts, plays, art and photo shows, and lectures. The
                            college has attracted
                            world-renowned speakers, including President Clinton.
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-4 col-xl-2 mx-auto mb-4 footer_div">
                        <h6 class="text-uppercase fw-bold">Menu</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" id="footer_hr" />
                        <div class="footer_menu active"><a href="index.php" class="text-white"><span><i
                                        class="fas fa-home" id="footer_detail"></i></span>Home</a></div>
                        <div class="footer_menu active"><a href="login1.php" class="text-white"><span
                                    class="footer_icon"><i class="fas fa-sign-in"
                                        id="footer_detail"></i></span>Login</a></div>
                        <div class="footer_menu active"><a href="registration.php" class="text-white"><span
                                    class="footer_icon"><i class="fas fa-user-plus"
                                        id="footer_detail"></i></span>Registration</a></div>
                        <div class="footer_menu active"><a href="books.php" class="text-white"><span
                                    class="footer_icon"><i class="fas fa-book" id="footer_detail"></i></span>Books</a>
                        </div>
                        <div class="footer_menu active"><a href="timing.php" class="text-white"><span
                                    class="footer_icon"><i class="fas fa-clock" id="footer_detail"></i></span>Timing</a>
                        </div>
                        <div class="footer_menu active"><a href="contactus.php" class="text-white"><span
                                    class="footer_icon"><i class="fas fa-phone" id="footer_detail"></i></span>Contact
                                us</a></div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-xl-3 mx-auto mb-md-0 mb-4 footer_div">
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-2 mt-0 d-inline-block mx-auto" id="footer_hr" />
                        <p class="footer_deta"><i class="fas fa-home mr-3" id="footer_detail"></i> Katargam Surat-395004
                        </p>
                        <p class="footer_deta"><i class="fas fa-envelope mr-3" id="footer_detail"></i> library@gmail.com
                        </p>
                        <p class="footer_deta"><i class="fas fa-phone mr-3" id="footer_detail"></i> + 0261 242 7726</p>
                        <p class="footer_deta"><i class="fas fa-print mr-3" id="footer_detail"></i> +91 11 25754365</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>