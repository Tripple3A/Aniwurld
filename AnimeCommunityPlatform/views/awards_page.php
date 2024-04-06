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


    <div class="leaderboard">
        <img src="images/Photography.jpg" class="theme-img">
        <div class="description">
            <h3>21st Annual Photographic Competition</h3>
            <p>Date: 02/24/2022</p>
            <input id="search" class="search" placeholder="Search" oninput="search()">
        </div>
            <table>
                <thead>
                    <tr>
                        <td></td>
                        <td>
                            Player
                        </td>
                        <td>
                            Score
                        </td>
                        <td>
                            Average
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="winner">1</td>
                        <td><img src="images/User1.jpg"><p> Jose Brag</p></td>
                        <td>239</td>
                        <td>12.54</td>
                    </tr>
                    
                    <tr>
                        <td id="runner-up">2</td>
                        <td><img src="images/User2.jpg"><p> Lily Simons</p></td>
                        <td>209</td>
                        <td>10.2</td>
                    </tr>
                    
                    <tr>
                        <td id="second-runner-up">3</td>
                        <td><img src="images/User3.jpg"><p> Tom Higgle</p></td>
                        <td>154</td>
                        <td>8.4</td>
                    </tr>
                    
                    <tr>
                        <td>4</td>
                        <td><img src="images/User4.jpg"><p> Alex Roger</p></td>
                        <td>100</td>
                        <td>3.1</td>
                    </tr>
                    
                    <tr>
                        <td>5</td>
                        <td><img src="images/User5.jpg"><p> Mavie Ruth</p></td>
                        <td>82</td>
                        <td>2.0</td>
                    </tr>
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