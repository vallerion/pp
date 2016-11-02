
$(document).on('click', '.image-viewer .add-image', function(){
    $(this).parent().before(
        '<div class="image-container">' +
            '<div class="image"></div>' +
        '</div>');

    console.log(this);
});