<?php
    include("testconn.php");
    session_start();
    if(isset($_POST['login']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $qry = "select * from `librarian` where email = '$email'";
        $res = mysqli_query($conn,$qry);
        $row = mysqli_fetch_assoc($res);
        if($email == "")
        {
            echo '<div id="snackbar">Enter Email</div>';
        }
        else if($email == @$row['email'])
        {
            if($password == "")
            {
                echo '<div id="snackbar">Enter password</div>';
            }
            else if($password != $row['password'])
            {
                echo '<div id="snackbar">Wrong password</div>';
            }
            else
            {
                $_SESSION['email'] = $row['email'];
                header("location:viewbook.php");
            }
        }
        else
        {
            $email = "";
            echo '<div id="snackbar">Email Not registered</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="images/fevicon.jpg">
    <style>
    .form {
        margin: 70px;
    }

    #a {
        margin-top: 8px;
        margin-bottom: 8px;
        margin-left: 2px;
        font-size: 18px;
        font-weight: bold;
    }

    #b {
        margin-top: 10px;
        margin-bottom: 10px;
        text-align: center;
        color: black;
        font-weight: bold;
    }

    #c {
        padding: 20px 55px;
        border-radius: 15px;
        border: 1px black solid;
        background: red;
    }

    #btn {
        margin-top: 20px;
        width: 25%;
    }

    #snackbar {
        visibility: hidden; 
        min-width: 250px; 
        margin-left: -125px; 
        background-color: green; 
        color: #fff; 
        text-align: center; 
        border-radius: 10px; 
        font-weight: 700;
        padding: 16px; 
        position: fixed; 
        left: 50%; 
        bottom: 30px; 
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }
    </style>
</head>

<body>
    <?php include("header.php");?>
    <div class="container form">
        <div class="col-lg-8 col-md-8 m-auto d-block bg-light" id="c">
            <h1 id="b">Librarian Login</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label id="a" class="text-primary">Email : </label>
                    <input type="email" id="email" class="form-control" placeholder="Enter email" value="<?php echo @$email;?>" name="email">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Password : </label>
                    <input type="password" id="password" class="form-control" placeholder="Enter password"
                        name="password">
                </div>
                <div class="text-center"><input type="submit" class="btn btn-primary" id="btn" name="login"
                        value="Login"></div>
            </form>
        </div>
    </div>
    <?php include("footer.php");?>
    <script type="text/javascript">
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function() {
        x.className = x.className.replace("show", "");
    }, 2500);
    </script>
</body>

</html>