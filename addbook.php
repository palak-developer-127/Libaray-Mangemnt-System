<?php
    session_start();

    include("testconn.php");
    $email = $_SESSION['email'];
    $qry = "SELECT * FROM `librarian` WHERE `email` = '$email'";    
    $res = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($res);

    if(isset($_POST['addbook']))
    {
        $booknumber = $_POST['booknumber'];
        $bookname = $_POST['bookname'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        @$langauage = $_POST['langauage'];

        if($booknumber == "")
        {
            echo '<div id="snackbar">Enter book number</div>';
        }
        else if($bookname == "")
        {
            echo '<div id="snackbar">Enter book name</div>';
        }
        else if($author == "")
        {
            echo '<div id="snackbar">Enter author name</div>';
        }
        else if($publisher == "")
        {
            echo '<div id="snackbar">Enter publisher</div>';
        }
        else if($langauage == "")
        {
            echo '<div id="snackbar">Select book langauage</div>';
        }
        else
        {
            $qry1 = "SELECT `booknumber` FROM `books` WHERE `booknumber` = '$booknumber'";    
            $res1 = mysqli_query($conn,$qry1);

            if(mysqli_num_rows($res1) > 0)
            {
                echo '<div id="snackbar">Book number are already added</div>';
                $booknumber = "";
            }
            else
            {
                $qry2 = "INSERT INTO `books`(`booknumber`, `bookname`, `author`, `publisher`, `langauage`) VALUES ('$booknumber','$bookname','$author','$publisher','$langauage')";
                
                $res2 = mysqli_query($conn,$qry2);

                if($res2)
                {
                    header("location:viewbook.php");
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

    .nav-item {
        font-size: 17px;
        font-weight: bold;
        opacity: 1.0;
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
                    <li class="nav-item active"><a class="nav-link ps-3" href="addbook.php">Add Book</a></li>
                    <li class="nav-item"><a class="nav-link ps-3" href="viewbook.php">View Book</a></li>
                    <li class="nav-item"><a class="nav-link ps-3" href="issuebook.php">Issue book</a></li>
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
            <h1 id="b">Add book</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label id="a" class="text-primary">Book number : </label>
                    <input type="number" class="form-control" placeholder="Enter book number" name="booknumber" value="<?php echo @$booknumber;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Book name : </label>
                    <input type="text" class="form-control" placeholder="Enter book name" name="bookname" value="<?php echo @$bookname;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Author : </label>
                    <input type="text" class="form-control" placeholder="Enter author" name="author" value="<?php echo @$author;?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Publisher : </label>
                    <input type="text" class="form-control" placeholder="Enter publisher" name="publisher" value="<?php echo @$publisher;?>">
                </div>
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
                <div class="text-center"><input type="submit" class="btn btn-primary" id="btn" name="addbook" value="Add book"></div>
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