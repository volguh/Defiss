const track = document.querySelector(".reviews__track");
const slides = Array.from(track.children);
const nextButton = document.querySelector(".reviews__carousel-button--right");
const prevButton = document.querySelector(".reviews__carousel-button--left");

// get width of one slide
const slideSize = slides[0].getBoundingClientRect().width;

// position each slide based on width and gap of 110 px
const setSlidePos = (slide, index) => {
  slide.style.left = slideSize * index + 110 * index + "px";
};


slides.forEach(setSlidePos);
// move the slide according to the button pressed, left or right
const moveToSlide = (track, currentSlide, targetSlide) => {
  track.style.transform = "translateX(-" + targetSlide.style.left + ")";
  currentSlide.classList.remove("reviews__current-slide");
  targetSlide.classList.add("reviews__current-slide");
};
// move to next slide, to the right
nextButton.addEventListener("click", (e) => {
  const currentSlide = track.querySelector(".reviews__current-slide");
  const nextSlide = currentSlide.nextElementSibling;
  moveToSlide(track, currentSlide, nextSlide);

  lastFirstSlide(prevButton, nextButton, nextSlide);
});
// move to previous slide, to the left
prevButton.addEventListener("click", (e) => {
  const currentSlide = track.querySelector(".reviews__current-slide");
  const prevSlide = currentSlide.previousElementSibling;
  moveToSlide(track, currentSlide, prevSlide);
  // move the slide
  lastFirstSlide(prevButton, nextButton, prevSlide);
});

// check if the slide is first or last, 
// turn off left button if first, 
// turn off right button if last, 
// if neither leave as is

const lastFirstSlide = (prevButton, nextButton, stopSlide) => {
  if (slides.findIndex((slide) => slide === stopSlide) === 0) {
    prevButton.classList.add("is-hidden");
    nextButton.classList.remove("is-hidden");
  } else if (
    slides.findIndex((slide) => slide === stopSlide) ===
    slides.length - 1
  ) {
    prevButton.classList.remove("is-hidden");
    nextButton.classList.add("is-hidden");
  } else {
    prevButton.classList.remove("is-hidden");
    nextButton.classList.remove("is-hidden");
  }
};
