<?php
// Including the core.php file for session checking
include '../settings/core.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniWurld Landing Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/discover.css">



    <style>
    .search-container {
    padding-top: 100px; /* Adjust as needed */
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}



.filter-btn {
    display: flex;
    align-items: center;
}

.filter-btn button {
    padding: 0.5rem 1rem;
    outline: none;
    border-radius: 30px;
    font-size: 1rem;
    background-color: #fff;
    cursor: pointer;
    transition: all .4s ease-in-out;
    font-family: inherit;
    border: 2px solid #e5e7eb;
}

form {
    position: relative;
   
    
    font-size: 1rem;
    
    width: 50%; 

   
}

.input-control {
    position: relative;
    
    transition: all .4s ease-in-out;
}

.input-control input {
    width: 100%;
    padding: 0.5rem 1rem;
    border: none;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    background-color: #fff;
    border: 2px solid #e5e7eb;
    transition: all .4s ease-in-out;
}

.input-control button {
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);

    padding: 0.5rem 1rem;
    outline: none;
    border-radius: 30px;
    font-size: 1rem;
    background-color: #fff;
    cursor: pointer;
    transition: all .4s ease-in-out;
    font-family: inherit;
    border: 2px solid #e5e7eb;
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





<!-- Search bar -->
<div class="search-container">
    <div class="filter-btn popular-filter">
        <button onclick="getPopularAnime()">Popular<i class="fas fa-fire"></i></button>
    </div>
    <form id="search-form" class="search-form">
        <div class="input-control">
            <input type="text" id="search-input" placeholder="Search Anime" />
            <button type="button" onclick="searchAnime()">Search</button>
        </div>
    </form>
    <div class="filter-btn airing-filter">
        <button onclick="getAiringAnime()">Airing</button>
    </div>
    <div class="filter-btn upcoming-filter">
        <button onclick="getUpcomingAnime()">Upcoming</button>
    </div>
</div>

<!-- Anime container -->
<div id="anime-container" class="anime-container"></div>




<!--anime container-->
<!-- Display anime -->
<script type="text/javascript" >
    // Constants
const baseUrl = "https://api.jikan.moe/v4";

// Function to fetch anime data
async function fetchAnimeData(url) {
    try {
        const response = await fetch(url);
        const data = await response.json();
        return data.data;
    } catch (error) {
        console.error("Error fetching anime data:", error);
        return [];
    }
}

// Function to display anime
function displayAnime(animeList) {
    const animeContainer = document.getElementById("anime-container");
    animeContainer.innerHTML = "";

    animeList.forEach(anime => {
        const animeContent = document.createElement("div");
        animeContent.classList.add("anime-content");

        const image = document.createElement("img");
        image.src = anime.images.jpg.large_image_url;
        image.alt = anime.title;

        image.addEventListener("click", function() {
            // Redirect to anime.php with anime ID
            window.location.href = `../views/anime_page.php?id=${anime.mal_id}`;
            
        });

        animeContent.appendChild(image);
        animeContainer.appendChild(animeContent);
    });
}

// Function to handle search
function searchAnime() {
    const searchInput = document.getElementById("search-input").value.trim();
    if (searchInput !== "") {
        const searchUrl = `${baseUrl}/anime?q=${searchInput}&order_by=popularity&sort=asc&sfw`;
        fetchAnimeData(searchUrl)
            .then(animeList => displayAnime(animeList))
            .catch(error => console.error("Error searching anime:", error));
    } else {
        alert("Please enter a search term");
    }
}

// Function to fetch popular anime
function getPopularAnime() {
    const popularUrl = `${baseUrl}/top/anime?filter=bypopularity`;
    fetchAnimeData(popularUrl)
        .then(animeList => displayAnime(animeList))
        .catch(error => console.error("Error fetching popular anime:", error));
}

// Function to fetch upcoming anime
function getUpcomingAnime() {
    const upcomingUrl = `${baseUrl}/top/anime?filter=upcoming`;
    fetchAnimeData(upcomingUrl)
        .then(animeList => displayAnime(animeList))
        .catch(error => console.error("Error fetching upcoming anime:", error));
}

// Function to fetch airing anime
function getAiringAnime() {
    const airingUrl = `${baseUrl}/top/anime?filter=airing`;
    fetchAnimeData(airingUrl)
        .then(animeList => displayAnime(animeList))
        .catch(error => console.error("Error fetching airing anime:", error));
}

</script>
</body>
</html>