
function tab(id){

    switch (id){
        case 'show-reset-form':

            if ($('#registration-form').css('display') == 'block') {
                $('#registration-form').slideUp('slow');

                $('#reset-form').slideDown('slow');
            }

            if ($('#login-form').css('display') == 'block') {
                $('#login-form').slideUp('slow');

                $('#reset-form').slideDown('slow');
            }

            $('.tab-form').html('<span id="show-login-form" onclick="tab(event.target.id)">Login</span> / ' +
                '<span id="show-reg-form" onclick="tab(event.target.id)">Registration</span>')
            break;

        case 'show-login-form':

            if ($('#registration-form').css('display') == 'block') {
                $('#registration-form').slideUp('slow');

                $('#login-form').slideDown('slow');
            }

            if ($('#reset-form').css('display') == 'block') {
                $('#reset-form').slideUp('slow');

                $('#login-form').slideDown('slow');
            }

            $('.tab-form').html('<span id="show-reg-form" onclick="tab(event.target.id)">Registration</span> / ' +
                '<span id="show-reset-form" onclick="tab(event.target.id)">Reset password</span>');
            break;

        case 'show-reg-form':

            if ($('#login-form').css('display') == 'block') {
                $('#login-form').slideUp('slow');

                $('#registration-form').slideDown('slow');
            }

            if ($('#reset-form').css('display') == 'block') {
                $('#reset-form').slideUp('slow');

                $('#registration-form').slideDown('slow');
            }

            $('.tab-form').html('<span id="show-login-form" onclick="tab(event.target.id)">Login</span> / ' +
                '<span id="show-reset-form" onclick="tab(event.target.id)">Reset password</span>');
            break;
    }

}

$('form').submit(function(e){
    e.preventDefault();

    $(this).slideUp('slow');
    $('.tab-form').css("display", "none");
    $('.preloader').css("display", "block");
    var this_id = "#" + $(this).attr('id');

    $.ajax({
        type: "POST",
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(data){

            // console.log(data);
            
            $(this_id).slideDown('slow');
            $('.preloader').css("display", "none");
            $('.tab-form').css("display", "block");

            var response = $.parseJSON(data);

            responseHandler(response);

        },
        error: function(response){

            $(this_id).slideDown('slow');
            $('.preloader').css("display", "none");
            $('.tab-form').css("display", "block");

            responseHandler(response);
        }
    });

    // $(this).slideDown('slow');

});