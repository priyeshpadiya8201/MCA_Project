<?php
@include 'db.php';

// Pagination setup
$limit = 3; // Temples per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search filter
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';

// Count total temples with optional search
$count_query = "SELECT COUNT(*) as total FROM temples WHERE 1";
if (!empty($search)) {
    $count_query .= " AND location LIKE '%$search%'";
}
$total_result = mysqli_query($con, $count_query);
$total_row = mysqli_fetch_assoc($total_result);
$total_pages = ceil($total_row['total'] / $limit);

// Fetch temples for current page with optional search
$select_query = "SELECT id, temple_name, temple_images, location, aarti_time, darsan_time FROM temples WHERE 1";
if (!empty($search)) {
    $select_query .= " AND location LIKE '%$search%'";
}
$select_query .= " ORDER BY id DESC LIMIT $start, $limit";
$select = mysqli_query($con, $select_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Temple Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="temple.css">
    <style>
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .card {
            animation: fadeIn 1s ease-in-out;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .details {
            padding: 15px;
        }

        .details h3 {
            margin: 0 0 8px 0;
            color: orangered;
        }

        .details p {
            font-size: 14px;
            color: #555;
            line-height: 1.4;
        }

        .cardst {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: -6px;
        }

        .cardst .card {
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }

        @media(max-width: 768px) {
            .cardst .card {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media(max-width: 480px) {
            .cardst .card {
                flex: 1 1 100%;
            }
        }

        .pagination {
            text-align: center;
            margin-top: 30px;
        }

        .pagination a {
            padding: 8px 16px;
            margin: 0 4px;
            background: #343a40;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .pagination a.active {
            background: orangered;
        }

        .pagination a:hover {
            background: #555;
        }

        /* Search Form */
        .search-form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .search-form input[type="text"] {
            padding: 12px 15px;
            width: 350px;
            max-width: 90%;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .search-form input[type="submit"] {
            padding: 12px 25px;
            background: orangered;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-form input[type="submit"]:hover {
            background: #e55300;
        }

        @media(max-width: 480px) {
            .search-form {
                flex-direction: column;
            }

            .search-form input[type="text"],
            .search-form input[type="submit"] {
                width: 70%;
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>

    <?php include("header.php"); ?>

    <!-- Page Header -->
    <div class="container-fluid page-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-4">TEMPLES</h1>
        </div>
    </div>

    <div class="container">
        <!-- Search Filter -->
        <div class="search-form">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search by location" value="<?php echo htmlspecialchars($search); ?>">
                <input type="submit" value="Search">
            </form>
        </div>

        <div class="cardst">
            <?php while ($row = mysqli_fetch_assoc($select)) {
                $images = explode(',', $row['temple_images']);
                $first_image = !empty($images[0]) ? $images[0] : 'placeholder.jpg';
            ?>
                <div class="card">
                    <img src="uploaded_img/<?php echo htmlspecialchars($first_image); ?>" alt="<?php echo htmlspecialchars($row['temple_name']); ?>">
                    <div class="details">
                        <h3><?php echo htmlspecialchars($row['temple_name']); ?></h3>
                        <p>
                            Location: <?php echo htmlspecialchars($row['location']); ?><br>
                            Aarti: <?php echo htmlspecialchars($row['aarti_time']); ?><br>
                            Darsan: <?php echo htmlspecialchars($row['darsan_time']); ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?><?php if (!empty($search)) echo '&search=' . urlencode($search); ?>" class="<?php if ($i == $page) echo 'active'; ?>"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>

    <br><br><br><br><br><br>
    <?php include 'footer.php'; ?>

</body>

</html>