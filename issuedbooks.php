<?php
    session_start();

    include("testconn.php");
    $email = $_SESSION['email'];
    $qry = "SELECT * FROM `librarian` WHERE `email` = '$email'";    
    $res = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($res);

    $qry1 = "SELECT * FROM `issuebooks`";
    $res1 = mysqli_query($conn,$qry1);
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
                    <li class="nav-item"><a class="nav-link ps-3" href="issuebook.php">Issue book</a></li>
                    <li class="nav-item active"><a class="nav-link ps-3" href="issuedbooks.php">Issued books</a></li>
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

    <div class="container mb-5 pt-5 pb-5">
        <div class="text-center mb-5 fs-1 fw-bold">
            Issued books
        </div>
        <div class="table-responsive">
            <table class="table table-hover text-center">
                <thead class="bg-dark text-light fw-bold user-select-none">
                    <td>Sr. no.</td>
                    <td>Book name</td>
                    <td>Student name</td>
                    <td>Date</td>
                </thead>
                <tbody class="bg-light">
                    <?php $i=1; while($row1 = mysqli_fetch_assoc($res1)){?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row1['bookname'];?></td>
                            <td><?php echo $row1['studentname'];?></td>
                            <td><?php echo $row1['date'];?></td>
                        </tr>
                    <?php $i++;}?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include("footer1.php"); ?>

</body>

</html>