<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Details</title>
    <link rel="stylesheet" href="../assets/css/anime.css">
</head>
<body>
    <!-- Navigation bar -->
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

    <div id="anime-details-container">
        <?php
        // Fetch anime details using PHP
        if(isset($_GET['id'])) {
            $animeId = $_GET['id'];
            $apiUrl = "https://api.jikan.moe/v4/anime/$animeId";
            $charactersApiUrl = "https://api.jikan.moe/v4/anime/$animeId/characters";
            $response = file_get_contents($apiUrl);
            $charactersResponse = file_get_contents($charactersApiUrl);
            $animeData = json_decode($response, true);
            $charactersData = json_decode($charactersResponse, true);

            // Check if data is retrieved successfully
            if($animeData && isset($animeData['data'])) {
                $anime = $animeData['data'];

                // Display anime details
                echo "<h1></h1>";
                echo "<div class='details'>";
                echo "<h1>{$anime['title']}</h1>";
                echo "<div class='detail'>";
                echo "<div class='image'>";
                echo "<img src='{$anime['images']['jpg']['large_image_url']}' alt='' />";
                echo "</div>";
                echo "<div class='anime-details'>";
                echo "<p><span>Aired:</span><span>{$anime['aired']['string']}</span></p>";
                echo "<p><span>Rating:</span><span>{$anime['rating']}</span></p>";
                echo "<p><span>Rank:</span><span>{$anime['rank']}</span></p>";
                echo "<p><span>Score:</span><span>{$anime['score']}</span></p>";
                echo "<p><span>Scored By:</span><span>{$anime['scored_by']}</span></p>";
                echo "<p><span>Popularity:</span><span>{$anime['popularity']}</span></p>";
                echo "<p><span>Status:</span><span>{$anime['status']}</span></p>";
                echo "<p><span>Source:</span><span>{$anime['source']}</span></p>";
                echo "<p><span>Season:</span><span>{$anime['season']}</span></p>";
                echo "<p><span>Duration:</span><span>{$anime['duration']}</span></p>";
                echo "</div>";

                echo "<div class='dropdown mt-3'>";
                echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                        Add to Categories
                    </button>";
                echo "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                        
                    </ul>";
                echo "</div>";
                echo "</div>";

                echo "<h3 class='title'>Trailer</h3>";
                echo "<div class='trailer-con'>";
                if(isset($anime['trailer']['embed_url'])) {
                    echo "<iframe src='{$anime['trailer']['embed_url']}' title='Inline Frame Example' width='800' height='450' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowFullScreen></iframe>";
                } else {
                    echo "<h3>Trailer not available</h3>";
                }
                echo "</div>";


                 // Display characters
                 echo "<h3 class='title'>Characters</h3>";
                 
                 echo "<div class='characters'>";
                 if(isset($charactersData['data'])) {
                    $characters = $charactersData['data'];
                    
                    foreach($characters as $character) {
                        
                        $characterData = $character['character'];
                        $imageUrl = $characterData['images']['jpg']['image_url'];
                        $name = $characterData['name'];
                        
                
                        // Display character details
                        echo "<div class='character'>";
                        echo "<img src='$imageUrl' alt='$name' />";
                        echo "<h4>$name</h4>";
                        
                        echo "</div>";
                        
                     }
                 } else {
                     echo "<p>No character information available.</p>";
                 }
                 echo "</div>";
                 echo "</div>";
                

                
            } else {
                echo "<p>Anime details not found.</p>";
            }
        } else {
            echo "<p>Anime ID not provided.</p>";
        }
        ?>
    </div>

</body>
</html>
