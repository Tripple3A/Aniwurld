<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AniWurld</title>

    <!-- Font Icon -->
    <!--<link rel="stylesheet" href="../assets/fonts/material-icon/material-design-iconic-font.min.css">-->

    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="../actions/register_user_action.php" method="POST" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="User Name"/>
                                <span style="color: red" class="error-message" id="username-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                <span style="color: red" class="error-message" id="email-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                                <span style="color: red" class="error-message" id="pass-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re-pass" id="re-pass" placeholder="Repeat your password"/>
                                <span style="color: red" class="error-message" id="re-pass-error"></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                                <span style="color: red" class="error-message" id="agree-term-error"></span>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="signup" id="signup" class="form-submit">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../assets/images/test6.webp" alt="sing up image"></figure>
                        <a href="../login/login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--Ajax for validation-->
    <script>
        $(document).ready(function(){
           
            $('#register-form').submit(function(event) {

                
                 
                event.preventDefault();
                var formData = $(this).serialize(); 
                $.ajax({
            type: "POST",
            url: "../actions/register_user_action.php",
            data: formData,
            dataType: "json",
            success: function(response) {
        if (response.success) {           
            // Registration was successful
            alert(response.success);
            window.location.href = '../login/login.php'; // Redirect to login page
        } else {
        // Clear all previous errors
        $('.error-message').html('');
        
        // Display errors received from backend
        $.each(response, function(key, value) {
            $("#" + key + "-error").html(value);
        });
    }
    }
});

            });
        });
    </script>
</body>
</html>