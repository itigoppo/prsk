require('select2');

$(function () {
    $('#event-members-member-ids').select2({
        theme: 'bootstrap-5',
        placeholder: '選択してください',
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        templateSelection: formatState,
        width: '100%'
    });

    $('#add-event-card').on('click', function () {
        const indexInput = $(this).find('input[name=card_index]');
        let cardIndex = Number(indexInput.val()) + 1;
        indexInput.val(cardIndex);

        let clone = $('div.event-card').eq(-1).clone(true);
        clone = change(clone, cardIndex);

        $(this).before(clone);
    });
})

const formatState = (state, container) => {
    if (!state.id) {
        return state.text;
    }

    container.css('color', $(state.element).data('color'));
    container.css('background-color', $(state.element).data('bgColor'));

    return $(state.element).data('name');
}

const change = (element,formIndex) => {
    let baseIndex = formIndex - 1;

    // カード
    let change = element.find('select').attr('id').replace('-' + baseIndex, '-' + formIndex);
    element.find('select').attr('id', change);

    change = element.find('select').attr('name').replace('[' + baseIndex + ']', '[' + formIndex + ']');
    element.find('select').attr('name', change);

    // バナーチェック
    change = element.find('label').attr('for').replace('-' + baseIndex, '-' + formIndex);
    element.find('label').attr('for', change);

    change = element.find('input').attr('id').replace('-' + baseIndex, '-' + formIndex);
    element.find('input').attr('id', change);

    change = element.find('input').attr('name').replace('[' + baseIndex + ']', '[' + formIndex + ']');
    element.find('input').attr('name', change);

    element.find('select option').prop('selected', false);
    element.find('input').prop('checked', false);
    element.find('select').removeClass('is-invalid');
    element.find('input').removeClass('is-invalid');

    return element;
}
