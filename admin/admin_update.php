<?php

@include 'db.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){
   
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_dec = $_POST['product_dec'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image) || empty($product_dec)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE product SET p_name='$product_name', p_price='$product_price', p_dec='$product_dec', p_img='$product_image'  WHERE p_id = '$id'";
      $upload = mysqli_query($con, $update_data);

      if($upload)
      {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         header('location:product.php');
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
      $select = mysqli_query($con, "SELECT * FROM product WHERE p_id = '$id'");
      while($row = mysqli_fetch_assoc($select))
      {
   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
   
      <input type="text" placeholder="enter product name" name="product_name" class="box" value="<?php echo $row['p_name']; ?>">
         <input type="number" placeholder="enter product price" name="product_price" class="box" value="<?php echo $row['p_price']; ?>">
         <input type="text" placeholder="enter Product description" name="product_dec" class="box" value="<?php echo $row['p_dec']; ?>">
         
         <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg" value="<?php echo $row['p_img']; ?>">

      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="product.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>