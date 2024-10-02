<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="icon" href="images/fevicon.jpg">
    <title>Library Timing</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include("header.php");?>

    <div class="container">
      <div class="container row mt-5">
          <div class=" text-center m_d">Monday - Friday</div>
          <div class="col-lg-10 m-auto aligns-items-center">
            <div class="visiting">
              <div class="visiting-box morning">
                <img src="images/morning.png"> <br> Morning Time <br> 08:00 AM to 01:00 Noon
              </div>
              <div class="visiting-box evening">
                <img src="images/evening.png"> <br> Evening Time <br> 02:00 PM to 08:00 PM
              </div>
            </div>
          </div>
          <div class=" text-center m_d">Saturday</div>
          <div class="col-lg-10 m-auto aligns-items-center">
            <div class="visiting">
              <div class="visiting-box morning">
                <img src="images/morning.png"> <br> Morning Time <br> 08:00 AM to 12:00 Noon
              </div>
              <div class="visiting-box evening">
                <img src="images/evening.png"> <br> Evening Time <br> 01:00 PM to 03:00 PM
              </div>
              <div class="note mb-5">
                <p> Note: Please silent your phone and maintain silence in Library area. </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php include("footer.php");?>
</body>
</html>