$(function () {
    const eventCardsCollapseEls = document.querySelectorAll(".event-card-collapse");
    eventCardsCollapseEls.forEach(function(target) {
        target.addEventListener('show.bs.collapse', function() {
            showCardCollapse(event);
        });
    });

    const memberCardsCollapseEls = document.querySelectorAll(".member-cards-collapse");
    memberCardsCollapseEls.forEach(function(target) {
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
