<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Order Success</title>
<style>
body { font-family: 'Poppins', sans-serif; background:#f2f2f2; display:flex; justify-content:center; align-items:center; height:100vh; }
.container { background:#fff; padding:25px; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1); text-align:center; }
.btn { background:#ff4d00; color:#fff; border:none; padding:12px 20px; margin-top:20px; cursor:pointer; border-radius:5px; }
.btn:hover { background:#e55300; }
</style>
</head>
<body>
<div class="container">
    <h2>Order Placed Successfully!</h2>
    <p>Your invoice has been generated: <strong>invoice.txt</strong></p>
    <a href="invoice.txt" download><button class="btn">Download Invoice</button></a>
    <br><br>
    <a href="shop.php"><button class="btn">Back to Shop</button></a>
</div>
</body>
</html>
