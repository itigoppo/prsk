$(function () {
    const cardCollapseEls = document.querySelectorAll(".event-card-collapse");
    cardCollapseEls.forEach(function(target) {
        target.addEventListener('show.bs.collapse', function() {
            showCardCollapse(event);
        });
    });
})

const showCardCollapse = (event) => {
    const button = document.querySelector('[data-bs-target="#' + $(event.target).attr('id') + '"]');

    const cardCollapse = $(event.target);
    const url = button.getAttribute('data-url');

    cardCollapse.find('div').load(url, function (data, textStatus, jqXHR) {
    });
};
