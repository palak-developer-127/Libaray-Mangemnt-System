<?php
    session_start();

    include("testconn.php");
    $email = $_SESSION['email'];
    $qry = "SELECT * FROM `librarian` WHERE `email` = '$email'";    
    $res = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($res);

    @$langauage = $_POST['langauage'];
    @$selectbook = $_POST['selectbook'];

    if(isset($_POST['getbook']))
    {
        if($langauage == "")
        {
            echo '<div id="snackbar">Select book langauage</div>';
        }
        elseif ($langauage != "") {
            $qry1 = "SELECT * FROM `books` WHERE `langauage` = '$langauage'";    
            $res1 = mysqli_query($conn,$qry1);
        }
    }
    if(isset($_POST['issuebook']))
    {
        // $book = $_POST['selectbook'];
        $name = $_POST['name'];
        $date = $_POST['date'];

        if($selectbook == "")
        {
            echo '<div id="snackbar">Select book</div>';
        }
        else if($name == "")
        {
            echo '<div id="snackbar">Enter student name</div>';
        }
        else if($date == "")
        {
            echo '<div id="snackbar">Enter date</div>';
        }
        else
        {
            $qry2 = "INSERT INTO `issuebooks`(`bookname`, `studentname`, `date`) VALUES ('$selectbook','$name','$date')";
            $res2 = mysqli_query($conn,$qry2);

            if($res2)
            {
                header("location:issuedbooks.php");
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
    <link rel="icon" href="images/fevicon.jpg">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery/jq.js"></script>
    <title>Libararian</title>
    <style>
    .form {
        margin-top: 70px;
        margin-bottom: 70px;
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

    .navbar .navbar-nav .nav-item {
        font-size: 17px;
        font-weight: bold;
    }

    .navbar .navbar-nav .nav-link {
        color: #fff;
    }

    .navbar .navbar-nav .nav-link:hover {
        color: #fbc531;
    }

    .navbar .navbar-nav .active>.nav-link {
        color: #fbc531;
        pointer-events: none;
    }

    a {
        text-decoration: none;
    }

    .nav-link1 {
        display: block;
        padding: .5rem 1rem;
        color: white;
        font-weight: 500;
        text-decoration: none;
    }

    .wel_name {
        padding-right: 7px;
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
    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <li class="nav-link1"><span class="wel_name">Welcome</span><?php echo $row['name']." ".$row['lname']; ?>
            </li>
            <button class="navbar-toggler" style="border-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto me-auto">
                    <li class="nav-item"><a class="nav-link ps-3" href="addbook.php">Add Book</a></li>
                    <li class="nav-item"><a class="nav-link ps-3" href="viewbook.php">View Book</a></li>
                    <li class="nav-item active"><a class="nav-link ps-3" href="issuebook.php">Issue book</a></li>
                    <li class="nav-item"><a class="nav-link ps-3" href="issuedbooks.php">Issued books</a></li>
                    <li class="nav-item"><a class="nav-link ps-3" href="changepassword.php">Change password</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item m-0"><a class="nav-link" href="#"><button
                                onclick="location.href = 'logout.php';" class="btn btn-primary">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container form">
        <div class="col-lg-8 col-md-8 m-auto d-block bg-light" id="c">
            <h1 id="b">Issue book</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label id="a" class="text-primary">Langauage : </label>
                    <select class="form-select" aria-label="Default select example" name="langauage">
                        <option selected disabled>Select langauage</option>
                        <?php if($langauage == "GUJARATI"){?>
                        <option value="GUJARATI" selected>GUJARATI</option>
                        <?php }else{?>
                        <option value="GUJARATI">GUJARATI</option>
                        <?php }?>
                        <?php if($langauage == "ENGLISH"){?>
                        <option value="ENGLISH" selected>ENGLISH</option>
                        <?php }else{?>
                        <option value="ENGLISH">ENGLISH</option>
                        <?php }?>
                        <?php if($langauage == "HINDI"){?>
                        <option value="HINDI" selected>HINDI</option>
                        <?php }else{?>
                        <option value="HINDI">HINDI</option>
                        <?php }?>
                    </select>
                </div>
                <div class="text-center"><input type="submit" class="btn btn-primary" id="btn" name="getbook" value="Get book"></div>
            </form>
            <form action="" method="post">
                <div class="form-group">
                    <label id="a" class="text-primary">Select book : </label>
                    <select class="form-select" aria-label="Default select example" name="selectbook">
                        <option selected disabled>Select book</option>
                        <?php while ($row = mysqli_fetch_assoc($res1)) {?>
                            <option value="<?php echo $row['bookname'];?>" <?php if($selectbook == $row['bookname']) { echo "selected";} ?>><?php echo $row['bookname'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Student name : </label>
                    <input type="text" class="form-control" placeholder="Enter Student name" name="name" value="<?php echo @$name;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Issue date : </label>
                    <input type="date" class="form-control" name="date" value="<?php echo @$date;?>">
                </div>
                <div class="text-center"><input type="submit" class="btn btn-primary" id="btn" name="issuebook" value="Issue book"></div>
            </form>
        </div>
    </div>

    <?php include("footer1.php"); ?>

    <script type="text/javascript">
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function() {
        x.className = x.className.replace("show", "");
    }, 2500);
    </script>
</body>

</html>