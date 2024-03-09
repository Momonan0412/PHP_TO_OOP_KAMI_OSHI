<?php
// // Start or resume the session
// session_start();
// // Check if the session user does not exist
// if (!isset($_SESSION['USER'])) {
//     // Redirect to index.php
//     header("Location: index.php");
//     exit(); // Ensure script stops here to prevent further execution
// }
// // The rest of your PHP code goes here
// // You can use $_SESSION['USER'] as a condition now
?>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="" content="">
        <title>BookNStay | Register Page</title> 
        <link rel="stylesheet" href="css/register.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head> 
    <body>
        <div class="wrapper">
            <form action="./register.inc.php" method="post">
                <h1>Register</h1>
                <div class="input-box">
                    <input type="text" name="firstname" placeholder="First name"> <!-- tbluserprofile -->
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                    <input type="text" name="lastname" placeholder="Last name"> <!-- tbluserprofile -->
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                    <input type="text" name="user_name" placeholder="Username"> <!-- tbluseraccount -->
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                    <input type="text" name="e_mail" placeholder="Email"> <!-- tbluseraccount -->
                    <i class='bx bxs-user' ></i>
                </div>
                <h3>Gender</h3>
                <div class="input-box">
                    <select name="gender"> <!-- tbluserprofile -->
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="input-box">
                    <input type="password" name="pass_word" placeholder="Password"> <!-- tbluseraccount -->
                    <i class='bx bxs-lock' ></i>
                </div>
                <div class="input-box">
                    <input type="password" name="pass_word_repeat" placeholder="Confirm password">  <!-- tbluseraccount -->
                    <i class='bx bxs-lock'></i>
                </div>
                <button type="submit" name="submit" class="btn">Register</button>
                <div class="login-link">
                <p>Already have an account? <a href="login.php">Login</a></p> 
                </div>
            </form>
        </div>
    </body>
</html>