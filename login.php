<?php

  include("connect.php");
  
  if(isset($_POST["Signup"]))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    // insert query

    $query = "INSERT INTO `signup`(`user_id`, `username`, `password`) VALUES ('','$username','$password')";
    mysqli_query($con,$query);
    echo"<script type='text/javascript'> alert('Signup Successfully')</script>";
  }
?>
<?php 

session_start();


require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($username) && !empty($password) && !is_numeric($username)) {

      // Check if admin login
      if ($username === '@admin' && $password === '9703') {
          // Admin login successful
          $_SESSION['admin'] = true;
          echo "<script type='text/javascript'> alert('Admin login successful!')</script>";
          header("Location: admin/donation.php");
          exit(); // Stop further execution
      }

      
      // Read from database for regular users
      $query = "SELECT * FROM signup WHERE username = '$username' AND password = '$password' LIMIT 1";
      $result = mysqli_query($con, $query);

      if ($result && mysqli_num_rows($result) > 0) {
          $user_data = mysqli_fetch_assoc($result);
          // Regular user login successful
          $_SESSION['user_id'] = $user_data['user_id'];
          echo "<script type='text/javascript'> alert('Login successfully!!')</script>";
          header("Location: home.php");
          exit(); // Stop further execution
      }
  }

  echo "<script type='text/javascript'> alert('Wrong username or password!')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In / Sign Up</title>
  <style>
      
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
html,body{
  display: grid;
  height: 100%;
  width: 100%;
  place-items: center;
  /* background: -webkit-linear-gradient(left, #003366,#004080,#0059b3
, #0073e6); */
background: url(../shamballa/2.jpg);
background-repeat: no-repeat;
background-size:cover;

}
::selection{
  background: #1a75ff;
  color: #fff;
}
.wrapper{
  
  overflow: hidden;
  max-width: 390px;
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
}
.wrapper .title-text{
  display: flex;
  width: 200%;
}
.wrapper .title{
  width: 50%;
  font-size: 35px;
  font-weight: 600;
  text-align: center;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.wrapper .slide-controls{
  position: relative;
  display: flex;
  height: 50px;
  width: 100%;
  overflow: hidden;
  margin: 30px 0 10px 0;
  justify-content: space-between;
  border: 1px solid lightgrey;
  border-radius: 15px;
}
.slide-controls .slide{
  height: 100%;
  width: 100%;
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-align: center;
  line-height: 48px;
  cursor: pointer;
  z-index: 1;
  transition: all 0.6s ease;
}
.slide-controls label.signup{
  color: #000;
}
.slide-controls .slider-tab{
  position: absolute;
  height: 100%;
  width: 50%;
  left: 0;
  z-index: 0;
  border-radius: 15px;
  background: -webkit-linear-gradient(left,#003366,#004080,#0059b3
, #0073e6);
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
input[type="radio"]{
  display: none;
}
#signup:checked ~ .slider-tab{
  left: 50%;
}
#signup:checked ~ label.signup{
  color: #fff;
  cursor: default;
  user-select: none;
}
#signup:checked ~ label.login{
  color: #000;
}
#login:checked ~ label.signup{
  color: #000;
}
#login:checked ~ label.login{
  cursor: default;
  user-select: none;
}
.wrapper .form-container{
  width: 100%;

overflow: hidden;
}
.form-container .form-inner{
  display: flex;
  width: 200%;
}
.form-container .form-inner form{
  width: 50%;
  transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
}
.form-inner form .field{
  height: 50px;
  width: 100%;
  margin-top: 20px;
}
.form-inner form .field input{
  height: 100%;
  width: 100%;
  outline: none;
  padding-left: 15px;
  border-radius: 15px;
  border: 1px solid lightgrey;
  border-bottom-width: 2px;
  font-size: 17px;
  transition: all 0.3s ease;
}
.form-inner form .field input:focus{
  border-color: #1a75ff;
  /* box-shadow: inset 0 0 3px #fb6aae; */
}
.form-inner form .field input::placeholder{
  color: #999;
  transition: all 0.3s ease;
}
form .field input:focus::placeholder{
  color: #1a75ff;
}
.form-inner form .pass-link{
  margin-top: 5px;
}
.form-inner form .signup-link{
  text-align: center;
  margin-top: 30px;
}
.form-inner form .pass-link a,
.form-inner form .signup-link a{
  color: #1a75ff;
  text-decoration: none;
}
.form-inner form .pass-link a:hover,
.form-inner form .signup-link a:hover{
  text-decoration: underline;
}
form .btn{
  height: 50px;
  width: 100%;
  border-radius: 15px;
  position: relative;
  overflow: hidden;
}
form .btn .btn-layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right,#003366,#004080,#0059b3
, #0073e6);
  border-radius: 15px;
  transition: all 0.4s ease;;
}
form .btn:hover .btn-layer{
  left: 0;
}
form .btn input[type="submit"]{
  height: 100%;
  width: 100%;
  z-index: 1;
  position: relative;
  background: none;
  border: none;
  color: #fff;
  padding-left: 0;
  border-radius: 15px;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
}
/* back button */

.back-button {
    margin-right: 90%;
    display: inline-block;
    padding: 10px 20px;
    
    background: -webkit-linear-gradient(right,#003366,#004080,#0059b3, #0073e6);
    transition: all 0.6s cubic-bezier(0.68,-0.55,0.265,1.55);
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease; 
  }

  .back-button:hover {
    background-color: #0056b3;
  }

  
@keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        .wrapper,.back-button {
            animation: fadeIn 0.5s ease-in-out;
        }
        .input-box{
            animation: fadeIn 1s ease-in-out;
        }

    </style>
</head>
<body>
  
<a href="Home.php" onclick="history.back();" class="back-button">Back</a>
  <div class="wrapper">

    <div class="title-text">
      <div class="title login">Login Form</div>
      <div class="title signup">Signup Form</div>
    </div>

    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab"></div>
      </div>
      
      <div class="form-inner">
        <form action="" class="login" method="POST">
          <div class="field">
            <input type="text" placeholder="Username" id="username" name="username"required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" id="password" name="password" required>
          </div>
          <!-- <div class="pass-link"><a href="#">Forgot password?</a></div> -->
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login" name="Login" id="Login">
            
            <!-- <input type="submit" value="BACK"> -->
            
          </div>
          <div class="signup-link">Not a member? <a href="">Signup now</a></div>
        </form>




        <form action="" class="signup" method="POST">
          <div class="field">
            <input type="text" for="username" placeholder="Username" id="username" name="username" required>
          </div>
          <div class="field">
            <input type="password" for="password" placeholder="Password" id="password" name="password"required>
          </div>
          <div class="field">
            <input type="password" placeholder="Confirm password" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Signup" name="Signup">
            <input type="submit" value="BACK">
          </div>
        </form>

      </div>
    </div>
  </div>
  <script>
    const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = (()=>{
          loginForm.style.marginLeft = "-50%";
          loginText.style.marginLeft = "-50%";
        });
        loginBtn.onclick = (()=>{
          loginForm.style.marginLeft = "0%";
          loginText.style.marginLeft = "0%";
        });
        signupLink.onclick = (()=>{
          signupBtn.click();
          return false;
        });

  </script>

</body>
</html>
