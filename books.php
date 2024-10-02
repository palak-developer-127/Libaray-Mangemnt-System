<?php
    include("testconn.php");
    $qry = "SELECT * FROM `books`";

    $res = mysqli_query($conn,$qry);    

    if(isset($_POST['sort']))
    {
        $cl = $_POST['column'];
        $or = $_POST['order'];

        $qry = "SELECT * FROM `books` ORDER BY `$cl` $or";

        $res = mysqli_query($conn,$qry);    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/fevicon.jpg">
    <title>Books</title>
</head>

<body>
    <?php include("header.php");?>

    <h2 class="text-center mt-5">Books</h2>

    <div class="container">
        <div class="text-center">
            <div class="row m-3">
                <form action="" method="post">
                    <div class="form-check form-check-inline col-lg-5 m-auto">
                        <select class="form-select" name="column" aria-label="Default select example">
                            <option selected disabled>Column name</option>
                            <?php if($cl == "booknumber"){?>
                                <option value="booknumber" selected>Book number</option>
                            <?php }else{?>
                                <option value="booknumber">Book number</option>
                            <?php }?>
                            <?php if($cl == "bookname"){?>
                                <option value="bookname" selected>Book name</option>
                            <?php }else{?>
                                <option value="bookname">Book name</option>
                            <?php }?>
                            <?php if($cl == "author"){?>
                                <option value="author" selected>Author</option>
                            <?php }else{?>
                                <option value="author">Author</option>
                            <?php }?>
                            <?php if($cl == "publisher"){?>
                                <option value="publisher" selected>Publisher</option>
                            <?php }else{?>
                                <option value="publisher">Publisher</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-check form-check-inline col-lg-5 m-auto">
                        <select class="form-select" name="order" aria-label="Default select example">
                            <option selected disabled>Order</option>
                            <?php if($or == "ASC"){?>
                                <option value="ASC" selected>Ascending</option>
                            <?php }else{?>
                                <option value="ASC">Ascending</option>
                            <?php }?>
                            <?php if($or == "DESC"){?>
                                <option value="DESC" selected>Decending</option>
                            <?php }else{?>
                                <option value="DESC">Decending</option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Sort data" name="sort" class="btn btn-primary mt-3">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3 mb-4">
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
                    </tr>
                </thead>
                <tbody>
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
                    </tr>
                    <?php $i++;}?>
                </tbody>
            </table>
        </div>
    </div>



    <?php include("footer.php");?>
</body>

</html>