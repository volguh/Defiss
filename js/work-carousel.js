const work_track = document.querySelector(".work__track");
const work_slides = Array.from(work_track.children);
const work_nextButton = document.querySelector(".work__carousel-button--right");
const work_prevButton = document.querySelector(".work__carousel-button--left");
// get width of one slide
const work_slideSize = work_slides[0].getBoundingClientRect().width;
// position each slide based on width and gap of 110 px
const work_setSlidePos = (slide, index) => {
  slide.style.left = work_slideSize * index + 110 * (index + 1) + "px";
};
work_slides.forEach(work_setSlidePos);

// move the slide according to the button pressed, left or right
const work_moveToSlide = (work_track, currentSlide, targetSlide) => {
  work_track.style.transform = "translateX(-" + targetSlide.style.left + ")";
  currentSlide.classList.remove("work__current-slide");
  targetSlide.classList.add("work__current-slide");
};
// move to next slide, to the right
work_nextButton.addEventListener("click", (e) => {
  const currentSlide = work_track.querySelector(".work__current-slide");
  const nextSlide = currentSlide.nextElementSibling;
  work_moveToSlide(work_track, currentSlide, nextSlide);
  work_lastFirstSlide(work_prevButton, work_nextButton, nextSlide);
});
// move to previous slide, to the left
work_prevButton.addEventListener("click", (e) => {
  const currentSlide = work_track.querySelector(".work__current-slide");
  const prevSlide = currentSlide.previousElementSibling;
  work_moveToSlide(work_track, currentSlide, prevSlide);
  // move the slide
  work_lastFirstSlide(work_prevButton, work_nextButton, prevSlide);
});

// check if the slide is first or last,
// turn off left button if first,
// turn off right button if last,
// if neither leave as is

const work_lastFirstSlide = (work_prevButton, work_nextButton, stopSlide) => {
  if (work_slides.findIndex((slide) => slide === stopSlide) === 0) {
    work_prevButton.classList.add("is-hidden");
    work_nextButton.classList.remove("is-hidden");
  } else if (
    work_slides.findIndex((slide) => slide === stopSlide) ===
    work_slides.length - 1
  ) {
    work_prevButton.classList.remove("is-hidden");
    work_nextButton.classList.add("is-hidden");
  } else {
    work_prevButton.classList.remove("is-hidden");
    work_nextButton.classList.remove("is-hidden");
  }
};
