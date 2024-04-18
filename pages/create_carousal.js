const images = document.querySelectorAll(".carousel-images img");
const totalImages = images.length;
let currentIndex = 0;
let autoSlideInterval = setInterval(moveToNextSlide, 2000); // Auto-slide every 1 second

document.querySelector(".next").addEventListener("click", () => {
  resetInterval();
  moveSlide(currentIndex + 1);
});

document.querySelector(".prev").addEventListener("click", () => {
  resetInterval();
  moveSlide(currentIndex - 1);
});
function validate(theform) {
  if (theform.username.value === "") {
    alert("Username field must contain characters");
    return false;
  }
  if (theform.password.value === "") {
    alert("Password field must contain characters");
    return false;
  }
  return true;
}
function setupIndicators() {
  const indicators = document.querySelector(".carousel-indicators");
  for (let i = 0; i < totalImages; i++) {
    const span = document.createElement("span");
    span.addEventListener("click", () => {
      resetInterval();
      moveSlide(i);
    });
    indicators.appendChild(span);
  }
}

function updateIndicators() {
  const indicators = document.querySelectorAll(".carousel-indicators span");
  indicators.forEach((indicator, index) => {
    if (index === currentIndex) {
      indicator.classList.add("active");
    } else {
      indicator.classList.remove("active");
    }
  });
}

function moveSlide(newIndex) {
  if (newIndex < 0) {
    newIndex = totalImages - 1;
  } else if (newIndex >= totalImages) {
    newIndex = 0;
  }
  images[currentIndex].classList.remove("active");
  images[newIndex].classList.add("active");
  currentIndex = newIndex;
  updateIndicators();
}

function moveToNextSlide() {
  moveSlide(currentIndex + 1);
}

function resetInterval() {
  clearInterval(autoSlideInterval);
  autoSlideInterval = setInterval(moveToNextSlide, 3000);
}

setupIndicators();
moveSlide(0);
