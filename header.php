<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Temple Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        .banner-image {
            background-image: url('b1.jpg');
            background-size: cover;
        }

        /* Navbar link styling */
        #ha1 {
            color: orangered;
        }

        /* Scroll effect */
        nav.navbar.bg-dark {
            transition: background-color 0.3s, box-shadow 0.3s;
        }
    </style>
</head>

<body>

<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
        <a href="Home.php" class="logo">
            <img src="1.png" id="lo1" height="90vh" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" id="ha1" href="Home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ha1" href="Donation.php">Donation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ha1" href="temple.php">Temples</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ha1" href="Shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ha1" href="Events.php">Events</a>
                </li>
                <li class="nav-item">
                    <?php
                    // Display login/logout based on session
                    if (isset($_SESSION['user_id'])) {
                        echo '<a href="logout.php" class="nav-link" id="login">Logout</a>';
                    } else {
                        echo '<a href="login.php" class="nav-link" id="login">Login</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow');
        } else {
            nav.classList.remove('bg-dark', 'shadow');
        }
    });
</script>

</body>
</html>
