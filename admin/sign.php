<?php
// Include the database connection file
require_once 'db.php';

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
                                                
    // Check if the username already exists
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        $error = "Username already exists. Please choose a different username.";
    } 
    else 
    {
        // Insert the new user into the database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $insert_result = mysqli_query($con, $query);

        if($insert_result) {
            $success_message = "Signup successful. You can now login.";
        } else {
            $error = "Error: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Signup</button>
        </div>
        <?php if(isset($error)) { ?>
            <div><?php echo $error; ?></div>
        <?php } ?>
        <?php if(isset($success_message)) { ?>
            <div><?php echo $success_message; ?></div>
        <?php } ?>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
