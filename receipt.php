<?php
// Retrieve donation details from URL parameters
$f_name = $_GET['f_name'];
$l_name = $_GET['l_name'];
$email = $_GET['email'];
$mobile_no = $_GET['mobile_no'];
$tem_name = $_GET['tem_name'];
$damount = $_GET['damount'];
$pay_method = $_GET['pay_method'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            /* size: 100%; */
        }
        .rp {

            border: 2px solid ;
            border-color: orangered;
            padding: 10px;
            /* border-width: 10px; */
            border-radius: 10px;
            /* animation: pulseBorder 1.4s infinite alternate; */
        }
        
        h1 {
            color: #333;
            text-align: center;
            padding: 20px 0;
        }
        
        p,h4 {
            display: inline;
            text-align: center;
            margin: 20px 0;
            margin-top: 10px;
        }
        strong {
            font-weight: bold;
        
        }

        .border{
            margin-top: 20px;
            margin-left: 25%;
            margin-right: 25%;
        }
        h2{
            text-align: center;
        }
        @media screen and (max-width: 600px) {
            /* .rp {
                
            border: 1px solid ;
            border-color: orangered;
            padding: 10px; 
            border-width: 10px;
            border-radius: 10px;
            }  */
            
            h1 {
                font-size: 28px;
            }
            p, h4 {
                font-size: 12px;
            }
        }
    </style>
    </style>
</head>
<body>
    <div class="border">
    <div class="rp">
    <h1>Donation Receipt</h1>
    <h4><strong>First Name:</strong></h4><p> <?php echo $f_name; ?></p><br><br>
    <h4><strong>Last Name:</strong></h4><p> <?php echo $l_name; ?></p><br><br>
    <h4><strong>Email:</strong></h4><p> <?php echo $email; ?></p><br><br>
    <h4><strong>Mobile Number:</strong></h4><p> <?php echo $mobile_no; ?></p><br><br>
    <h4><strong>Temple Name:</strong></h4><p> <?php echo $tem_name; ?></p><br><br>
    <h4><strong>Donation Amount:</strong></h4><p> <?php echo $damount; ?></p><br><br>
    <h4><strong>Payment Method:</strong></h4><p> <?php echo $pay_method; ?></p><br><br>
    </div>
    </div>
    <h2>Screenshot!!</h2>
    <div style="text-align: center; margin-top: 20px;">
        <a href="donation.php" style="text-decoration: none; color: #333; background-color: orange; padding: 10px 20px; border-radius: 5px;">Back</a>
    </div>
</body>
</html>
