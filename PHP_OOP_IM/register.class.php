<?php
include_once "./register.data.php";
?>
<?php
class Register extends RegisterData{
    private $user_name;
    private $pass_word;
    private $pass_word_repeat;
    private $e_mail;
    private $firstname;
    private $lastname;
    private $gender;
    public function __construct($user_name, $pass_word, $pass_word_repeat, $e_mail, $firstname, $lastname, $gender)
    {
        $this->user_name = $user_name;
        $this->pass_word = $pass_word;
        $this->pass_word_repeat = $pass_word_repeat;
        $this->e_mail = $e_mail;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->gender = $gender;
    }
    public function registerUserAuthenticator(){
        if(!$this->fieldChecker()) {
            header("Location: index.php?error=emptyinput");
            exit();
        }
        if(!$this->usernameChecker()) {
            header("Location: index.php?error=username");
            exit();
        }
        if(!$this->emailChecker()) {
            header("Location: index.php?error=email");
            exit();
        }
        if(!$this->passwordChecker()) {
            header("Location: index.php?error=password");
            exit();
        }
        if(!$this->userDataChecker()) {
            header("Location: index.php?error=usernameoremailtaken");
            exit();
        }
        if ($this->firstname == null || $this->lastname == null || $this->gender == null){
            header("Location: index.php?error=firstnamelastnamegender");
            exit();  // Add an exit statement to stop the script after redirecting
        }
        parent::setUser($this->user_name, $this->pass_word, $this->e_mail, $this->firstname, $this->lastname, $this->gender);
    }
    private function fieldChecker(){
        // Self explanatory
        return(empty($this->user_name) || empty($this->pass_word) || empty($this->pass_word_repeat) || empty($this->e_mail)) ? false : true;
    }
    private function usernameChecker() {
        // Validate the user_name against the pattern: only allow letters (both cases) and numbers.
        $isValid = preg_match("/^[a-zA-Z0-9_]*$/", $this->user_name);
        if (!$isValid) {
            echo "Invalid username format: " . $this->user_name; // For Debugging
        }
        return $isValid;  // Return true if valid, false if invalid
    }
    private function emailChecker() {
        // Validate the email using the FILTER_VALIDATE_EMAIL filter.
        return filter_var($this->e_mail, FILTER_VALIDATE_EMAIL);
    }
    private function passwordChecker(){
        // Self explanatory
        return ($this->pass_word != $this->pass_word_repeat) ? false : true; // Uses ternary operator for more readable code
    }
    private function userDataChecker(){
        $userExists = $this->usersChecker($this->user_name, $this->e_mail);
        if ($userExists) {
            echo "User already exists with username or email: " . $this->user_name . " / " . $this->e_mail; // For Debugging
        }
        return !$userExists;  // Return true if user does not exist, false if exists
    }    
}
?>