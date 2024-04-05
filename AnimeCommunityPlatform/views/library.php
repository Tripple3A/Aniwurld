
<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($title) ?> by <?= htmlspecialchars($author) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<style>
        /* Header Styles */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: black;
    color:#fff;
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


.logo h1 {
    font-size: 24px;
}

.nav ul {
    list-style: none;
    display: flex;
}

.nav ul li {
    margin-right: 20px;
}

.nav ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    transition: color 0.3s;
}

.nav ul li a:hover {
    color: #ffd700;
}

#button-group {
    display: flex;
    justify-content: space-evenly; /* Adjust spacing as needed */
    align-items: center;
}

.btn-outline-primary {
    color: #fff;
    transition: all 0.3s ease; /* Add transition for smooth animation */
}

.btn-outline-primary:hover {
    background-color: #09a6d4; /* Change background color on hover */
}

/* Add animation effects if needed */
.btn-outline-primary {
    position: relative;
    overflow: hidden;
}

.btn-outline-primary:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #09a6d4;
    z-index: -1;
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.3s ease;
}

.btn-outline-primary:hover:before {
    transform: scaleX(1);
    transform-origin: right;
}

.btn-outline-primary {
    color: #fff;
    
}

/* Custom CSS to adjust alignment */
@media (min-width: 768px) {
    .row.custom-row {
        display: flex;
        flex-wrap: wrap;
    }
    .row.custom-row > .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    .row.custom-row > .col-md-3 {
        flex: 0 0 25%;
        max-width: 25%;
    }
}



</style>


<body>

<!-- Navigation bar -->
<header>
        <a href="#" class="brand">AniWurld</a>
        <div class="menu-btn">
            <div class="navigation">
                <div class="navigation-items">
                    <a href="#">Home</a>
                    <a href="#">Discover</a>
                    <a href="#">Library</a>
                    <a href="#">Profile</a>
                    <a href="#">Awards</a>
                    <a href="#">Connect</a>
                </div>
            </div>
        </div>
    </header>


    
    
    <div class="container custom-container mt-5">
    <div class="row custom-row">

    <!-- Buttons for Watched, Watching, and Want to Watch -->
    <div class="row mt-4">
        <div class="col-md-3">
        <div id="button-group" class="btn-group-vertical mt-4" role="group" aria-label="Reading Status">
                    <input type="radio" class="btn-check" name="readingStatus" id="read" value="1" >
                    <label class="btn btn-outline-primary" for="read">Watching</label>
                    <input type="radio" class="btn-check" name="readingStatus" id="wantToRead" value="2" >
                    <label class="btn btn-outline-primary" for="wantToRead">Want to Watch</label>
                    <input type="radio" class="btn-check" name="readingStatus" id="currentlyReading" value="3" >
                    <label class="btn btn-outline-primary" for="currentlyReading">Currently Watching</label>
                    
                </div>

            <div class="dropdown mt-3">
                <!-- Dropdown for adding a category here -->
            </div>
        </div>
    </div>
        <!-- Product Image -->
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <img src="../assets/images/signin-image.jpg" alt="Product Image" class="img-fluid">
                </div>
            </div>
            <!-- Rating Section -->
            <div class="row mt-4">
                <div class="col">
                    <h3>Rate This Product</h3>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <!-- Rating buttons here -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details -->
        <div class="col-md-6">
            <!-- Product Description -->
            <div class="row mt-4">
                <div class="col">
                    <h2>Product Name</h2>
                    <p>Description of the product goes here.</p>
                </div>
            </div>
            <!-- Review Section -->
            <div class="row mt-4">
                <div class="col">
                    <h3>Write a Review</h3>
                    <!-- Review Form -->
                    <form>
                        <!-- Review form elements here -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>




</body>
</html>