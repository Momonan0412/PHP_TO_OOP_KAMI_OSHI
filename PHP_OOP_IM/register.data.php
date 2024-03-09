<?php
include_once "./database.handler.class.php";
?>
<?php
    // class RegisterData extends DatabaseHandler {
    //     public function setUser($username, $password, $email, $firstname, $lastname, $gender) {
    //         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    //         $mysqli = parent::connect();
    
    //         // Prepared statements with placeholders
    //         $stmt1 = $mysqli->prepare('INSERT INTO tbluseraccount (emailadd, username, password) VALUES (?, ?, ?);');
    //         $stmt2 = $mysqli->prepare('INSERT INTO tbluserprofile (firstname, lastname, gender) VALUES (?, ?, ?);');
    
    //         try {
    //             // Bind parameters and execute
    //             $stmt1->bind_param("sss", $email, $username, $hashedPassword);
    //             $stmt1->execute();
    
    //             $stmt2->bind_param("sss", $firstname, $lastname, $gender);
    //             $stmt2->execute();
    
    //             $rowsAffected1 = $stmt1->affected_rows;
    //             $rowsAffected2 = $stmt2->affected_rows;
    
    //             if ($rowsAffected1 > 0) {
    //                 echo "Successfully added to tbluseraccount";
    //             }
    
    //             if ($rowsAffected2 > 0) {
    //                 echo "Successfully added to tbluserprofile";
    //             }
    //         } catch (mysqli_sql_exception $e) {
    //             echo $e->getMessage();  // Output the error message for debugging
    //             header("Location: index.php");
    //             exit();
    //         } finally {
    //             $stmt1->close();
    //             $stmt2->close();
    //             $mysqli->close();
    //         }
    //     }
    
    //     public function usersChecker($user_name, $e_mail) {
    //         $mysqli = parent::connect();
    
    //         // Prepared statement with placeholders
    //         $stmt = $mysqli->prepare('SELECT * FROM tbluseraccount WHERE username = ? OR emailadd = ?;');
    
    //         try {
    //             // Bind parameters and execute
    //             $stmt->bind_param("ss", $user_name, $e_mail);
    //             $stmt->execute();
    
    //             // Fetch the result to check if any rows are returned
    //             $result = $stmt->fetch();
    
    //             // If there are results, the user already exists
    //             return ($result !== null);
    //         } catch (mysqli_sql_exception $e) {
    //             echo $e->getMessage();  // Output the error message for debugging
    //             header("Location: index.php");
    //             exit();
    //         } finally {
    //             $stmt->close();
    //             $mysqli->close();
    //         }
    //     }
    // }
// PDO
class RegisterData extends DatabaseHandler {
    public function setUser($username, $password, $email, $firstname, $lastname, $gender) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if($firstname == null && $lastname == null && $gender == null)
        echo "NULLLLLL!!";

        $stmt1 = parent::connect()->prepare('INSERT INTO tbluseraccount (emailadd, username, password) VALUES (?, ?, ?);');
        $stmt2 = parent::connect()->prepare('INSERT INTO tbluserprofile (firstname, lastname, gender) VALUES (?, ?, ?);');
        
        try {
            // Insert into tbluseraccount
            $stmt2->execute([$firstname, $lastname, $gender]);
            $stmt1->execute([$email, $username, $hashedPassword]);

            // Check if the insertion into tbluseraccount was successful
            if ($stmt2->rowCount() > 0) {
                echo "Successfully added to tbluseraccount";
            } 
            if ($stmt1->rowCount() > 0) {
                echo "Successfully added to tbluseraccount";
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();  // Output the error message for debugging
            header("Location: index.php?error=database_error");
            exit();
        } finally {
            $stmt1 = null;
            $stmt2 = null;
        }
    }
    public function usersChecker($user_name, $e_mail) {
        // Connect to the database and prepare a SELECT query to check for existing users.
        $preparedStmt = parent::connect()->prepare('SELECT * FROM tbluseraccount WHERE username = ? OR emailadd = ?;');
    
        // Execute the prepared statement with the parameters directly.
        if (!$preparedStmt->execute([$user_name, $e_mail])) {
            $preparedStmt = null;
            header("Location: index.php");
            exit();
        }
    
        // Fetch the result to check if any rows are returned
        $result = $preparedStmt->fetch(PDO::FETCH_ASSOC); // Retrieve the result of the executed SQL query as an associative array
        // TO-DO: Searh for more "fetch" functionality
    
        // Close the statement
        $preparedStmt = null;
    
        // If there are results, the user already exists
        return ($result !== false);
    }
    
}
?>
