
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