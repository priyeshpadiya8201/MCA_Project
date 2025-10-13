<!DOCTYPE html >
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home Page</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/locomotive-scroll.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll/dist/locomotive-scroll.min.css">

    <link rel="stylesheet" href="home.css">
    <style>
        
        
        /* Add initial opacity to the service class */
        .service {
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        /* Define the fade-in animation */
        .fade-in {
            opacity: 1;
        }
        
    </style>
</head>
<?php include("header.php");?>
    
<body>
   
        
    
    <div id="imgt" >
    <div class="main">
    <!-- <div id="btext"> --><br>
    <br><br><br><br><br><br><br><br><br>
             <h1 class="welcome-text" id="w1">Welcome</h1> 
             <h1 class="To-text" style="margin-left:220px;" id="w1">To</h1>
             <h1 class="shamballa-text" id="w1">Shamballa</h1>
        </div>

    </div>
    
    
    <div clas="space"></div>
    <div class="service">

        <p id="p1">our services are here</p>
        <div id="ti"><br>
            <h1>Temple Inforamation</h1><br>
            <p style="color:black" id="dd1">Welcome to the Shamballa Hindu Temple! Here, we offer a serene sanctuary where devotees can connect with the divine. Our temple is rich in history and tradition, offering a space for spiritual growth and reflection.</p><br>
                <h2>Darshan Time:</h2><br>
                    <p style="color:black" id="dd1">Visit us during our darshan hours to seek blessings and immerse yourself in the divine presence. Our doors are open to all who seek solace and enlightenment.</p><br>
                <h2>Aarti Time:</h2><br>
                    <p style="color:black" id="dd1">Join us in our daily aarti ceremonies, where we express our devotion through song and prayer. Experience the uplifting energy as we offer our prayers to the deities.</p><br>
                <h2>History:</h2><br>
                    <p style="color:black" id="dd1">Explore the rich history of Shamballa Hindu Temple, tracing its origins and significance in Hindu culture. Learn about the founders, the journey of the temple, and its cultural importance in the community.</p><br>
                <h2>Gallery:</h2><br>
                    <p style="color:black" id="dd1">Delve into our gallery to witness the beauty and grandeur of our temple. From intricate architecture to vibrant rituals, experience the essence of Hindu spirituality captured in every detail.</p><br>
                    <a href="temple.php" target="temple" id="more">More detail..</a> <br><br>
        
        </div><br><br>
        <div id="donation"><br>
            <h1>Donation</h1><br>

            <p style="color:black" id="dd1">Your generous contributions support the upkeep and activities of our temple. Your donations enable us to continue serving the community, preserving our traditions, and fostering spiritual growth among devotees. Every contribution, no matter the size, is deeply appreciated and goes a long way in sustaining our sacred space.</p><br>
            <a href="Donation.php" target="donation" id="more">More detail..</a> <br><br>
        </div><br><br>

        <div id="shop"><br>
            <h1>Shop</h1><br>

            <p style="color:black" id="dd1">Explore our temple shop to discover a treasure trove of spiritual items and souvenirs. From sacred statues and incense to devotional literature and apparel, find everything you need to enrich your spiritual journey. Take a piece of the temple home with you and keep the divine presence alive in your heart.</p><br>
            <a href="Shop.php" target="temple" id="more">More detail..</a> <br><br>
        </div><br><br>

        <div id="event"><br>
            <h1>Events</h1><br>

            <p style="color:black"; id="dd1">Stay updated on upcoming events and celebrations at Shamballa Hindu Temple. From festivals and cultural performances to spiritual workshops and guest lectures, there's always something happening to nourish the soul and strengthen the community bond. Join us in our festivities and be part of the vibrant tapestry of our temple life.</p><br>
            <a href="events.php" target="temple" id="more">More detail..</a> <br><br>
        </div><br><br>
        

    </div>
   
        </div>
    
    <script>    
        
    document.addEventListener('DOMContentLoaded', function () {
        const scroll = new LocomotiveScroll({
            el: document.querySelector('[data-scroll-container]'),
            smooth: true
            // Add any additional options you need
        });
    });

    window.addEventListener('scroll', function() {
            var service = document.querySelector('.service');
            var servicePosition = service.getBoundingClientRect().top;
            var screenHeight = window.innerHeight;

            if (servicePosition < screenHeight) {
                service.classList.add('fade-in');
            }
        });</script>
    
</body>
<?php include("footer.php");?>

</html>