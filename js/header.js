document.addEventListener('DOMContentLoaded', function () {
    const btn  = document.getElementById('burger-btn');
    const menu = document.getElementById('mobile-menu');

    console.log('burger-btn:', btn);
    console.log('mobile-menu:', menu);

    if (!btn || !menu) return;

    btn.addEventListener('click', function () {
        const isOpen = menu.classList.toggle('is-open');
        btn.classList.toggle('is-open', isOpen);
        btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        btn.setAttribute('aria-label', isOpen ? 'Fermer le menu' : 'Ouvrir le menu');
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('#site-header')) {
            menu.classList.remove('is-open');
            btn.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
            btn.setAttribute('aria-label', 'Ouvrir le menu');
        }
    });
});