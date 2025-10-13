<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attractive Sidebar</title>
  <link rel="stylesheet" href="sidebar.css">
</head>
<body>

<div class="sidebar" id="sidebar">
  <button class="closebtn" onclick="closeSidebar()">×</button>
  <h2>Sidebar</h2>
  <a href="#">Home</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Contact</a>
</div>

<div class="content">
  <button class="openbtn" onclick="openSidebar()">☰ Open Category</button>
  <p>Main content goes here...</p>
</div>

<script src="sidebar.js"></script>
</body>
</html>
