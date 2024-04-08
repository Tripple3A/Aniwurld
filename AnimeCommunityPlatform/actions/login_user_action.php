<?php
// Starting a session
session_start();

//including the connection file
include ('../settings/connection.php');

//initializing variable error for capturing errors
$errors = array();





//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
   

    //Collecting form data and storing in variables
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['your_pass']);



     //Query to check if the user exists
     $query = "SELECT * FROM users WHERE email = '$email'";
     $result = mysqli_query($connection, $query);
     $user = mysqli_fetch_assoc($result);
 
     
 
 
    //form validation
    //adds corresponding error into errors array
    if(empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }else if(!$user){
        $errors['email'] = "Email not registered";
    }


    if(empty($password)) {
        $errors['your_pass'] = "Password is required";
    }else {
        // Password is present, perform additional password validation
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $errors['your_pass'] = "Password must be at least 8 characters long and contain at least one number, one uppercase letter, and one lowercase letter";
        }
    }


       


        // Check if there are any errors in the $errors array
    if (!empty($errors)) {
        echo json_encode($errors);
        exit();
    }
    else{


        

            //User then exists
            //Retrieving the hashed password from the database
            $passwdquery = "SELECT psw FROM users WHERE email= '$email'";
            $passwdresult = mysqli_query($connection,$passwdquery);
            $row = mysqli_fetch_assoc($passwdresult);
            $hashedpasswd = $row['psw'];



            //Comparing the entered password with the hashed password
            if(password_verify($password, $hashedpasswd)){
                //passwords meatch meaning log in was successful
                //storing user id and role id
                $user_query = "SELECT user_id FROM users WHERE email= '$email'";
                $user_id_result = mysqli_query($connection,$user_query);
                $user_row = mysqli_fetch_assoc($user_id_result);
                $user_id_value = $user_row['user_id'];


               
                $_SESSION['user_id'] = $user_id_value;
                

                $success_message = 'Login was successful!!';
                echo json_encode(array('success' => $success_message));
                
            }    

            }
        }
        




?>