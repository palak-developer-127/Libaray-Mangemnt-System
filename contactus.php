<?php
    include("testconn.php");
    if(isset($_POST['contact']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile_number = $_POST['mobile_number'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $qry = "INSERT INTO `contactus`(`name`, `email`, `mobile`, `subject`, `message`) VALUES ('$name','$email','$mobile_number','$subject','$message')";

        $res = mysqli_query($conn,$qry);
        if($res)
        {
            header("location:index.php");
        }
        else
        {
            header("location:contactus.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us Page</title>
    <link rel="icon" href="images/fevicon.jpg">
    <link rel="stylesheet" href="css/style.css">
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
</head>

<body>
    <?php include("header.php");?>
    <div class="m-5"></div>
    
    <div class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h2>Contact <strong>Us</strong></h2>
                        <div class="title-line">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="contact-data-box">
                        <div class="contact-icon">
                            <i class="fa fa-hands-helping"></i>
                        </div>
                        <div class="contact-detail">
                            <h6>Secretary:</h6>
                            <ul>
                                <li>Dr. Haresh A. Sonani</li>
                                <li>Email : <a href="#">haresh@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-data-box">
                        <div class="contact-icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="contact-detail">
                            <h6>Librarian:</h6>
                            <ul>
                                <li>Mr. Mahesh B. Bhanderi</li>
                                <li>Email : <a href="#">mahesh@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-data-box">
                        <div class="contact-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="contact-detail">
                            <h6>President:</h6>
                            <ul>
                                <li>Dr. Suresh M. Vaghani</li>
                                <li>Email : <a href="#">suresh@yahoo.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <div class="contact-data-box">
                        <div class="contact-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="contact-detail">
                            <h6>Address:</h6>
                            <ul>
                                <li>Katargam <br/>Surat-395004</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-data-box">
                        <div class="contact-icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="contact-detail">
                            <h6>Contact number:</h6>
                            <ul>
                                <li>(0261)242 7726</li>
                                <li>95734 94753</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="contact-data-box">
                        <div class="contact-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="contact-detail">
                            <h6>Email:</h6>
                            <ul>
                                <li>library@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-5">
        <div class="col-lg-6 m-auto p-4">
            <div class="section-title text-center">
                <h2>Contact <strong> Us</strong></h2>
                <div class="title-line">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
            <div class="contact-data-box h-auto">
                <form method="POST" action="">
                    <div class="form-group">
                        <label class="mb-2">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2">Mobile Number</label>
                        <input type="tel" name="mobile_number" class="form-control" placeholder="Enter Mobile Number" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2 mt-2">Message</label>
                        <textarea name="message" cols="30" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" class="submit-cnt-btn" value="Send" name="contact">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include("footer.php");?>
</body>

</html>