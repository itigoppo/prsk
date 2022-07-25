require('select2');

$(function () {
    const select2Option = {
        theme: 'bootstrap-5',
        placeholder: '選択してください',
        selectionCssClass: 'select2--small',
        dropdownCssClass: 'select2--small',
        templateSelection: formatState,
        width: '100%'
    };
    const select2Target = $('.singers-member');

    select2Target.select2(select2Option);
    $('#dancers-member-ids').select2(select2Option);

    $('#add-vocal').on('click', function () {
        select2Target.select2('destroy');

        const indexInput = $(this).find('input[name=vocal_index]');
        let vocalIndex = Number(indexInput.val()) + 1;
        indexInput.val(vocalIndex);

        let clone = $('div.singer').eq(-1).clone(true);

        // 種別
        clone = change(clone, 0, vocalIndex);
        // キー
        clone = change(clone, 1, vocalIndex);
        // メンバー
        clone = change(clone, 2, vocalIndex);

        $(this).before(clone);
        select2Target.select2(select2Option);
        clone.find('.singers-member').select2(select2Option);
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

const change = (element, index, vocalIndex) => {
    let baseIndex = vocalIndex - 1;

    let change = element.find('label').eq(index).attr('for').replace('-' + baseIndex, '-' + vocalIndex);
    element.find('label').eq(index).attr('for', change);

    change = element.find('label').eq(index).next().attr('id').replace('-' + baseIndex, '-' + vocalIndex);
    element.find('label').eq(index).next().attr('id', change);

    change = element.find('label').eq(index).next().attr('name').replace('[' + baseIndex + ']', '[' + vocalIndex + ']');
    element.find('label').eq(index).next().attr('name', change);

    element.find('input').val('');
    element.find('select option').prop('selected', false);
    element.find('input').removeClass('is-invalid');
    element.find('select').removeClass('is-invalid');

    return element;
}
