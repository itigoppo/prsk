Dropzone.autoDiscover = false;
$(function () {
    const dropzone = new Dropzone('#icon-dropzone',{
        url: $('#icon-dropzone').attr('action'),
        maxFilesize: 2,
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        init: function () {
            this.on('dragover', function (event) {
            });
            this.on('dragleave', function (event) {
            });
            this.on('uploadprogress', function (event, progress) {
                console.log('File progress', progress);
            });
            this.on('error', function(event, response) {
                console.log('error response', response);
            });
            this.on('success', function(event, response, xhr) {
                console.log('success response', response);
                this.removeFile(event);
                $('#icon-show').load($('#icon-dropzone').data('show-url'));
            });
        },
    });
});
