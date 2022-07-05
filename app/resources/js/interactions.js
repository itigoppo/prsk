require('select2');

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
});

const formatState = (state, container) => {
    if (!state.id) {
        return state.text;
    }

    container.css('color', $(state.element).data('color'));
    container.css('background-color', $(state.element).data('bgColor'));

    return $(state.element).data('name');
}
