<?php

//require_once('db.php');
//$query ="select * from signup";
//$result = mysqli_query($con,$query);
require_once 'db.php';
require_once 'dn.php';
$result = display_data();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="table1.css">
	<title>Donation Table</title>
</head>

<body>
<?php include("index.php");?>

<div class="table-data">
<div class="order">
                
                <div class="head">
                    
                    <h3>Donation</h3>
                    <!-- <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i> -->
                </div>

                    <table>
                        
                    <thead>
                        <tr>
                        <th>Donation ID</th>   
                        <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email </th>
                            <th>MobileNo</th>
                            <th>Selected Temple</th>
                            <th>Donation Amount</th>
                            <th>Payment method</th>
                            <th>card number</th>
                            <th>expiry date</th>
                            <th>cvv</th>
                            

                        </tr>
                    </thead>
                    
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                
                                <td><?php echo $row['d_id']; ?></td>
                                <td><?php echo $row['f_name']; ?></td>
                                <td><?php echo $row['l_name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile_no']; ?></td>
                                <td><?php echo $row['tem_name']; ?></td>
                                <td><?php echo $row['damount']; ?></td>
                                <td><?php echo $row['pay_method']; ?></td>
                                <td><?php echo $row['cardNumber']; ?></td>
                                <td><?php echo $row['expiryDate']; ?></td>
                                <td><?php echo $row['cvv']; ?></td>
                                
                                
                                </tr>
                                <?php
                                    }
                                    
                                ?>
                            
                        
                    </table>
    </div>
</div>
</body>