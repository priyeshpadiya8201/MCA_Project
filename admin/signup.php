<?php
//require_once('db.php');
//$query ="select * from signup";
//$result = mysqli_query($con,$query);
require_once 'db.php';
require_once 'function.php';
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
	<link rel="stylesheet" href="table1.css ">

	<title>AdminHub</title>
</head>


<body id="bda">
<?php include("index.php");?>
<div class="table-data">
    <div class="order">
                
                <div class="head">
                    <h3>signup</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>

                    <table>
                        
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <td><?php echo $row['user_id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                
                                </tr>
                                <?php
                                    }
                                    
                                ?>
                            
                        
                    </table>
    </div>
</div>
</body>