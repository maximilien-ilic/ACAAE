document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.galerie-slide');
    const prevBtn = document.getElementById('galerie-prev');
    const nextBtn = document.getElementById('galerie-next');

    if (!slides.length || !prevBtn || !nextBtn) return;

    let current = 0;

    function showSlide(index) {
        slides.forEach(function (slide) {
            slide.classList.remove('active');
        });
        slides[index].classList.add('active');
        prevBtn.disabled = index === 0;
        nextBtn.disabled = index === slides.length - 1;
    }

    prevBtn.addEventListener('click', function () {
        if (current > 0) {
            current--;
            showSlide(current);
        }
    });

    nextBtn.addEventListener('click', function () {
        if (current < slides.length - 1) {
            current++;
            showSlide(current);
        }
    });

    showSlide(0);
});