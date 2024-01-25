const buttons = document.querySelectorAll("[data-carousel-button]");
const nextButton = document.querySelector("[data-carousel-button='next']");

buttons.forEach(button => {
    button.addEventListener("click", () => {
        moveCarousel(button);
    });
});

function moveCarousel(button) {
    const offset = button.dataset.carouselButton === "next" ? 1 : -1;
    const slides = button.closest("[data-carousel]").querySelector("[data-slides]");
    const activeSlide = slides.querySelector("[data-active]");
    let newIndex = [...slides.children].indexOf(activeSlide) + offset;
    
    if (newIndex < 0) newIndex = slides.children.length - 1;
    if (newIndex >= slides.children.length) newIndex = 0;

    slides.children[newIndex].dataset.active = true;
    delete activeSlide.dataset.active;
}

// Automatically move to the next image every 3.5 seconds
let intervalId;

function startAutoCarousel() {
    intervalId = setInterval(() => {
        moveCarousel(nextButton);
    }, 7000);
}

function stopAutoCarousel() {
    clearInterval(intervalId);
}

startAutoCarousel();

// Stop auto-carousel on button click
buttons.forEach(button => {
    button.addEventListener("click", () => {
        stopAutoCarousel();
        startAutoCarousel();
    });
});