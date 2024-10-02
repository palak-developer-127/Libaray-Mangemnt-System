<?php
    session_start();

    include("testconn.php");
    $email = $_SESSION['email'];
    $qry = "SELECT * FROM `librarian` WHERE `email` = '$email'";    
    $res = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($res);

    $qry1 = "SELECT * FROM `books` ORDER BY `id` DESC";

    $res = mysqli_query($conn,$qry1);    
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
        font-weight: 600;
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

    function confirm_delete() {
        var ans = confirm('are you want to sure delete this book?');
        if (ans)
            return true;
        else
            return false;
    }
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <li class="nav-link1"><span class="wel_name">Welcome</span><?php echo $row['name']." ".$row['lname']; ?>
            </li>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto me-auto">
                    <li class="nav-item"><a class="nav-link ps-3" href="addbook.php">Add Book</a></li>
                    <li class="nav-item active"><a class="nav-link ps-3" href="viewbook.php">View Book</a></li>
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

    <h2 class="text-center mt-5">Books</h2>
    <div class="container mt-5 mb-5">
    <div class="table-responsive">
        <table class="table table-bordered text-center table-hover">
            <thead class="bg-dark text-light fw-bold">
                <tr>
                    <td>Sr no.</td>
                    <td>Book number</td>
                    <td>Book name</td>
                    <td>Author</td>
                    <td>Publisher</td>
                    <td>Language</td>
                    <td colspan="2">Operation</td>
                </tr>
            </thead>
            <?php 
                $i = 1;
                while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['booknumber'];?></td>
                <td><?php echo $row['bookname'];?></td>
                <td><?php echo $row['author'];?></td>
                <td><?php echo $row['publisher'];?></td>
                <td><?php echo $row['langauage'];?></td>
                <td><a href="bookupdate.php?book_id=<?php echo $row['id'];?>" style="text-decoration: none;">Update</a></td>
                <td><a href="bookdel.php?book_id=<?php echo $row['id'];?>" style="text-decoration: none;" onclick="return confirm_delete()">Delete</a>
                </td>
            </tr>
            <?php $i++;}?>
        </table>
    </div>
    </div>
    
    <?php include("footer1.php"); ?>
</body>

</html>