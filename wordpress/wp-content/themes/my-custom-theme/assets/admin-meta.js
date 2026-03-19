(function ($) {
    const openFrame = (button) => {
        const input = button.closest('td').querySelector('.cyberpunk-media-input');
        const preview = button.closest('td').querySelector('.cyberpunk-media-preview');

        const frame = wp.media({
            title: 'Выбери изображение',
            button: {
                text: 'Использовать изображение',
            },
            multiple: false,
            library: {
                type: 'image',
            },
        });

        frame.on('select', () => {
            const attachment = frame.state().get('selection').first().toJSON();
            input.value = attachment.url || '';
            preview.innerHTML = attachment.url
                ? `<img src="${attachment.url}" alt="" style="max-width:240px;height:auto;display:block;" />`
                : '';
        });

        frame.open();
    };

    $(document).on('click', '.cyberpunk-media-select', function (event) {
        event.preventDefault();
        openFrame(event.currentTarget);
    });

    $(document).on('click', '.cyberpunk-media-clear', function (event) {
        event.preventDefault();
        const cell = event.currentTarget.closest('td');
        cell.querySelector('.cyberpunk-media-input').value = '';
        cell.querySelector('.cyberpunk-media-preview').innerHTML = '';
    });
})(jQuery);
