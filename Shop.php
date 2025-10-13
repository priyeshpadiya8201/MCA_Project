<?php
session_start();
require_once 'db.php';

// Initialize cart session
if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add product to cart
if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_qty = $_POST['product_qty'];

    // If product already in cart, increase quantity
    if(isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $product_qty;
    } else {
        $_SESSION['cart'][$product_id] = array(
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $product_qty
        );
    }
}

// Remove product from cart
if(isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    unset($_SESSION['cart'][$remove_id]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Offline Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Shop.css">

    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Header */
        .page-header {
           
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .page-header h1 {
            font-size: 48px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Product Cards */
        .card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 15px;
            margin: 15px;
            width: 300px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease-in-out;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.15);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card h4 {
            color: #ff4d00;
            font-weight: 600;
        }

        .price {
            color: #ff4d00;
            font-weight: 700;
            font-size: 18px;
        }

        .rowshop {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Buttons */
        .btn {
            border: none;
            border-radius: 5px;
            padding: 8px 14px;
            color: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-success {
            background: #ff4d00;
        }

        .btn-success:hover {
            background: #e55300;
        }

        .btn-danger {
            background: #343a40;
        }

        .btn-danger:hover {
            background: #555;
        }

        /* --- PROFESSIONAL CART TABLE --- */
        .cart-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        table.cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .cart-table th {
            background: #ff4d00;
            color: white;
            text-transform: uppercase;
            padding: 14px;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        .cart-table td {
            background: #fff;
            padding: 14px;
            vertical-align: middle;
            font-size: 15px;
            border-top: 1px solid #f0f0f0;
            border-bottom: 1px solid #f0f0f0;
        }

        .cart-table tr:hover td {
            background: #fff8f5;
        }

        .cart-table tr:last-child td {
            border-bottom: none;
        }

        .cart-total {
            font-weight: 700;
            color: #ff4d00;
        }

        .btn-checkout {
            display: inline-block;
            background: linear-gradient(135deg, #ff4d00, #e55300);
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-checkout:hover {
            background: linear-gradient(135deg, #e55300, #ff4d00);
            transform: translateY(-2px);
        }

        /* Empty cart text */
        .empty-cart {
            text-align: center;
            color: #777;
            font-size: 18px;
            margin-top: 40px;
        }

        @media(max-width: 768px) {
            .card { width: 90%; }
            .cart-container { padding: 15px; }
            table.cart-table th, table.cart-table td { font-size: 14px; }
        }
    </style>
</head>

<?php include("header.php"); ?>

<body id="sp2">

<!-- Header -->
<div class="container-fluid page-header mb-5">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-4">SHOP</h1>
    </div>
</div>

<!-- Product Section -->
<div class="container10">
    <div class="rowshop">
        <?php
        $sql = "SELECT p_id, p_img, p_name, p_dec, p_price, p_stock FROM product";
        $all_product = mysqli_query($con, $sql);

        while($row = mysqli_fetch_assoc($all_product)) {
        ?>
        <div class="card">
            <img src="admin/uploaded_img/<?php echo $row['p_img'];?>" alt="">
            <h4><?php echo $row['p_name'];?></h4>
            <p><?php echo $row['p_dec'];?></p>
            <p class="price">₹<?php echo $row['p_price'];?></p>
            <p>Available Stock: <?php echo $row['p_stock'];?></p>
            
            <form method="post" action="">
                <input type="hidden" name="product_id" value="<?php echo $row['p_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row['p_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['p_price']; ?>">
                <input type="number" name="product_qty" value="1" min="1" max="<?php echo $row['p_stock']; ?>" class="form-control mb-2" required>
                <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-success">
            </form>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Cart Section -->
<div class="container mt-5 cart-container">
    <h3 class="mb-4"> Your Cart</h3>
    <?php if(!empty($_SESSION['cart'])) { ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $grand_total = 0;
                foreach($_SESSION['cart'] as $id => $product) { 
                    $subtotal = $product['price'] * $product['quantity'];
                    $grand_total += $subtotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td>₹<?php echo htmlspecialchars($product['price']); ?></td>
                    <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                    <td class="cart-total">₹<?php echo $subtotal; ?></td>
                    <td><a href="shop.php?remove=<?php echo $id; ?>" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3" align="right"><strong>Total:</strong></td>
                    <td colspan="2" class="cart-total">₹<?php echo $grand_total; ?></td>
                </tr>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="checkout.php" class="btn-checkout">Proceed to Checkout</a>
        </div>
    <?php } else { ?>
        <p class="empty-cart">Your cart is empty. Add some items to begin shopping!</p>
    <?php } ?>
</div>

</body>
<?php include("footer.php"); ?>
</html>
