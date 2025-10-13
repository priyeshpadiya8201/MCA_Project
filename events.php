<?php
require_once("db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Events Page</title>
    <link rel="stylesheet" href="events.css">
    <style>
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .event-details {
            animation: fadeIn 1s ease-in-out;
            margin-bottom: 50px;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 3px 12px rgba(0,0,0,0.1);
        }

        .event-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .event-images img {
            max-width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        h1, h2, h3, h5, p {
            margin: 5px 0;
        }

        .event-loc {
            color: #007bff;
            font-weight: 600;
        }
    </style>
</head>
<?php include("header.php"); ?>
<body id="evb">

<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">EVENTS</h1>
    </div>
</div>    

<div class="container">
<?php
$sql = "SELECT `e_id`, `e_name`, `e_img`, `e_date`, `e_location`, `e_dec` FROM `events` WHERE 1";
$all_product = $con->query($sql);

while($row = mysqli_fetch_assoc($all_product)){
    $images = explode(',', $row['e_img']); // Split comma-separated images
?>
    <div class="event-details">
        <h1><?php echo htmlspecialchars($row["e_name"]); ?></h1>

        <div class="event-images">
            <?php foreach ($images as $img): ?>
                <img src="uploaded_img/<?php echo trim($img); ?>" alt="<?php echo htmlspecialchars($row["e_name"]); ?>">
            <?php endforeach; ?>
        </div>

        <h3>Event Location</h3>
        <p class="event-loc"><?php echo htmlspecialchars($row["e_location"]); ?></p>

        <h3>Event Date</h3>
        <h5><?php echo htmlspecialchars($row["e_date"]); ?></h5> 

        <h2>Description</h2>
        <p><?php echo nl2br(htmlspecialchars($row["e_dec"])); ?></p>
    </div>
<?php } ?>
</div>

<script src="confetti.js"></script>
<script>
const start = () => setTimeout(() => confetti.start(), 100);
const stop = () => setTimeout(() => confetti.stop(), 1500);
start();
stop();
</script>

</body>
<?php include("footer.php"); ?>
</html>
