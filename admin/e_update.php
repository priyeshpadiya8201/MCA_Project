<?php

@include 'db.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_dec = $_POST['product_dec'];
    $product_loc = $_POST['product_loc'];
 
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'.$product_image;
 
   
    if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_loc) || empty($product_dec))
    {
       $message[] = 'please fill out all';
    }
 
   else{

      $update_data = "UPDATE events SET e_name='$product_name', e_date='$product_price', e_dec='$product_dec', e_location='$product_loc', e_img='$product_image'  WHERE e_id = '$id'";
      $upload = mysqli_query($con, $update_data);

      if($upload)
      {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:events.php');
      }
      else
      {
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container1">


<div class="admin-product-form-container centered">

   <?php      
      $select = mysqli_query($con, "SELECT * FROM events WHERE e_id = '$id'");
      while($row = mysqli_fetch_assoc($select))
      {
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the Events</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['e_name']; ?>" placeholder="enter the event name">
      <input type="date" min="0" class="box" name="product_price" value="<?php echo $row['e_date']; ?>" placeholder="enter the date">
      <input type="text" class="box" name="product_dec" value="<?php echo $row['e_dec']; ?>" placeholder="enter the event description">
      <input type="text" class="box" name="product_loc" value="<?php echo $row['e_location']; ?>" placeholder="enter the event location">

      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">

      <input type="submit" value="update Events" name="update_product" class="btn">
      <a href="events.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>