document.addEventListener('DOMContentLoaded', function () {
	const btn = document.querySelector('.actualites-loadmore');
	if (!btn) return;

	btn.addEventListener('click', function () {
		const page      = parseInt(btn.dataset.page);
		const max       = parseInt(btn.dataset.max);
		const recherche = btn.dataset.recherche;
		const date      = btn.dataset.date;
		const auteur    = btn.dataset.auteur;
		const ordre     = btn.dataset.ordre;

		btn.disabled    = true;
		btn.textContent = 'Chargement…';

		const data = new FormData();
		data.append('action',    'acaae_load_actualites');
		data.append('paged',     page);
		data.append('recherche', recherche);
		data.append('date',      date);
		data.append('auteur',    auteur);
		data.append('ordre',     ordre);
		data.append('nonce',     acaae_ajax.nonce);

		fetch(acaae_ajax.url, { method: 'POST', body: data })
			.then(res => res.json())
			.then(function (response) {
				if (response.success && response.data.html) {
					document.getElementById('actualites-grid').insertAdjacentHTML('beforeend', response.data.html);
					const nextPage = page + 1;
					if (nextPage > max) {
						btn.parentElement.remove();
					} else {
						btn.dataset.page = nextPage;
						btn.disabled     = false;
						btn.textContent  = 'Charger plus';
					}
				} else {
					btn.parentElement.remove();
				}
			})
			.catch(function () {
				btn.disabled    = false;
				btn.textContent = 'Charger plus';
			});
	});
});