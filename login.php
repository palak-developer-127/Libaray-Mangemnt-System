<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="images/fevicon.jpg">
    <style>
        .login {
            width: 360px;
            margin: auto;
            font-family: 'Comfortaa', cursive;
        }

        .form {
            position: relative;
            background: #000000;
            border-radius: 10px;
            max-width: 360px;
              margin: 60px auto 60px;
            padding: 35px;
            text-align: center;
        }

        .form input {
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            border-radius: 5px;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }

        p {
            margin-top: 0px;
            color: white;
            font-size: 20px;
        }

        .form input:focus {
            background: #dbdbdb;
        }

        .form button {
            margin-top: 20px;
            background: #4b6cb7;
            width: 50%;
            border-radius: 5px;
            padding: 15px;
            color: #FFFFFF;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-light">
    <?php include("header.php");?>
    <div class="login">
        <div class="form">
            <form class="login-form">
                <p>Login form</p>
                <input type="text" placeholder="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                    required />
                <input type="password" placeholder="password" required />
                <button>Login</button>
            </form>
        </div>
    </div>
    <?php include("footer.php");?>
</body>

</html>