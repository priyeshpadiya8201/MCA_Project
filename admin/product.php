<?php
@include 'db.php';

// Initialize message array
$message = array();

// Add Product
if (isset($_POST['add_product'])) {
   $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
   $product_price = mysqli_real_escape_string($con, $_POST['product_price']);
   $product_dec = mysqli_real_escape_string($con, $_POST['product_dec']);
   $product_stock = mysqli_real_escape_string($con, $_POST['product_stock']);
   $product_quantity = mysqli_real_escape_string($con, $_POST['product_quantity']);
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = 'uploaded_img/' . $product_image;

   if ($product_name == '' || $product_price == '' || $product_dec == '' || $product_stock == '' || $product_quantity == '' || $product_image == '') {
      $message[] = 'Please fill out all fields!';
   } else {
      $insert = "INSERT INTO product(p_name, p_price, p_dec, p_img, p_stock, p_quantity) 
                 VALUES('$product_name', '$product_price', '$product_dec', '$product_image', '$product_stock', '$product_quantity')";
      $upload = mysqli_query($con, $insert);

      if ($upload) {
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'New product added successfully!';
      } else {
         $message[] = 'Could not add the product.';
      }
   }

   // Redirect to prevent resubmission on refresh
   header("Location: product.php?msg=added");
   exit();
}

// Handle delete request
if (isset($_GET['delete'])) {
   $id = intval($_GET['delete']);
   mysqli_query($con, "DELETE FROM product WHERE p_id = $id");
   header('Location: product.php?msg=deleted');
   exit();
}

// Show success messages
if (isset($_GET['msg'])) {
   if ($_GET['msg'] == 'added') {
      $message[] = 'Product added successfully!';
   } elseif ($_GET['msg'] == 'deleted') {
      $message[] = 'Product deleted successfully!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Boxicons -->
   <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   <!-- My CSS -->
   <link rel="stylesheet" href="css/style.css">

   <title>AdminHub</title>
</head>

<body>
   <?php include("index.php"); ?>

   <?php
   if (!empty($message)) {
      foreach ($message as $msg) {
         echo '<span class="message">' . $msg . '</span>';
      }
   }
   ?>

   <div class="container">
      <div class="admin-product-form-container">
         <form action="product.php" method="post" enctype="multipart/form-data">
            <h3>Add a New Product</h3>
            <input type="text" placeholder="Enter product name" name="product_name" class="box">
            <input type="number" placeholder="Enter product price" name="product_price" class="box">
            <input type="text" placeholder="Enter product description" name="product_dec" class="box">
            <input type="number" placeholder="Enter current stock" name="product_stock" class="box">
            <input type="number" placeholder="Enter quantity" name="product_quantity" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <input type="submit" class="btn" name="add_product" value="Add Product">
         </form>
      </div>

      <?php
      $select = mysqli_query($con, "SELECT * FROM product");
      ?>

      <div class="product-display">
         <table class="product-display-table">
            <thead>
               <tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Product Description</th>
                  <th>Stock</th>
                  <th>Quantity</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               while ($row = mysqli_fetch_assoc($select)) {
               ?>
                  <tr>
                     <td><img src="uploaded_img/<?php echo $row['p_img']; ?>" height="100" alt=""></td>
                     <td><?php echo $row['p_name']; ?></td>
                     <td>₹<?php echo $row['p_price']; ?></td>
                     <td><?php echo $row['p_dec']; ?></td>
                     <td><?php echo $row['p_stock']; ?></td>
                     <td><?php echo $row['p_quantity']; ?></td>
                     <td>
                        <a href="admin_update.php?edit=<?php echo $row['p_id']; ?>" class="btn">Edit</a>
                        <a href="product.php?delete=<?php echo $row['p_id']; ?>" class="btn" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                     </td>
                  </tr>
               <?php
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</body>

</html>
