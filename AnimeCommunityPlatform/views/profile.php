<?php

include '../settings/core.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Profile update</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: black;
    color:black;
    padding-top: 70px;
}

header {
    z-index: 999;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 200px;
    transition: 0.5s ease;
    background-color: #41403d; /* Added background color */
}

header .brand {
    color: #fff;
    font-size: 1.5rem;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
}

header .brand:hover {
    color: #09a6d4;
}

header .navigation {
    position: relative;
}

header .navigation .navigation-items a {
    position: relative;
    color: #fff;
    font-size: 1em;
    font-weight: 500;
    text-decoration: none;
    margin-left: 30px;
    transition: 0.3s ease;
}

header .navigation .navigation-items a:before {
    content: '';
    position: absolute;
    background: #fff;
    width: 0;
    height: 3px;
    bottom: 0;
    left: 0;
    transition: 0.3s ease;
}

header .navigation .navigation-items a:hover:before {
    width: 100%;
    background: #09a6d4;
}

.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

  </style>
</head>
<body>


<!--Navigation bar-->
<header>
        <a href="#" class="brand">AniWurld</a>
        <div class="menu-btn">
            <div class="navigation">
                <div class="navigation-items">
                    <a href="../views/home.php">Home</a>
                    <a href="../views/discover.php">Discover</a>
                    <a href="../views/library_copy.php">library</a>
                    <a href="../views/profile.php">Profile</a>
                    <a href="../views/awards_page.php">Awards</a>
                    <a href="../views/connect.php">Connect</a>
                    <a href="../views/quiz.php">Quiz</a>
                    <a href="../login/logout.php">logout</a>
                    
                </div>
            </div>
        </div>
    </header>


<div class="container-xl px-4 mt-4">

<div class="row">
<div class="col-xl-4">

<div class="card mb-4 mb-xl-0">
<div class="card-header">Profile Picture</div>
<div class="card-body text-center">

<!-- Profile picture preview -->
<img id="profile-picture-preview" class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Upload new image button -->
                        
                        <button id="upload-image-button" class="btn btn-primary" type="button">Upload new image</button>
                        <!-- Hidden file input -->
                        <input type="file" id="profile-picture-input" accept="image/*" style="display: none;">




</div>
</div>
</div>
<div class="col-xl-8">

<div class="card mb-4">
<div class="card-header">Account Details</div>
<div class="card-body">
<form>

<div class="mb-3">
<label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
<input class="form-control" id="inputUsername" type="text" placeholder="Update username">
</div>





<div class="mb-3">
<label class="small mb-1" for="inputEmailAddress">Email address</label>
<input class="form-control" id="inputEmailAddress" type="email" placeholder="Update email address" >
</div>


<div class="mb-3">
<label class="small mb-1" for="inputTwitterAccount">Twitter account</label>
<input class="form-control" id="inputTwitterAccount" type="text" placeholder="Enter twitter account" >
</div>


<div class="mb-3">
<label class="small mb-1" for="inputInstagramAccount">Instagram account</label>
<input class="form-control" id="inputInstagramAccount" type="text" placeholder="Enter instagram account" >
</div>


<div class="mb-3">
<label class="small mb-1" for="inputFacebookAccount">Facebook account</label>
<input class="form-control" id="inputFacebookAccount" type="text" placeholder="Enter facebook account" >
</div>



<button class="btn btn-primary" id="profileupdate" type="button">Save changes</button>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>

<!--script for uploadiing a profile image-->
<script type="text/javascript">
        $(document).ready(function() {
            // Trigger file input click event when the button is clicked
            $('#upload-image-button').on('click', function() {
                $('#profile-picture-input').click();
            });

            // Function to handle file input change event
            $('#profile-picture-input').on('change', function(event) {
                // Get the selected file
                var file = event.target.files[0];
                // Create a FileReader object
                var reader = new FileReader();
                // Set up a function to run when the file is loaded
                reader.onload = function(event) {
                    // Set the source of the profile picture preview to the loaded image data
                    $('#profile-picture-preview').attr('src', event.target.result);
                };
                // Read the file as a data URL (base64 encoded)
                reader.readAsDataURL(file);
            });
        });
    </script>


<!--submitting the profile form using ajax-->
<script type="text/javascript">
    // Trigger AJAX request when the "Save changes" button is clicked
$('#profileupdate').on('click', function() {
    // Create FormData object
    var formData = new FormData();

    // Append form fields to FormData
    formData.append('username', $('#inputUsername').val());
    formData.append('email', $('#inputEmailAddress').val());
    formData.append('twitter', $('#inputTwitterAccount').val());
    formData.append('facebook', $('#inputFacebookAccount').val());
    formData.append('instagram', $('#inputInstagramAccount').val());
    
    // Append profile picture file
    var profilePictureFile = $('#profile-picture-input')[0].files[0];
    if (profilePictureFile) {
        formData.append('profile_picture', profilePictureFile);
    }

    

    // Send AJAX request
    $.ajax({
        type: 'POST',
        url: '../actions/update_profile.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            
            try {
                var data = JSON.parse(response);
                if (data.success) {
                    // Show success alert
                    alert('Profile successfully updated');
                } else {
                    // Show error alert with message from the backend
                    alert('Failed to update profile: ' + data.error);
                }
            } catch (e) {
                // Handle parsing error
                alert('Error parsing response');
            }
        
        },
        
    });
});

</script>

</body>
</html>