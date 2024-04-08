<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=	, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="../assets/css/awards.css">


    <style>
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
                    <a href="../login/logout.php">logout</a>
                    
                </div>
            </div>
        </div>
    </header>


    <div class="leaderboard">
        <img src="../assets/images/winner.jpg" class="theme-img">
        <div class="description">
            <h3>Spotlight on Anime Enthusiasts</h3>
            <p>Meet the Top Watchers!</p>
            <input id="search" class="search" placeholder="Search" oninput="search()">
        </div>
            <table>
                <thead>
                    <tr>
                        <td></td>
                        <td>
                            Username
                        </td>
                        <td>
                            Anime Watched
                        </td>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                // Include the backend file to fetch data
                include '../actions/get_top_watchers.php';
                
                // Call the function to get top watchers data
                $topWatchers = getTopWatchers();
                
                // Loop through the data and populate the table rows
foreach ($topWatchers as $index => $user) {
    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";

    // Check if the profile image exists
    if (!empty($user['profile_image'])) {
        // If the profile image is stored as binary data
        $imageData = base64_encode($user['profile_image']); // Assuming the image data is stored in 'profile_image' column
        $src = 'data:image/jpeg;base64,' . $imageData;
        echo "<td><img src='$src' alt='Profile Picture'><p>" . $user['username'] . "</p></td>";
    } else {
        // If the profile image is stored as a file path
        $src = $user['profile_image']; // Assuming the image path is stored in 'profile_image' column
        echo "<td><img src='$src' alt='Profile Picture'><p>" . $user['username'] . "</p></td>";
    }

    echo "<td>" . $user['num_anime_watched'] . "</td>";
    echo "</tr>";
}

                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function search(){
        var text = document.getElementById('search').value;
        const tr = document.getElementsByTagName('tr');
        for (let i=1;i<tr.length;i++){
            if(!tr[i].children[1].children[1].innerHTML.toLowerCase().includes(
                text.toLowerCase()
            )){
                tr[i].style.display = 'none';
            }
            else{
                tr[i].style.display = '';
            }
        }
    }
</script>
</html>