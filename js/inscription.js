document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('inscription-form');
    const success = document.getElementById('form-success');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        success.style.display = 'block';
        form.reset();
    });
});