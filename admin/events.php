<?php
@include 'db.php';

if (isset($_POST['add_product'])) {
   $product_names = $_POST['product_name'];
   $product_prices = $_POST['product_price'];
   $product_decs = $_POST['product_dec'];
   $product_locs = $_POST['product_loc'];
   $product_images = $_FILES['product_image'];

   $count = count($product_names);

   for ($i = 0; $i < $count; $i++) {
      $name = mysqli_real_escape_string($con, $product_names[$i]);
      $date = mysqli_real_escape_string($con, $product_prices[$i]);
      $desc = mysqli_real_escape_string($con, $product_decs[$i]);
      $loc = mysqli_real_escape_string($con, $product_locs[$i]);

      // Handle multiple images for this event
      $images = [];
      if (!empty($product_images['name'][$i][0])) {
         foreach ($product_images['name'][$i] as $key => $img_name) {
            $tmp_name = $product_images['tmp_name'][$i][$key];
            $img_name = time() . '_' . basename($img_name);
            $img_folder = 'uploaded_img/' . $img_name;
            if (move_uploaded_file($tmp_name, $img_folder)) {
               $images[] = $img_name;
            }
         }
      }

      $img_list = implode(',', $images); // store filenames as comma-separated list

      if (empty($name) || empty($date) || empty($desc) || empty($loc) || empty($img_list)) {
         $message[] = "Please fill out all fields for event #" . ($i + 1);
      } else {
         $insert = "INSERT INTO events(e_name, e_img, e_date, e_location, e_dec)
                    VALUES('$name', '$img_list', '$date', '$loc', '$desc')";
         $upload = mysqli_query($con, $insert);
         if ($upload) {
            $message[] = "Event #" . ($i + 1) . " added successfully";
         } else {
            $message[] = "Could not add Event #" . ($i + 1);
         }
      }
   }
}

if (isset($_GET['delete'])) {
   $id = $_GET['delete'];
   mysqli_query($con, "DELETE FROM events WHERE e_id = $id");
   header('location:events.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <title>AdminHub</title>

   <style>
      body {
         background-color: #f8f9fa;
      }

      .container {
         margin-top: 40px;
         max-width: 1100px;
      }

      .admin-product-form-container {
         background: #fff;
         padding: 25px 30px;
         border-radius: 12px;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
         margin-bottom: 30px;
      }

      .admin-product-form-container h3 {
         text-align: center;
         font-weight: 600;
         margin-bottom: 25px;
         color: #333;
      }

      .event-group {
         display: grid;
         grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
         gap: 15px;
         margin-bottom: 20px;
      }

      .event-group .box {
         width: 100%;
         padding: 8px 12px;
         border: 1px solid #ccc;
         border-radius: 8px;
         transition: all 0.3s ease;
      }

      .event-group .box:focus {
         border-color: #007bff;
         box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
         outline: none;
      }

      .btn {
         border-radius: 8px !important;
         font-weight: 500;
      }

      .table-responsive {
         border-radius: 12px;
         overflow: hidden;
         box-shadow: 0 1px 8px rgba(0, 0, 0, 0.08);
      }

      .table img {
         border-radius: 6px;
         object-fit: cover;
      }

      .table th {
         background-color: #343a40;
         color: #fff;
         text-align: center;
         vertical-align: middle;
      }

      .table td {
         text-align: center;
         vertical-align: middle;
      }

      .table-hover tbody tr:hover {
         background-color: #f1f1f1;
      }

      .action-btns a {
         margin: 0 4px;
      }

      .message {
         display: block;
         text-align: center;
         background: #d1ecf1;
         color: #0c5460;
         padding: 10px;
         border-radius: 5px;
         margin: 10px auto;
         width: fit-content;
      }
   </style>
</head>

<body>
   <?php include("index.php"); ?>

   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '<span class="message">' . $msg . '</span>';
      }
   }
   ?>

   <div class="container">
      <div class="admin-product-form-container">
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add New Events</h3>

            <div id="eventFields">
               <div class="event-group">
                  <input type="text" placeholder="Enter event name" name="product_name[]" class="box" required>
                  <input type="date" name="product_price[]" class="box" required>
                  <input type="text" placeholder="Enter event description" name="product_dec[]" class="box" required>
                  <input type="text" placeholder="Enter event location" name="product_loc[]" class="box" required>
                  <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image[0][]" class="box" multiple required>
               </div>
            </div>

            <div class="text-center">
               <button type="button" class="btn btn-secondary mt-2" onclick="addEvent()">+ Add More Events</button>
               <input type="submit" class="btn btn-primary mt-2" name="add_product" value="Add Events">
            </div>
         </form>
      </div>

      <?php $select = mysqli_query($con, "SELECT * FROM events"); ?>

      <div class="product-display mt-5">
         <h4 class="mb-3 text-center">All Events</h4>
         <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
               <thead class="thead-dark">
                  <tr>
                     <th>Event Images</th>
                     <th>Event Name</th>
                     <th>Event Date</th>
                     <th>Event Description</th>
                     <th>Event Location</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                     <tr>
                        <td>
                           <?php
                           $images = explode(',', $row['e_img']);
                           foreach ($images as $img) {
                              echo "<img src='uploaded_img/$img' height='60' width='70' style='margin:2px;' alt=''>";
                           }
                           ?>
                        </td>
                        <td><?php echo $row['e_name']; ?></td>
                        <td><?php echo $row['e_date']; ?></td>
                        <td><?php echo $row['e_dec']; ?></td>
                        <td><?php echo $row['e_location']; ?></td>
                        <td class="action-btns">
                           <a href="e_update.php?edit=<?php echo $row['e_id']; ?>" class="btn btn-sm btn-info">
                              <i class="bx bx-edit"></i> Edit
                           </a>
                           <a href="events.php?delete=<?php echo $row['e_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                              <i class="bx bx-trash"></i> Delete
                           </a>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <script>
      let eventIndex = 1;
      function addEvent() {
         const eventFields = document.getElementById('eventFields');
         const newGroup = document.createElement('div');
         newGroup.classList.add('event-group');
         newGroup.innerHTML = `
            <input type="text" placeholder="Enter event name" name="product_name[]" class="box" required>
            <input type="date" name="product_price[]" class="box" required>
            <input type="text" placeholder="Enter event description" name="product_dec[]" class="box" required>
            <input type="text" placeholder="Enter event location" name="product_loc[]" class="box" required>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image[${eventIndex}][]" class="box" multiple required>
         `;
         eventFields.appendChild(newGroup);
         eventIndex++;
      }
   </script>
</body>
</html>
