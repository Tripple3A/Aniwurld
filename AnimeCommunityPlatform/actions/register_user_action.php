<?php

include ('../settings/connection.php');






$errors = array();

//*Receiving all input value from the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    
    //receive all input values from the form
    

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $psw = mysqli_real_escape_string($connection, $_POST['pass']);
    $psw2 = mysqli_real_escape_string($connection, $_POST['re-pass']);


    // Check if checkbox is checked
    $agreeTerm = isset($_POST['agree-term']) ? true : false;
    
    //form validation
    //adds corresponding error into errors array
    if(empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if(empty($username)) {
        $errors['username'] = "Username is required";
    }elseif (!preg_match("/^[a-zA-Z]+$/", $username)) {
        $errors['username'] = "Username can only contain letters";
    }

    if(empty($psw)) {
        $errors['pass'] = "Password is required";
    }else {
        // Password is present, perform additional password validation
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $psw)) {
            $errors['pass'] = "Password must be at least 8 characters long and contain at least one number, one uppercase letter, and one lowercase letter";
        }
    }
    if(empty($psw2)) {
        $errors['re-pass'] = "Please confirm your password";
    }else{
        if($psw !== $psw2){
            $errors['re-pass'] = "Passwords do not match";
        }
    }


    if (!$agreeTerm) {
        $errors['agree-term'] = "Please agree to the terms of service";
    }

    
    //Checking whether the username exists or not
    $user_name_query = "SELECT * FROM users WHERE username='$username'";
    $user_name_result = mysqli_query($connection, $user_name_query);
    $user_name = mysqli_fetch_assoc($user_name_result);


    if($user_name){
        
        $errors['username'] = "Username already exists";
    }


    
    //Checking the database to make sure that the user does not exist
    $user_check_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    


    if($user){
        
        $errors['email'] = "Email already exists";
        }

    


    // Check if there are any errors in the $errors array
    if (!empty($errors)) {
        echo json_encode($errors);
        exit();
    }


    


    //Finally registering the user if there are no errors in the form
    if(count($errors)==0){

        $hashedPassword = password_hash($psw, PASSWORD_DEFAULT);

        

        //INSERT query to insert into database
        $query = "INSERT INTO users (username,email,psw) VALUES ('$username',
        '$email','$hashedPassword')";

       

        //Executing the query
        $insertResult= mysqli_query($connection, $query);

        if ($insertResult) {
            // Redirect to login_view page upon successful registration
            $success_message = 'Registration was successful!!';
            echo json_encode(array('success' => $success_message));
            
            
            
        } 
    } 
        

        mysqli_close($connection);
        

    }





?>