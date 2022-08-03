require('flatpickr');
const Japanese = require('flatpickr/dist/l10n/ja.js').default.ja;

$(function () {
    flatpickr('#released-at', {
        locale: Japanese,
        enableTime: true,
    });
    flatpickr('#starts-at', {
        locale: Japanese,
        enableTime: true,
    });
    flatpickr('#ends-at', {
        locale: Japanese,
        enableTime: true,
    });
});

