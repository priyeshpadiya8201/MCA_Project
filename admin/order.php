<?php
require_once 'db.php';

// Fetch data from the database
$result = display_data();

function display_data(){
    global $con;
    $query = "SELECT * FROM `order`";
    $result = mysqli_query($con, $query);
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="table1.css ">

	<title>AdminHub</title>
</head>


<body>
<?php include("index.php");?>
<div class="table-data">
    <div class="order">
          <div class="head">
                    
                    <h3>Order</h3>
                    <!-- <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i> -->
                </div>

                    <table>
                        
                    <thead>
                        <tr>
                        <th>ID</th>   
                        <th>order name</th>
                            <th>order amount</th>
                            <th>Order Reference Id</th>
                            <th>payment method</th>
                            <th>card holder name</th>
                            <th>card number</th>
                            <th>card expiry month</th>
                            <th>card expiry year</th>
                            <th>cvv</th>
                            

                        </tr>
                    </thead>
                    
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <td><?php echo $row['o_id']; ?></td>
                                <td><?php echo $row['o_ref'];?></td>
                                <td><?php echo $row['o_name']; ?></td>
                                <td><?php echo $row['o_amt']; ?></td>
                                <td><?php echo $row['p_method']; ?></td>
                                <td><?php echo $row['c_name']; ?></td>
                                <td><?php echo $row['c_no']; ?></td>
                                <td><?php echo $row['exp_m']; ?></td>
                                <td><?php echo $row['exp_y']; ?></td>
                                <td><?php echo $row['c_cvv']; ?></td>
                                
                                
                                
                                </tr>
                                <?php
                                    }
                                    
                                ?>
                            
                        
                    </table>
    </div>
</div>
</body>