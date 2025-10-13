<?php
@include 'db.php';

// Handle add temple form submission
if (isset($_POST['add_temple'])) {
    $temple_names = $_POST['temple_name'];
    $temple_locations = $_POST['location'];
    $aarti_times = $_POST['aarti_time'];
    $darsan_times = $_POST['darsan_time'];
    $temple_images = $_FILES['temple_image'];

    $count = count($temple_names);

    for ($i = 0; $i < $count; $i++) {
        $name = mysqli_real_escape_string($con, $temple_names[$i]);
        $loc = mysqli_real_escape_string($con, $temple_locations[$i]);
        $aarti = mysqli_real_escape_string($con, $aarti_times[$i]);
        $darsan = mysqli_real_escape_string($con, $darsan_times[$i]);

        $images = [];
        if (!empty($temple_images['name'][$i][0])) {
            foreach ($temple_images['name'][$i] as $key => $img_name) {
                $tmp_name = $temple_images['tmp_name'][$i][$key];
                $img_name = time() . '_' . basename($img_name);
                $img_folder = 'uploaded_img/' . $img_name;
                if (move_uploaded_file($tmp_name, $img_folder)) {
                    $images[] = $img_name;
                }
            }
        }
        $img_list = implode(',', $images);

        if (!empty($name) && !empty($loc) && !empty($aarti) && !empty($darsan) && !empty($img_list)) {
            $insert = "INSERT INTO temples(temple_name, temple_images, location, aarti_time, darsan_time)
                       VALUES('$name', '$img_list', '$loc', '$aarti', '$darsan')";
            mysqli_query($con, $insert);
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Delete temple
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM temples WHERE id = $id");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temple Management</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
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
            margin-bottom: 20px;
            color: #333;
        }

        .admin-product-form-container .box {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .admin-product-form-container .btn {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
        }

        .product-display-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.08);
        }

        .product-display-table th,
        .product-display-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .product-display-table th {
            background-color: #343a40;
            color: #fff;
        }

        .product-display-table img {
            max-width: 100px;
            border-radius: 6px;
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

    <div class="container">
        <div class="admin-product-form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Add New Temples</h3>
                <div id="templeFields">
                    <div class="temple-group">
                        <input type="text" name="temple_name[]" placeholder="Temple Name" class="box" required>
                        <input type="text" name="location[]" placeholder="Location" class="box" required>
                        <input type="time" name="aarti_time[]" placeholder="Aarti Time" class="box" required>
                        <input type="time" name="darsan_time[]" placeholder="Darsan Time" class="box" required>
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="temple_image[0][]" class="box" multiple required>
                    </div>
                </div>
                <button type="button" class="btn" onclick="addTemple()">+ Add More Temples</button>
                <input type="submit" class="btn" name="add_temple" value="Add Temples">
            </form>
        </div>

        <?php $select = mysqli_query($con, "SELECT * FROM temples"); ?>
        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Temple Images</th>
                        <th>Temple Name</th>
                        <th>Location</th>
                        <th>Aarti Time</th>
                        <th>Darsan Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                        <tr>
                            <td>
                                <?php
                                $images = explode(',', $row['temple_images']);
                                foreach ($images as $img) {
                                    echo "<img src='uploaded_img/$img' alt='Temple Image'>";
                                }
                                ?>
                            </td>
                            <td><?php echo $row['temple_name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['aarti_time']; ?></td>
                            <td><?php echo $row['darsan_time']; ?></td>
                            <td>
                                <a href="temple_update.php?edit=<?php echo $row['id']; ?>" class="btn">Edit</a>
                                <a href="?delete=<?php echo $row['id']; ?>" class="btn" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        let templeIndex = 1;

        function addTemple() {
            const templeFields = document.getElementById('templeFields');
            const newGroup = document.createElement('div');
            newGroup.classList.add('temple-group');
            newGroup.innerHTML = `
                <input type="text" name="temple_name[]" placeholder="Temple Name" class="box" required>
                <input type="text" name="location[]" placeholder="Location" class="box" required>
                <input type="time" name="aarti_time[]" placeholder="Aarti Time" class="box" required>
                <input type="time" name="darsan_time[]" placeholder="Darsan Time" class="box" required>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="temple_image[${templeIndex}][]" class="box" multiple required>
            `;
            templeFields.appendChild(newGroup);
            templeIndex++;
        }
    </script>

</body>
</html>
