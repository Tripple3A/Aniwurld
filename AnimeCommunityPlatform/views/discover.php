<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniWurld Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/discover.css">
</head>
<body>

<!--Navigation bar-->
    <header>
        <a href="#" class="brand">AniWurld</a>
        <div class="menu-btn">
            <div class="navigation">
                <div class="navigation-items">
                    <a href="#">Home</a>
                    <a href="#">Discover</a>
                    <a href="#">Categories</a>
                    <a href="#">Profile</a>
                    <a href="#">Awards</a>
                    <a href="#">Connect</a>
                    
                </div>
            </div>
        </div>
    </header>





<!--Search bar-->
<div class="search-container">
    <h1>MyAnimeList</h1>
    <div class="search-box">
        <input type="search" placeholder="Search your anime" />
    </div>
</div>



<!--anime container-->
<!-- Display anime -->
<div class="anime-container">
    <?php
    // Make a request to the API
    $url = 'https://api.jikan.moe/v4/anime?limit=25';
    $response = file_get_contents($url);
    $animeData = json_decode($response, true);

    //var_dump($animeData);

    // Check if data exists
    if ($animeData && isset($animeData['data'])) {
        $animeList = $animeData['data'];

        // Render anime
        foreach ($animeList as $anime) {
            echo '<div class="anime-content">';
            echo '<h3>' . $anime['title'] . '</h3><br />';
            
            // Check if 'large_image_url' exists before accessing it
            if (isset($anime['images']['jpg']['large_image_url'])) {
                echo '<img src="' . $anime['images']['jpg']['large_image_url'] . '" alt="' . $anime['title'] . '" /><br /><br />';
            } else {
                // Handle case where 'large_image_url' is missing
                echo '<img src="path_to_default_image.jpg" alt="Default Image" /><br /><br />';
            }
            
            echo '<div class="info">';
            echo '<h3>#Rank: ' . $anime['rank'] . '</h3>';
            echo '<h3>#Score: ' . $anime['score'] . '</h3>';
            echo '<h3>#Popularity: ' . $anime['popularity'] . '</h3>';
            echo '<h4>Members: ' . $anime['members'] . '</h4>';
            echo '<h4>Source: ' . $anime['source'] . '</h4>';
            echo '<h4>Duration: ' . $anime['duration'] . '</h4>';
            echo '<h4>Status: ' . $anime['status'] . '</h4>';
            echo '<h4>Rating: ' . $anime['rating'] . '</h4>';
            echo '</div></div>';
        }
    }
        ?>
</div>
</body>
</html>