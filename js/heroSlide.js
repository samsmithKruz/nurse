let slides = document.querySelector(".hero .slides"),
    slideWidth = document.querySelector(".hero .slide").offsetWidth,
    currentIndex = 0,
    nextSlide = (flag = 0) => {
        if (flag == 0) {
            currentIndex++;
        } else {
            currentIndex--;
        }
        if (currentIndex >= slides.children.length) {
            currentIndex = 0;
        } else if (currentIndex < 0) {
            currentIndex = slides.children.length - 1;
        }
        slides.style.transform = `translateX(-${currentIndex * slideWidth
            }px)`;
    },
    btn_arrow = document.querySelectorAll(".hero > span"), r;
function startInterval() {
    r = setInterval(nextSlide, 4000);
};
btn_arrow.forEach(el => {
    el.onclick = (e) => {
        clearInterval(r);
        if (!e.target.closest('span').classList.contains("right")) {
            nextSlide(-1);
        } else {
            nextSlide();
        }
        startInterval();
    }
})

startInterval();