document.addEventListener('DOMContentLoaded', () => {
    const pluginsBtn = document.querySelector('#wowcore-install-recommended-plugins');
    const pleaseWaitBox = document.querySelector('.wowcore-install-plugins-wait');
    pluginsBtn.addEventListener('click', async (evt) => {
        evt.preventDefault();

        const recommendedPluginsEls = document.querySelectorAll('#recommended-plugins input[name="plugins"]:checked');
        const recommendedPlugins = [...recommendedPluginsEls].map(el => el.value);

        if (!recommendedPlugins.length) return;

        pluginsBtn.setAttribute('disabled', '');
        pleaseWaitBox.style.display = 'block';

        const data = {
            action: 'wowcore_install_recommended_plugins',
            plugins: recommendedPlugins,
        };

        const formData = new FormData();
        for (const key in data) {
            formData.append(key, data[key]);
        }

        const response = await fetch(ajaxurl, {
            method: 'POST',
            body: formData,
        }).then(res => res.json());

        if (response.success) {
            window.location.reload();
        } else {
            pluginsBtn.removeAttribute('disabled');
            pleaseWaitBox.style.display = 'hidden';
        }
    });
});
