<?php
require_once 'db.php';

// Fetch data from the database
$result = display_data();

function display_data(){
    global $con;
    $query = "SELECT * FROM registraction";
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
                    
                    <h3>Registration</h3>
                    <!-- <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i> -->
                </div>

                    <table>
                        
                    <thead>
                        <tr>
                        <th>ID</th>   
                        <th>Fullname</th>
                            <th>email</th>
                            <th>Address</th>
                            <th>m_number</th>
                            <th>city</th>
                            <th>state</th>
                            <th>pincode</th>
                            
                            

                        </tr>
                    </thead>
                    
                            <tr>
                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['fullname']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['m_number']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['state']; ?></td>
                                <td><?php echo $row['pincode']; ?></td>
                                
                                
                                
                                </tr>
                                <?php
                                    }
                                    
                                ?>
                            
                        
                    </table>
    </div>
</div>
</body>