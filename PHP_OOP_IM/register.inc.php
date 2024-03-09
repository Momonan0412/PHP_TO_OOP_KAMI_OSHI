<?php
if(isset($_POST["submit"])){
    
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    // user
    $user_name = $_POST["user_name"];
    // echo '$user_name: ' . $user_name . '<br>';
    
    $pass_word = $_POST["pass_word"];
    // echo '$pass_word: ' . $pass_word . '<br>';
    
    $pass_word_repeat = $_POST["pass_word_repeat"];
    // echo '$pass_word_repeat: ' . $pass_word_repeat . '<br>';
    
    $e_mail = $_POST["e_mail"];
    // echo '$e_mail: ' . $e_mail . '<br>';

    // 
    $firstname = $_POST["firstname"];
    // echo '$firstname: ' . $firstname . '<br>';

    $lastname = $_POST["lastname"];
    // echo '$lastname: ' . $lastname . '<br>';

    $gender = $_POST["gender"];
    // echo '$gender: ' . $gender . '<br>';

    include_once "./register.class.php";
    include_once "./register.data.php";
    $Register = new Register($user_name, $pass_word, $pass_word_repeat, $e_mail, $firstname, $lastname, $gender);
    $Register->registerUserAuthenticator();
    header("Location: index.php?error=none");
}

?>