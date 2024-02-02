function uploadFile() {
    var formData = new FormData($('#uploadForm')[0]);

    $.ajax({
        type: 'POST',
        url: 'upload.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#uploadedImage').attr('src', response);
        }
    });
}
