require('select2');
import {createPopper} from '@popperjs/core';

$(function () {
    $('#from-member-ids').select2({
        theme: 'bootstrap-5',
        placeholder: '選択してください',
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        templateSelection: formatState,
        width: '100%'
    });

    $('#to-member-ids').select2({
        theme: 'bootstrap-5',
        placeholder: '選択してください',
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        templateSelection: formatState,
        width: '100%'
    });

    init();

    const playModalEl = document.getElementById('play-modal');
    playModalEl.addEventListener('show.bs.modal', function (event) {
        showPlayModal(event);
    });
    playModalEl.addEventListener('hide.bs.modal', function (event) {
        hidePlayModal(event);
    });
});

const formatState = (state, container) => {
    if (!state.id) {
        return state.text;
    }

    container.css('color', $(state.element).data('color'));
    container.css('background-color', $(state.element).data('bgColor'));

    return $(state.element).data('name');
}

const showPlayModal = (event) => {
    const button = event.relatedTarget;
    const playModal = $('div#play-modal');
    const url = button.getAttribute('data-interaction-url');

    playModal.find('div.card-body').load(url, function (data, textStatus, jqXHR) {
        if (textStatus === 'success') {
            init();
        }
    });
};

const hidePlayModal = (event) => {
    const playModal = $('div#play-modal');
    playModal.find('div.card-body').html('');
};

const init = () => {
    const audio = document.getElementById('audio-file');
    if (audio) {
        audio.volume = 0.5;
    }

    const copyField = document.getElementById('detail-url');
    if (copyField) {
        copyField.addEventListener('focus', function () {
            this.select()
        });

        const copyButton = document.getElementById('url-copy');
        const tooltip = document.getElementById('copy-tooltip');
        const popperInstance = createPopper(copyButton, tooltip, {
            placement: 'top',
            modifiers: [
                {
                    name: 'offset',
                    options: {
                        offset: [0, 8],
                    },
                },
            ],
        });

        copyButton.addEventListener('click', () => {
            copyField.select();
            document.execCommand('copy');

            copyButton.innerHTML = '<i class="fa-solid fa-check text-success"></i>';
            tooltip.setAttribute('data-show', '');
            popperInstance.update();

            setTimeout(function () {
                copyButton.innerHTML = '<i class="fa-regular fa-clone"></i>';
                tooltip.removeAttribute('data-show');
            }, 1000);
        });
    }
}

