
function showMessage(text, type){
    noty({
        text        : text,
        type        : type,
        dismissQueue: true,
        layout      : 'topRight',
        theme       : 'relax',
        maxVisible  : 5,
        timeout     : 10000,
        animation   : {
            open: 'animated fadeInDown',
            close: 'animated fadeOutUp',
            easing: 'swing',
            speed : 500
        }
    });
}


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
            
            $(this_id).slideDown('slow');
            $('.preloader').css("display", "none");
            $('.tab-form').css("display", "block");

            var response = $.parseJSON(data);

            responseHandler(response);

        },
        error: function(data){

            $(this_id).slideDown('slow');
            $('.preloader').css("display", "none");
            $('.tab-form').css("display", "block");

            // TODO: сообщение("что-то пошло не так...")
        }
    });

    // $(this).slideDown('slow');

});

function responseHandler(response) {

    if(response.successful){

        if(response.redirect)
            window.location.replace(response.redirect);

        if(response.detail) {

            response.detail.forEach(function (item) {
                showMessage(item, "success");
            });
        }
    }
    else{

        if(response.detail){

            response.detail.forEach(function(item){
                showMessage(item, "error");
            });
        }
        else{
            showMessage("Oops, something went wrong", "error");
        }
    }

}