<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AniWurld</title>

    

    <!-- Main css -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- Sing in  Form -->
<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../assets/images/test2.webp" alt="sing up image"></figure>
                        <a href="../login/register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form action="../actions/login_user_action.php" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Your Email"/>
                                <span style="color: red" class="error-message" id="email-error"></span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                                <span style="color: red" class="error-message" id="your_pass-error"></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                <span style="color: red" class="error-message" id="agree-term-error"></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        
                    </div><i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
        </section>

    

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--Ajax for validation-->
    <script>
        $(document).ready(function(){
           
            $('#login-form').submit(function(event) {
                 
                event.preventDefault();
                var formData = $(this).serialize(); 
                $.ajax({
            type: "POST",
            url: "../actions/login_user_action.php",
            data: formData,
            dataType: "json",
            success: function(response) {
        if (response.success) {           
            // Registration was successful
            alert(response.success);
            window.location.href = '../views/home.php'; // Redirect to home page
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