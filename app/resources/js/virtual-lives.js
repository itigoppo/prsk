require('select2');

$(function () {
    $('#virtual-live-members-member-ids').select2({
        theme: 'bootstrap-5',
        placeholder: '選択してください',
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        templateSelection: formatState,
        width: '100%'
    });

    $('#add-tune').on('click', function () {
        const indexInput = $(this).find('input[name=tune_index]');
        let tuneIndex = Number(indexInput.val()) + 1;
        indexInput.val(tuneIndex);

        let clone = $('div.live-tune').eq(-1).clone(true);
        clone = change(clone, tuneIndex);

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

const change = (element, formIndex) => {
    let baseIndex = formIndex - 1;

    // 曲
    let change = element.find('select').attr('id').replace('-' + baseIndex, '-' + formIndex);
    element.find('select').attr('id', change);

    change = element.find('select').attr('name').replace('[' + baseIndex + ']', '[' + formIndex + ']');
    element.find('select').attr('name', change);

    element.find('select option').prop('selected', false);
    element.find('select').removeClass('is-invalid');

    return element;
}
