<?php
// Including the core.php file for session checking
include '../settings/core.php';
include '../functions/all_categories_fxn.php';

?>

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

                echo "<div class='dropdown'>";
        echo "<button class='dropbtn'>Add to Categories</button>";
        echo "<div class='dropdown-content'>";
        // Looping through the existing categories to build the options
        foreach ($var_data as $data) {
            echo "<a class='dropdown-item' href='#' data-animeid='" . $animeId . "' data-categoryname='" . $data['category'] . "'>{$data['category']}</a>";

        }
            echo "</div>";
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--for selecting a category-->
    <script>
$(document).ready(function () {
             // Change event for category dropdown items
             $(document).on('click', '.dropdown-item', function() {
        var animeId = $(this).data('animeid');
        var newCategory = $(this).data('categoryname'); 
        updateAnimeCategory(animeId, newCategory); // Call function to update category
    });

    // Function to update anime category via AJAX
    function updateAnimeCategory(animeId, newCategory) {
        console.log(animeId);
        console.log(newCategory);
        
        $.ajax({
            type: "POST",
            url: "../actions/update_category.php",
            data: { anime_id: animeId, id: newCategory },
            success: function(response) {
                console.log(response);
                alert(response.success);
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
});

        </script>

</body>
</html>
