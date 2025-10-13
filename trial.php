<?php

$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");

//   echo"<script>alert('con done')</script>";


  if(isset($_POST["place"]))
  { 
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $m_number = $_POST['m_number'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  
  // insert query

  $query = "INSERT INTO `registraction`(`id`, `fullname`, `email`, `address`, `m_number`, `city`, `state`, `pincode`) VALUES ('','$fullname','$email','$address','$m_number','$city','$state','$pincode')";

  // echo $query;
 
  mysqli_query($con,$query);
  echo"<script type='text/javascript'> alert('donation successfully')</script>";
  // mysqli_close($con);
  
   
}
?>
<html>
    <head>
        <style>

        </style>
    </head>
    <body>
        
        
      <form method="POST">
      
        <div class="row">
          <div class="col-50">
          
        <h3>Product Details</h3>
        <label for="product">Product Name:</label>
        <input type="text" id="product" name="product" value="<?php echo $productName; ?>" readonly>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo $productPrice; ?>" readonly>
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="soneji sagar v.">

            


            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="wammu12@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="plot no 542 W. 15th Street ">

            
            <label for="mobileNo"><i class="fa fa-mobile mobile-icon"></i> Mobile No</label>
            <input type="text" id="mobileNo" name="m_number" pattern="[0-9]{10}" required>

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="rajkot">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Gujrat">
              </div>
              <div class="col-50">
                <label for="zip">Pincode</label>
                <input type="text" id="pincode" name="pincode" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="payment">Payment Method</label><br>
            <label class="payment-option" for="credit">Credit Card</label>
            <input type="radio" id="credit" name="payment" value="credit" onclick="showPaymentFields()"> 
            <label class="payment-option" for="debit">Debit Card</label>
            <input type="radio" id="debit" name="payment" value="debit" onclick="showPaymentFields()"> 
            <label class="payment-option" for="cash">Cash on Delivery</label>
            <input type="radio" id="cash" name="payment" value="cash" onclick="hidePaymentFields()">
            <bR><br>


            <div id="payment-fields">
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="soneji sagar vijaykumar">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>


            </div>
          </div>

          
          
        </div>
        

        <a href="succees.php" class="btn" name="place">Place Order</a>
        <a href="shop.php" id="btn" ><input type="button" class="btn" value="back"  ></a>
      </form>
    </body>
</html>