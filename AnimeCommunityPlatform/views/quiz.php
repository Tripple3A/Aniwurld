<?php
include '../settings/core.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game - API Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
:root{
    --light-purple-color: #8854C0;
    --light-color: #fff;
    --dark-color: #000;
    --grey-color: #f2f2f2;
    --transition: all 300ms ease-in-out;
}
.flex{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 70px; /* Adjust this value based on the height of your header */
}
body{
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
    color: var(--dark-color);
    /*background: var(--grey-color);*/
    background-color: black;
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
.wrapper{
    background: var(--light-color);
    padding: 1.5rem 4rem 3rem 4rem;
    width: 600px;
    height: 680px;
    border-top-left-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
    position: relative;
    box-shadow: 0 4px 6px rgb(0 0 0 / 10%), 0 1px 3px rgb(0 0 0 / 10%);
}
.quiz-title{
    text-align: center;
    font-size: 2rem;
}
.quiz-score{
    text-align: right;
    font-weight: 600;
    font-size: 1.2rem;
    margin-bottom: 1rem;
    border: 5px solid var(--grey-color);
    font-weight: bold;
    width: 100px;
    height: 50px;
    margin: .5rem auto 1rem auto;
    color: var(--light-purple-color);
}
.quiz-question{
    font-size: 1.2rem;
    text-align: center;
    line-height: 1.3;
    margin-bottom: 2rem;
}
.quiz-question .category{
    font-size: 0.9rem;
    font-weight: 500;
    background-color: var(--light-purple-color);
    color: var(--light-color);
    padding: .2rem .4rem;
    border-radius: .2rem;
    margin-top: 0.5rem;
    display: inline-block;
}
.quiz-options{
    list-style-type: none;
    margin: 1rem 0;
}
.quiz-options li{
    border-radius: 0.5rem;
    font-weight: 600;
    margin: .7rem 0;
    padding: .4rem 1.2rem;
    cursor: pointer;
    border: 3px solid var(--light-purple-color);
    background-color: var(--light-purple-color);
    color: var(--light-color);
    box-shadow: 0 4px 0 0 #6c4298;
    transition: var(--transition);
}
.quiz-options li:hover{
    background-color: var(--grey-color);
    color: var(--dark-color);
    border-color: var(--grey-color);
    box-shadow: 0 4px 0 0 #bbbbbb;
}
.quiz-options li:active{
    transform: scale(0.97);
}
/* js related */
.selected{
    background-color: var(--grey-color)!important;
    color: var(--dark-color)!important;
    border-color: var(--grey-color)!important;
    box-shadow: 0 4px 0 0 #bbbbbb!important;
}
.quiz-foot button{
    border: none;
    border-radius: 0.5rem;
    outline: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    padding: .5rem 1rem;    
    margin: 0 auto 0 auto;
    text-transform: uppercase;
    cursor: pointer;
    display: block;
    background-color: var(--grey-color);
    color: var(--dark-color);
    letter-spacing: 2px;
    transition: var(--transition);
    box-shadow: 0 4px 0 0 #bbbbbb;
}
.quiz-foot button:hover{
    background-color: #e6e6e6;
    box-shadow: 0 4px 0 0 #a7a7a7;
}
.quiz-foot button:active{
    transform: scale(0.95);
}
#play-again{
    display: none;
}
#result{
    padding: .7rem 0;
    text-align: center;
    font-weight: 600;
    font-size: 1.3rem;
}
#result i{
    width: 30px;
    height: 30px;
    border-radius: 50%;
    line-height: 30px;
    margin-right: .5rem;
    margin-bottom: .5rem;
    background-color: var(--light-purple-color);
    color: var(--light-color);
}




@media(max-width: 678px){
    .quiz-title{
        font-size: 1.6rem;
    }
    .wrapper{
        margin: 3rem 0;
        width: 90%;
        height: 90%;
        padding: 1.5rem 1rem 3rem 1rem;
        border-top-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .quiz-foot button{
        font-size: 1rem;
    }
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

    <div class="flex">
    
    <div class = "wrapper">
        <div class = "quiz-container">
            <div class = "quiz-head">
                <h1 class = "quiz-title">Quiz Game</h1>
                <div class = "quiz-score flex">
                    <span id = "correct-score"></span>/<span id = "total-question"></span>
                </div>
            </div>
            <div class = "quiz-body">
                <h2 class = "quiz-question" id = "question"></h2>
                <ul class = "quiz-options">
                    
                </ul>
                <div id = "result">
                </div>
            </div>
            <div class = "quiz-foot">
                <button type = "button" id = "check-answer">Check Answer</button>
                <button type = "button" id = "play-again">Play Again!</button>
            </div>
        </div>
    </div>
    </div>


    <script >
        
const _question = document.getElementById('question');
const _options = document.querySelector('.quiz-options');
const _checkBtn = document.getElementById('check-answer');
const _playAgainBtn = document.getElementById('play-again');
const _result = document.getElementById('result');
const _correctScore = document.getElementById('correct-score');
const _totalQuestion = document.getElementById('total-question');

let correctAnswer = "", correctScore = askedCount = 0, totalQuestion = 10;

// load question from API
async function loadQuestion(){
    const APIUrl = 'https://opentdb.com/api.php?amount=10&category=31&difficulty=hard&type=multiple';
    try {
        const result = await fetch(APIUrl);
        const data = await result.json();
        if (data.results && data.results.length > 0) {
            _result.innerHTML = "";
            showQuestion(data.results[0]);
        } else {
            console.error("No results found in API response");
            // Continue to the next call
            setTimeout(loadQuestion, 1000); // Retry after 1 second
        }
    } catch (error) {
        console.error("Error fetching question:", error);
        // Continue to the next call
        setTimeout(loadQuestion, 1000); // Retry after 1 second
    }
}


// event listeners
function eventListeners(){
    _checkBtn.addEventListener('click', checkAnswer);
    _playAgainBtn.addEventListener('click', restartQuiz);
}

document.addEventListener('DOMContentLoaded', function(){
    loadQuestion();
    eventListeners();
    _totalQuestion.textContent = totalQuestion;
    _correctScore.textContent = correctScore;
});


// display question and options
function showQuestion(data){
    _checkBtn.disabled = false;
    correctAnswer = data.correct_answer;
    let incorrectAnswer = data.incorrect_answers;
    let optionsList = incorrectAnswer;
    optionsList.splice(Math.floor(Math.random() * (incorrectAnswer.length + 1)), 0, correctAnswer);
    // console.log(correctAnswer);

    
    _question.innerHTML = `${data.question} <br> <span class = "category"> ${data.category} </span>`;
    _options.innerHTML = `
        ${optionsList.map((option, index) => `
            <li> ${index + 1}. <span>${option}</span> </li>
        `).join('')}
    `;
    selectOption();
}


// options selection
function selectOption(){
    _options.querySelectorAll('li').forEach(function(option){
        option.addEventListener('click', function(){
            if(_options.querySelector('.selected')){
                const activeOption = _options.querySelector('.selected');
                activeOption.classList.remove('selected');
            }
            option.classList.add('selected');
        });
    });
}

// answer checking
function checkAnswer(){
    _checkBtn.disabled = true;
    if(_options.querySelector('.selected')){
        let selectedAnswer = _options.querySelector('.selected span').textContent;
        if(selectedAnswer == HTMLDecode(correctAnswer)){
            correctScore++;
            _result.innerHTML = `<p><i class = "fas fa-check"></i>Correct Answer!</p>`;
        } else {
            _result.innerHTML = `<p><i class = "fas fa-times"></i>Incorrect Answer!</p> <small><b>Correct Answer: </b>${correctAnswer}</small>`;
        }
        checkCount();
    } else {
        _result.innerHTML = `<p><i class = "fas fa-question"></i>Please select an option!</p>`;
        _checkBtn.disabled = false;
    }
}

// to convert html entities into normal text of correct answer if there is any
function HTMLDecode(textString) {
    let doc = new DOMParser().parseFromString(textString, "text/html");
    return doc.documentElement.textContent;
}


function checkCount(){
    askedCount++;
    setCount();
    if(askedCount == totalQuestion){
        setTimeout(function(){
            console.log("");
        }, 5000);


        _result.innerHTML += `<p>Your score is ${correctScore}.</p>`;
        _playAgainBtn.style.display = "block";
        _checkBtn.style.display = "none";
    } else {
        setTimeout(function(){
            loadQuestion();
        }, 300);
    }
}

function setCount(){
    _totalQuestion.textContent = totalQuestion;
    _correctScore.textContent = correctScore;
}


function restartQuiz(){
    correctScore = askedCount = 0;
    _playAgainBtn.style.display = "none";
    _checkBtn.style.display = "block";
    _checkBtn.disabled = false;
    setCount();
    loadQuestion();
}
    </script>
</body>
</html>