const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    navigation.classList.toggle("active");
});

const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".img-slide");
const contents = document.querySelectorAll(".content");

let currentIndex = 0; // Initialize index of current slide

// Function to show next slide
function showNextSlide() {
    // Remove active classes from all elements
    btns.forEach(btn => btn.classList.remove("active"));
    slides.forEach(slide => slide.classList.remove("active"));
    contents.forEach(content => content.classList.remove("active"));

    // Increment currentIndex and ensure it loops back to 0 if it exceeds the slide count
    currentIndex = (currentIndex + 1) % slides.length;

    // Add active classes to corresponding elements
    btns[currentIndex].classList.add("active");
    slides[currentIndex].classList.add("active");
    contents[currentIndex].classList.add("active");
}

// Automatically show next slide every 5 seconds (5000 milliseconds)
const slideInterval = setInterval(showNextSlide, 5000);

// Event listener to stop the auto sliding when user interacts with navigation buttons
btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        clearInterval(slideInterval); // Stop auto sliding
        currentIndex = i; // Update currentIndex to the clicked button index
        sliderNav(i);
    });
});
