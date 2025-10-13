<?php
session_start();
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "test");

// Generate dummy order reference
$order_ref = "ORD-" . strtoupper(substr(md5(time()), 0, 8));

// Combine cart items
$productNames = array();
$totalAmount = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $productNames[] = $item['name'] . " (x" . $item['quantity'] . ")";
        $totalAmount += $item['price'] * $item['quantity'];
    }
}
$productList = implode(", ", $productNames);

// On order place
if (isset($_POST["place"])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $m_number = $_POST['m_number'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $ship_address = $_POST['ship_address'];
    $o_ref = $_POST['o_ref'];
    $o_name = $_POST['o_name'];
    $o_amt = $_POST['o_amt'];
    $p_method = $_POST['p_method'];
    $c_name = $_POST['c_name'];
    $c_no = $_POST['c_no'];
    $exp_m = $_POST['exp_m'];
    $exp_y = $_POST['exp_y'];
    $c_cvv = $_POST['c_cvv'];

    // Insert into registration
    $q1 = "INSERT INTO registraction (fullname, email, address, m_number, city, state, pincode)
           VALUES ('$fullname', '$email', '$address', '$m_number', '$city', '$state', '$pincode')";
    $r1 = mysqli_query($con, $q1);

    if ($r1) {
        $q2 = "INSERT INTO `order` (o_ref, o_name, o_amt, p_method, c_name, c_no, exp_m, exp_y, c_cvv, ship_address)
               VALUES ('$o_ref', '$o_name', '$o_amt', '$p_method', '$c_name', '$c_no', '$exp_m', '$exp_y', '$c_cvv', '$ship_address')";
        $r2 = mysqli_query($con, $q2);
        if ($r2) {
            // Generate invoice.txt
            $invoiceContent = "Order Reference: $o_ref\n";
            $invoiceContent .= "Products: $o_name\n";
            $invoiceContent .= "Grand Total: ₹$o_amt\n";
            $invoiceContent .= "Payment Method: $p_method\n";

            file_put_contents("invoice.txt", $invoiceContent);

            $_SESSION['cart'] = array(); // Clear cart
            header("Location: succees.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Checkout (Offline)</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #ff4d00;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: 500;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            background: #ff4d00;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }

        .btn:hover {
            background: #e55300;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-50 {
            flex: 50%;
            padding: 15px;
        }

        input[readonly] {
            background: #eee;
        }

        @media(max-width:768px) {
            .row {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" onsubmit="return validateForm()">
            <div class="row">
                <div class="col-50">
                    <h2>Order Summary</h2>
                    <label>Order Reference ID</label>
                    <input type="text" name="o_ref" value="<?php echo $order_ref; ?>" readonly>

                    <label>Product(s)</label>
                    <input type="text" name="o_name" value="<?php echo $productList; ?>" readonly>

                    <label>Total Amount (₹)</label>
                    <input type="text" name="o_amt" value="<?php echo $totalAmount; ?>" readonly>

                    <h2>Billing Address</h2>
                    <label>Full Name</label>
                    <input type="text" name="fullname" id="fullname" required>
                    <label>Email</label>
                    <input type="text" name="email" id="email" required>
                    <label>Mobile No</label>
                    <input type="text" name="m_number" id="m_number" maxlength="10" required>
                    <label>Address</label>
                    <textarea name="address" id="address" required></textarea>
                    <label>City</label>
                    <input type="text" name="city" id="city" required>
                    <label>State</label>
                    <input type="text" name="state" id="state" required>
                    <label>Pincode</label>
                    <input type="text" name="pincode" id="pincode" maxlength="6" required>

                    <h2>Shipping Address</h2>
                    <label><input type="checkbox" id="sameAddress"> Same as Billing Address</label>
                    <textarea name="ship_address" id="ship_address" placeholder="Enter Shipping Address" required></textarea>
                </div>

                <div class="col-50">
                    <h2>Payment Details</h2>
                    <label><input type="radio" name="p_method" value="Credit Card" onclick="showPayment()"> Credit Card</label>
                    <label><input type="radio" name="p_method" value="Debit Card" onclick="showPayment()"> Debit Card</label>
                    <label><input type="radio" name="p_method" value="Cash on Delivery" onclick="hidePayment()"> Cash on Delivery</label>

                    <div id="payment-fields" style="display:none;">
                        <label>Name on Card</label>
                        <input type="text" name="c_name" id="c_name">
                        <label>Card Number (XXXX-XXXX-XXXX)</label>
                        <input type="text" name="c_no" id="c_no" maxlength="14" placeholder="####-####-####" oninput="formatCard(this)">
                        <label>Exp Month</label>
                        <select name="exp_m" id="exp_m">
                            <option value="">Select</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                        <label>Exp Year</label>
                        <input type="text" name="exp_y" id="exp_y" maxlength="4" placeholder="YYYY">
                        <label>CVV</label>
                        <input type="text" name="c_cvv" id="c_cvv" maxlength="3" placeholder="XXX">
                    </div>
                </div>
            </div>

            <button type="submit" name="place" class="btn">Place Order</button>
            <a href="shop.php"><button type="button" class="btn">Back</button></a>
        </form>
    </div>

  <script>
    // Auto-copy billing address to shipping
    document.getElementById('sameAddress').addEventListener('change', function() {
        document.getElementById('ship_address').value = this.checked 
            ? document.getElementById('address').value 
            : '';
    });

    // Show/hide card fields
    function showPayment() {
        document.getElementById("payment-fields").style.display = "block";
    }
    function hidePayment() {
        document.getElementById("payment-fields").style.display = "none";
    }

    // Format card number ####-####-#### (dummy formatting)
    function formatCard(input) {
        let value = input.value.replace(/\D/g, '').substring(0, 12);
        let formatted = value.match(/.{1,4}/g);
        input.value = formatted ? formatted.join('-') : value;
    }

    // Dummy form validation
    function validateForm() {
        const name = document.getElementById('fullname').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('m_number').value.trim();
        const pincode = document.getElementById('pincode').value.trim();
        const method = document.querySelector('input[name="p_method"]:checked');

        if (!name) { alert("Enter your full name"); return false; }
        if (!email.includes('@') || !email.endsWith('.com')) {
            alert("Enter valid email (must contain @ and end with .com)");
            return false;
        }
        if (phone && phone.length !== 10) { alert("Enter 10-digit phone number"); return false; }
        if (pincode && pincode.length !== 6) { alert("Enter 6-digit pincode"); return false; }
        if (!method) { alert("Select a payment method"); return false; }

        // Only basic check for card fields if payment is not COD
        if (method && method.value !== "cash on delivery") {
            const c_name = document.getElementById('c_name').value.trim();
            const c_no = document.getElementById('c_no').value.trim();
            const exp_m = document.getElementById('exp_m').value.trim();
            const exp_y = document.getElementById('exp_y').value.trim();
            const c_cvv = document.getElementById('c_cvv').value.trim();

            if (!c_name) { alert("Enter cardholder name"); return false; }
            if (!c_no || c_no.length < 12) { alert("Enter card number (dummy format ####-####-####)"); return false; }
            if (!exp_m || !exp_y) { alert("Enter expiry month/year"); return false; }
            if (!c_cvv || c_cvv.length < 3) { alert("Enter CVV"); return false; }
        }

        return true;
    }
</script>

</body>

</html>