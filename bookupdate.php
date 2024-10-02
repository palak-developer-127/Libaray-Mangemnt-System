<?php
    include "testconn.php";

    $id = $_REQUEST['book_id'];
    $qry = "SELECT * FROM `books` WHERE `id` = '$id'";    
    $res = mysqli_query($conn,$qry);
    $row = mysqli_fetch_assoc($res);

    // print_r($row);

    if(isset($_POST['update']))
    {
        $booknumber = $_POST['booknumber'];
        $bookname = $_POST['bookname'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        @$langauage = $_POST['langauage'];

        $qry1 = "UPDATE `books` SET `booknumber`='$booknumber',`bookname`='$bookname',`author`='$author',`publisher`='$publisher',`langauage`='$langauage' WHERE `id` = '$id'";
        $res1 = mysqli_query($conn,$qry1);

        if($res1)
        {
            header("location: viewbook.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update book</title>
    <link rel="icon" href="images/fevicon.jpg">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jquery/jq.js"></script>
    <script language="javascript" type="text/javascript">
    window.history.forward();
    </script>
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
            width: 45%;
        }
    </style>
</head>
<body>

    <div class="container form">
        <div class="col-lg-8 col-md-8 m-auto d-block bg-light" id="c">
            <h1 id="b">Update book details</h1>

            <form action="" method="post">
                <div class="form-group">
                    <label id="a" class="text-primary">Book number : </label>
                    <input type="number" class="form-control" placeholder="Enter book number" name="booknumber" value="<?php echo $row['booknumber'];?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Book name : </label>
                    <input type="text" class="form-control" placeholder="Enter book name" name="bookname" value="<?php echo $row['bookname'];?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Author : </label>
                    <input type="text" class="form-control" placeholder="Enter author" name="author" value="<?php echo $row['author'];?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Publisher : </label>
                    <input type="text" class="form-control" placeholder="Enter publisher" name="publisher" value="<?php echo $row['publisher'];?>">
                </div>
                <div class="form-group">
                    <label id="a" class="text-primary">Langauage : </label>
                    <select class="form-select" aria-label="Default select example" name="langauage">
                        <option selected disabled>Select langauage</option>
                        <option value="GUJARATI" <?php if($row['langauage'] == "GUJARATI"){ echo"selected"; }?>>GUJARATI</option>
                        <option value="GUJARATI" <?php if($row['langauage'] == "ENGLISH"){ echo"selected"; }?>>English</option>
                        <option value="GUJARATI" <?php if($row['langauage'] == "HINDI"){ echo"selected"; }?>>Hindi</option>
                    </select>
                </div>
                <div class="text-center"><input type="submit" class="btn btn-primary" id="btn" name="update" value="Update book details"></div>
            </form>
        </div>
    </div>
</body>
</html>