<?php
    include("testconn.php");
    if(isset($_POST['register']))
    {
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $qualification = @$_POST['qualification'];
        $phone = $_POST['phone'];
        $gender = $_POST['optradio'];

        $number = preg_match('@[0-9]@', $password);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if($name == "")
        {
            echo '<div id="snackbar">Enter first name</div>';
        }
        else if($lname == "")
        {
            echo '<div id="snackbar">Enter last name</div>';
        }
        else if($phone == "")
        {
            echo '<div id="snackbar">Enter mobile number</div>';
        }
        else if(!preg_match('/^[6-9]{1}[0-9]{9}+$/', $phone))
        {
            $phone = "";
            echo '<div id="snackbar">Enter valid mobile number</div>';
        }
        else if($email == "")
        {
            echo '<div id="snackbar">Enter email</div>';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email = "";
            echo '<div id="snackbar">Enter valid emailid</div>';
        }
        else if($qualification == "")
        {
            echo '<div id="snackbar">Select Qualification</div>';
        }
        else if($qualification == "")
        {
            echo '<div id="snackbar">Select Qualification</div>';
        }
        else if($password == "")
        {
            echo '<div id="snackbar">Enter password</div>';
        }
        else if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars)
        {
            $password = "";
            $cpassword = "";
            echo '<div id="snackbar">Enter Strong password</div>';
        }
        else if($cpassword == "") 
        {
            echo '<div id="snackbar">Enter Confirm password</div>';
        }
        else if($password != $cpassword)
        {
            $cpassword = "";
            echo '<div id="snackbar">Enter both password sem</div>';
        }
        else
        {
            // echo $qualification;
            // echo '<div id="snackbar">All correct</div>';
            $qry = "SELECT `email` FROM `librarian`";
            $res = mysqli_query($conn,$qry);

            $qry1 = "SELECT `mobile` FROM `librarian`";
            $res1 = mysqli_query($conn,$qry1);

            if(mysqli_num_rows($res) > 0)
            {
                echo '<div id="snackbar">Email Already exist</div>';
                $email = "";
                $name = "";
                $password = "";
                $cpassword = "";
                $phone = "";
                $qualification = "";
            }
            else if(mysqli_num_rows($res1) > 0)
            {
                echo '<div id="snackbar">Mobile number Already exist</div>';
                $email = "";
                $name = "";
                $password = "";
                $cpassword = "";
                $phone = "";
                $qualification = "";
            }
            else
            {
                $qry2 = "INSERT INTO `librarian`(`name`, `lname`, `gender`, `mobile`, `email`, `education`, `password`) VALUES ('$name','$lname','$gender','$phone','$email','$qualification','$password')";
                $res2 = mysqli_query($conn,$qry2);

                if($res2)
                {
                    header("location: login1.php");
                }
                else
                {
                    echo '<div id="snackbar">Not registered</div>';
                    $email = "";
                    $name = "";
                    $password = "";
                    $cpassword = "";
                    $phone = "";
                    $qualification = "";
                }
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    </script>
    <link rel="icon" href="images/fevicon.jpg">
    <style>
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
        width: 25%;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <?php include("header.php");?>
    <div class="container form">
        <div class="col-lg-8 col-md-8 col-sm-12 m-auto d-block bg-light" id="c">
            <h1 id="b">Librarian Registration</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label id="a" class="text-primary">First name : </label>
                    <input type="text" id="name" class="form-control" placeholder="Enter first name" name="name"
                        value="<?php echo @$name;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Last name : </label>
                    <input type="text" id="name" class="form-control" placeholder="Enter last name" name="lname"
                        value="<?php echo @$lname;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Gender : </label><br />
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Male" checked>
                        <label class="form-check-label" for="radio1" style="margin-right: 10px;">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Female">
                        <label class="form-check-label" for="radio2">Female</label>
                    </div>
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Phone : </label>
                    <input type="tel" id="phone" class="form-control" placeholder="Enter phone" name="phone"
                        value="<?php echo @$phone;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Email : </label>
                    <input type="email" id="email" class="form-control" placeholder="Enter email" name="email"
                        value="<?php echo @$email;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Qualification : </label>
                    <select class="form-select" aria-label="Default select example" name="qualification">
                        <option selected disabled>Select qualification</option>
                        <?php if($qualification == "Bachelor of Library and Information Science"){?>
                        <option value="Bachelor of Library and Information Science" selected>Bachelor of Library and
                            Information Science</option>
                        <?php }else{?>
                        <option value="Bachelor of Library and Information Science">Bachelor of Library and Information Science</option>
                        <?php }?>
                        <?php if($qualification == "Master in Library Science and Information science"){?>
                        <option value="Master in Library Science and Information science" selected>Master in Library
                            Science and Information science</option>
                        <?php }else{?>
                        <option value="Master in Library Science and Information science">Master in Library Science and Information science</option>
                        <?php }?>
                        <?php if($qualification == "Diploma in Library Science"){?>
                        <option value="Diploma in Library Science" selected>Diploma in Library Science</option>
                        <?php }else{?>
                        <option value="Diploma in Library Science">Diploma in Library Science</option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Password : </label>
                    <input type="password" id="password" class="form-control" placeholder="Enter password"
                        name="password" value="<?php echo @$password;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Confirm Password : </label>
                    <input type="password" id="confirmpassword" class="form-control"
                        placeholder="Enter confirm password" name="cpassword" value="<?php echo @$cpassword;?>">
                </div>
                <div class="text-center"><input type="submit" class="btn btn-primary" id="btn" name="register"
                        value="Register"></div>
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