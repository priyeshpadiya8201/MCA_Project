<?php



  $con = mysqli_connect("localhost","root","");
  mysqli_select_db($con,"test");
  
//   echo"<script>alert('con done')</script>";


    if(isset($_POST["don"]))
    { 
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    $tem_name = $_POST['tem_name'];
    $damount = $_POST['damount'];
    $pay_method = $_POST['pay_method'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    
    // insert query

    $query = "INSERT INTO `donation`(`d_id`, `f_name`, `l_name`, `email`, `mobile_no`, `tem_name`, `damount`, `pay_method`, `cardNumber`, `expiryDate`, `cvv`) VALUES ('','$f_name','$l_name','$email','$mobile_no','$tem_name','$damount','$pay_method','$cardNumber','$expiryDate','$cvv')";

    // echo $query;
   
    mysqli_query($con,$query);
    echo"<script type='text/javascript'> alert('donation successfully')</script>";
    mysqli_close($con);
    header("Location: receipt.php?f_name=$f_name&l_name=$l_name&email=$email&mobile_no=$mobile_no&tem_name=$tem_name&damount=$damount&pay_method=$pay_method&cardNumber=$cardNumber&expiryDate=$expiryDate&cvv=$cvv");
    exit; 
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

<link rel="stylesheet" href="donation.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.receipt-container {
    width: 80%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.receipt-details {
    margin-top: 20px;
}

.receipt-details p {
    margin: 5px 0;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}


</style>
</head>
<?php include("header.php");?>

<body id="do2">

    

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
            <img src="2.jpg" id="bi2">
            <div class="dark-overlay"></div>
            <div class="slide-text">Your generous donations are vital to support the noble cause of the temple, ensuring the continuity of spiritual services and community outreach programs.<br><br>
                <button class="button1" onclick="redirectToContainer()"><span>Donate Now </span></button>
             </div>
      </div>     
            
        <div class="swiper-slide"><img src="carousel-1.jpg" id="bi2"> 
            <div class="dark-overlay"></div>
            <div class="slide-text">Your temple donation fosters child education, nurturing bright futures and empowering generations to come.<br><br>
            <button class="button1" onclick="redirectToContainer()"><span>Donate Now </span></button>
            </div>
            
        </div>
        <div class="swiper-slide"><img src="mt.jpg" id="bi2"> 
            <div class="dark-overlay"></div>
            <div class="slide-text">Temple donations are utilized to support essential medical treatments, ensuring access to healthcare for those in need.<br><br>
            <button class="button1" onclick="redirectToContainer()"><span>Donate Now </span></button>
            </div>
        </div>

        <div class="swiper-slide"><img src="sr.jpg" id="bi2"> 
            <div class="dark-overlay"></div>
            <div class="slide-text">Temple donation amounts are dedicated to sustaining and enhancing spiritual services, fostering a sacred environment for worship, meditation, and community gatherings.<br><br>
            <button class="button1" onclick="redirectToContainer()"><span>Donate Now </span></button>
            
            </div>
            
        </div>


    </div>  
      <!-- <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
      <div class="swiper-slide">Slide 6</div>
      <div class="swiper-slide">Slide 7</div>
      <div class="swiper-slide">Slide 8</div>
      <div class="swiper-slide">Slide 9</div> -->
    
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
</div>



<hr id="hr1">
<div id="dnline">
    <h1 id="dt1" >"Your contributions empower the temple's mission, fostering education, healthcare, and community welfare."</h1>
</div>

<hr id="hr1">
    
<div class="containerdn">
        
            <h2 id="h1dn">Temple Donation</h2>

    
        
            <form method="POST" onsubmit="return checkLogin()">
                 <div class="form-groupdn">

                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="f_name" required>
                    </div>

                    <div class="form-groupdn">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="l_name" required>
                    </div>

                    <div class="form-groupdn">

                    <label for="mobileNo">Mobile No</label>
                    <input type="text" id="mobileNo" name="mobile_no" pattern="[0-9]{10}" maxlength="10" required>
                    </div>

                    <div class="form-groupdn">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="example999@gmail.com"required>
                    </div>

                    <div class="form-groupdn">

                    <label for="selectTemple">Select Temple</label>
                    <select id="selectTemple" name="tem_name" required>
                        <option value="">Select Temple</option>
                        <option value="Srikalahasti Temple" name="tem_name" >Srikalahasti Temple</option>
                        <option value="Tirumala venkateswara temple tirupati" name="tem_name">Tirumala venkateswara temple tirupati</option>
                        <option value="Tawang Monastery" name="tem_name">Tawang Monastery</option>
                        <option value="Shirdi Sai Baba Temple" name="tem_name">Shirdi Sai Baba Temple</option>

                        <option value="Siddhivinayak Temple" name="tem_name">Siddhivinayak Temple</option>

                        <option value="Dwarkadhish Temple" name="tem_name">Dwarkadhish Temple</option>

                        <option value="Somnath Temple" name="tem_name">Somnath Temple</option>
                        <option value="Kamakhya Temple" name="tem_name">Kamakhya Temple</option>
                        <option value="Umananda Temple" name="tem_name">Umananda Temple</option>
                        <option value="Mahabodhi Temple" name="tem_name">Mahabodhi Temple</option>


                        <!-- Add more options as needed -->
                    </select>
                    </div>

                    <div class="form-groupdn">
                    <label for="donationAmount">Donation Amount</label>
                    <input type="number" id="donationAmount" name="damount" max="99999" placeholder="Amount under 100,000" required>
                    </div>

                    <div class="form-group">
                    <label for="donationMethod">Donation Method</label>
                    <select id="donationMethod" name="pay_method" onchange="toggleCardDetails()" required>
                        <option value="">Select Donation Method</option>
                        <option value="debitCard"name="pay_method">Debit Card</option>
                        <option value="creditCard" name="pay_method">Credit Card</option>
                    </select>
                    </div>

                    <div class="card-details" id="cardDetails">
                    <div class="form-group">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" id="cardNumber" name="cardNumber" maxlength="16" required>
                    </div>

                    <div class="form-group">
                        <label for="expiryDate">Expiry Date (MM/YYYY)</label>
                        <input type="text" id="expiryDate" name="expiryDate"placeholder="MM/YYYY" required>
                    </div>

                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" maxlength="3" required>
                    </div>

                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" name="don" value="don" id="#donateButton">Donate</button>
                    </form>
    </div>


<hr id="hr1">




<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">What We Do</div>
                <h1 class="display-6 mb-5">Learn More What We Do And Get Involved</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-1.png" alt="">
                        <h4 class="mb-3">Child Education</h4>
                        <p class="mb-4">Support the future by providing educational opportunities for children in need.</p>
                        <!-- <a class="btn btn-outline-primary px-3" href="">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                        <h4 class="mb-3">Medical Treatment</h4>
                        <p class="mb-4">Help save lives and improve health outcomes by funding essential medical treatments and services.</p>
                        <!-- <a class="btn btn-outline-primary px-3" href="">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div> -->
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                        <h4 class="mb-3">Charitable Causes</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero dolor duo.</p>
                        <!-- <a class="btn btn-outline-primary px-3" href="">
                            Learn More
                            <div class="d-inline-flex btn-sm-square bg-primary text-white rounded-circle ms-2">
                                <i class="fa fa-arrow-right"></i>
                            </div> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
 <script>
    
//Function to redirect to containerdn and scroll to it
function redirectToContainer() {
  // Redirect logic goes here
  // For focusing on the first name input field, you can use the following code
  document.getElementById("firstName").focus();
}

function checkLogin() {
            // Check if the user is logged in
            // You can use any method to determine if the user is logged in, for example, checking for a session variable
            var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
            
            if (!isLoggedIn) {
                // If the user is not logged in, redirect them to the login page
                alert("You need to login first.");
                window.location.href = 'login.php'; // Replace 'login.php' with the actual path to your login page
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
        // Event listener for donate button click
        $('#donateButton').click(function() {
            // Check if user is logged in before proceeding with donation
            checkLoginStatus();
        });




        // auto slider
        var mySwiper = new Swiper('.mySwiper', {
    autoplay: {
        delay: 5000, // Delay between transitions in milliseconds
        disableOnInteraction: false, // Set to false if you want autoplay to continue even when user interacts with the slider
    },
    // Other parameters you might want to include
    loop: true, // Enable looping of slides
    pagination: {
        el: '.swiper-pagination', // Pagination container
    },
    navigation: {
        nextEl: '.swiper-button-next', // Next slide button
        prevEl: '.swiper-button-prev', // Previous slide button
    },
});


 


// Toggle card details
function toggleCardDetails() {
    var method = document.getElementById('pay_method').value;
    var cardDetails = document.getElementById('cardDetails');
    if (method === 'debitCard' || method === 'creditCard') {
        cardDetails.style.display = 'block';
        document.getElementById('cardNumber').required = true;
        document.getElementById('expiryDate').required = true;
        document.getElementById('cvv').required = true;
    } else {
        cardDetails.style.display = 'none';
        document.getElementById('cardNumber').required = false;
        document.getElementById('expiryDate').required = false;
        document.getElementById('cvv').required = false;
    }
}

// Form validation
function validateDonationForm() {
    var firstName = document.getElementById('f_name').value.trim();
    var lastName = document.getElementById('l_name').value.trim();
    var mobileNo = document.getElementById('mobile_no').value.trim();
    var email = document.getElementById('email').value.trim();
    var donationMethod = document.getElementById('pay_method').value;

    if (!firstName || !lastName) {
        alert('Enter your full name.');
        return false;
    }
    if (!/^\d{10}$/.test(mobileNo)) {
        alert('Enter a valid 10-digit mobile number.');
        return false;
    }
    if (!email.includes('@') || !email.includes('.')) {
        alert('Enter a valid email.');
        return false;
    }

    if (donationMethod === 'debitCard' || donationMethod === 'creditCard') {
        var cardNumber = document.getElementById('cardNumber').value.trim();
        var expiryDate = document.getElementById('expiryDate').value.trim();
        var cvv = document.getElementById('cvv').value.trim();

        if (!/^\d{16}$/.test(cardNumber)) {
            alert('Enter a valid 16-digit card number.');
            return false;
        }
        if (!/^\d{2}\/\d{4}$/.test(expiryDate)) {
            alert('Enter expiry date in MM/YYYY format.');
            return false;
        }
        if (!/^\d{3}$/.test(cvv)) {
            alert('Enter a valid 3-digit CVV.');
            return false;
        }
    }

    // Optional: login check
    var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    if (!isLoggedIn) {
        alert('You need to login first.');
        window.location.href = 'login.php';
        return false;
    }

    return true;
}
</script>

<?php include("footer.php"); ?>
</body>
</html>