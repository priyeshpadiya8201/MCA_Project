<?php
@include 'db.php';

if (!isset($_GET['edit'])) {
    header('Location: temple_management.php'); // redirect if no edit ID
    exit();
}

$id = $_GET['edit'];

// Fetch existing temple data
$select = mysqli_query($con, "SELECT * FROM temples WHERE id = $id");
if (mysqli_num_rows($select) == 0) {
    header('Location: temple_management.php');
    exit();
}
$temple = mysqli_fetch_assoc($select);
$existing_images = explode(',', $temple['temple_images']);

// Handle form submission
if (isset($_POST['update_temple'])) {
    $name = mysqli_real_escape_string($con, $_POST['temple_name']);
    $loc = mysqli_real_escape_string($con, $_POST['location']);
    $aarti = mysqli_real_escape_string($con, $_POST['aarti_time']);
    $darsan = mysqli_real_escape_string($con, $_POST['darsan_time']);

    $new_images = $_FILES['temple_image'];
    $images = $existing_images; // keep old images by default

    if (!empty($new_images['name'][0])) {
        $images = [];
        foreach ($new_images['name'] as $key => $img_name) {
            $tmp_name = $new_images['tmp_name'][$key];
            $img_name = time() . '_' . basename($img_name);
            $img_folder = 'uploaded_img/' . $img_name;
            if (move_uploaded_file($tmp_name, $img_folder)) {
                $images[] = $img_name;
            }
        }
    }

    $img_list = implode(',', $images);

    $update = "UPDATE temples SET 
                temple_name='$name',
                temple_images='$img_list',
                location='$loc',
                aarti_time='$aarti',
                darsan_time='$darsan'
               WHERE id=$id";

    if (mysqli_query($con, $update)) {
        header("Location: temple.php");
        exit();
    } else {
        $message = "Could not update temple.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Temple</title>
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="css/style.css">
<style>
body { background-color: #f8f9fa; }
.container { max-width: 900px; margin: 40px auto; }
.admin-product-form-container { background: #fff; padding: 25px 30px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 30px; }
.admin-product-form-container h3 { text-align: center; margin-bottom: 20px; color: #333; }
.admin-product-form-container .box { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ccc; border-radius: 6px; }
.admin-product-form-container .btn { width: 100%; padding: 10px; margin-top: 10px; border-radius: 6px; }
.product-display-table img { max-width: 100px; border-radius: 6px; margin:2px; }
.message { display:block; text-align:center; background:#d1ecf1; color:#0c5460; padding:10px; border-radius:5px; margin:10px auto; width:fit-content; }
</style>
</head>
<body>

<?php include("index.php"); ?>

<div class="container">
    <div class="admin-product-form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Update Temple</h3>
            <?php if(isset($message)) echo '<span class="message">'.$message.'</span>'; ?>
            <input type="text" name="temple_name" placeholder="Temple Name" class="box" value="<?php echo $temple['temple_name']; ?>" required>
            <input type="text" name="location" placeholder="Location" class="box" value="<?php echo $temple['location']; ?>" required>
            <input type="time" name="aarti_time" placeholder="Aarti Time" class="box" value="<?php echo $temple['aarti_time']; ?>" required>
            <input type="time" name="darsan_time" placeholder="Darsan Time" class="box" value="<?php echo $temple['darsan_time']; ?>" required>
            <label>Existing Images:</label>
            <div>
                <?php foreach($existing_images as $img): ?>
                    <img src="uploaded_img/<?php echo $img; ?>" alt="Temple Image">
                <?php endforeach; ?>
            </div>
            <label>Replace Images (optional):</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="temple_image[]" class="box" multiple>
            <input type="submit" class="btn" name="update_temple" value="Update Temple">
        </form>
    </div>
</div>

</body>
</html>
