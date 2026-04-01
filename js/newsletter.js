document.addEventListener('DOMContentLoaded', function () {
    // Sélection des métiers
    const metiers = document.querySelectorAll('.metier-item');
    metiers.forEach(function (item) {
        item.addEventListener('click', function () {
            const checkbox = item.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;
            item.classList.toggle('selected', checkbox.checked);
        });
    });

    // Soumission du formulaire
    const form = document.getElementById('newsletter-form');
    const success = document.getElementById('newsletter-success');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        success.style.display = 'block';
        form.reset();
        metiers.forEach(function (item) {
            item.classList.remove('selected');
        });
    });
});