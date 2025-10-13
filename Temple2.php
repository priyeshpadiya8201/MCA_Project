<!DOCTYPE html>
<html lang="en">
<head>
    <title>Temple Inforamation</title>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
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
        }
        .input-box{
            animation: fadeIn 1s ease-in-out;
        }
    </style>
    
    <script>
        // JavaScript function to handle the search functionality
        function search() {
            var input, filter, cards, card, title, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            cards = document.getElementsByClassName("card");

            // Loop through all temple cards, hide those that do not match the search query
            for (i = 0; i < cards.length; i++) {
                card = cards[i];
                title = card.querySelector(".details h3");
                txtValue = title.textContent || title.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }

        
    </script>
</head>


<?php include("header.php");?>
<body id="bdt">

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">TEMPLES</h1>
            <!-- <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Our Team</li>
                </ol>
            </nav> -->
        </div>
    </div>    

    <br><br> <br><br>

        

   <!-- <div class="con2">
   <div class="input-box">
        <i class="uil uil-search"></i>
        <input type="text" id="searchInput" onkeyup="search()" placeholder="Search here...">
        <button class="button" onclick="search()">Search</button>
    </div> -->

        <br><br><br><br><br>
    <br>
    <form method="POST">
    <div class="cardst" >
        <!-- <a href="events.php"> -->
        <!-- <a href="t1.php"> -->
            
        <div class="card" id="cd1">
        <a href="t1.php?Dwarkadhish=<?php echo 'Temple Info';?>">

            <div class="container1">
                <img src="temple/Gujarat/Dwarkadhish Temple, Dwarka/1649075905366239894.jpg" alt="las vegas" id="img12">
            </div>
        </a>
            <div class="details">
                <h3 style="color:orangered">Dwarkadhish Temple</h3>
                <p>The Dwarkadhish Temple, located in the ancient city of Dwarka in Gujarat, India, is a revered Hindu temple dedicated to Lord Krishna, also known as Dwarkadhish, the 'King of Dwarka'. It stands as a significant pilgrimage site and architectural marvel, attracting devotees and tourists alike with its rich history and spiritual ambiance.🙏</p>
            </div>
        </div>

        <div class="card" id="cd1">
        <a href="t1.php?Somnath=<?php echo 'Temple Info';?>">

            <div class="container1">
                <img src="temple/Gujarat/Somnath Temple/SomnathTemple_20191001125412.jpg" alt="las vegas" id="img12">
            </div>
        </a>
            <div class="details">
                <h3 style="color:orangered">Somnath Temple</h3>
                <p>The Somnath Temple, located in Gujarat, India, is one of the most sacred and ancient Hindu pilgrimage sites, revered as the first among the twelve Jyotirlinga shrines of Lord Shiva. Its history is rich, spanning centuries of devotion, destruction, and reconstruction, symbolizing resilience and spiritual significance.🙏🙏</p>
            </div>
        </div>

        <div class="card card4" id="cd1">
        <a href="t1.php?Kamakhya=<?php echo 'Temple Info';?>">

            <div class="container1">
                <img src="temple/Assam/Kamakhya Temple, Guwahati/download (1).jpeg" alt="las vegas" id="img12">
            </div>
        </a>
            <div class="details">
                   <h3 style="color:orangered">Kamakhya Temple, Guwahati</h3>
                <p>The Kamakhya Temple, located atop the Nilachal Hill in Guwahati, Assam, is a revered Hindu pilgrimage site dedicated to the Goddess Kamakhya. It is known for its unique architecture and association with tantric rituals, drawing devotees and tourists alike.🙏🙏</p>
            </div>
        </div>

        <div class="card card4" id="cd1">
        <a href="t1.php?Umananda=<?php echo 'Temple Info';?>">

            <div class="container1">
                <img src="temple/Assam/Umananda Temple, Guwahati/download (3).jpeg" alt="las vegas" id="img12">
            </div>
        </a>
            <div class="details">
                <h3 style="color:orangered">Umananda Temple, Guwahati</h3>
                <p>The Umananda Temple, situated on the Peacock Island in the Brahmaputra River near Guwahati, Assam, is dedicated to Lord Shiva. Accessible by boat, it is a sacred pilgrimage site revered for its picturesque location and spiritual significance in the region.🙏🙏</p>
            </div>
        </div>

        <div class="card card4" id="cd1">
        <a href="t1.php?Mahabodhi=<?php echo 'Temple Info';?>">

            <div class="container1">
                <img src="temple/Bihar/Mahabodhi Temple, Bodh Gaya/download (1).jpeg" alt="las vegas" id="img12">
            </div>
        </a>
            <div class="details">
                <h3 style="color:orangered">Mahabodhi Temple, Bodh Gaya</h3>
                <p>The Mahabodhi Temple, located in Bodh Gaya, Bihar, India, is a UNESCO World Heritage Site and one of the most sacred pilgrimage destinations for Buddhists worldwide. It marks the spot where Siddhartha Gautama attained enlightenment and became the Buddha over 2,500 years ago.🙏🙏</p>
            </div>
        </div>

        <div class="card card4" id="cd1">
        <a href="t1.php?Vishnupad=<?php echo 'Temple Info';?>">

            <div class="container1">
                <img src="temple/Bihar/Vishnupad Mandir, Gaya/download (4).jpeg" alt="las vegas" id="img12">
            </div>
        </a>
            <div class="details">
                <h3 style="color:orangered">Vishnupad Mandir, Gaya</h3>
                <p>Vishnupad Mandir, located in Gaya, Bihar, is a sacred Hindu temple dedicated to Lord Vishnu. It is renowned for housing a footprint believed to belong to Lord Vishnu, attracting pilgrims seeking spiritual blessings and performing ancestral rites.🙏🙏</p>
            </div>
        </div>
        
    </div>
  </div>
</form>

        <h2 class="apagesno" id="tppages">Page2</h2>
    <br><br>
    <div id="tppages">
    <a href="Temple.php"><button class="pagesno">1</button></a>
    <a href="Temple2.php"><button class="pagesno">2</button></a>
    

    </div>
    <br><br><br><br><br><br>
    
   
</body>
<?php include 'footer.php';?>



</html>