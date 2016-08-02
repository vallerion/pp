
// $.fn.editable.defaults.params = function (params) {
//     params._token = $("meta[name=token]").attr("content");
//     return params;
// };

$.fn.editable.defaults.params = function (params) {
    params._token = $("input[name=_token]").attr("content");
    params._method = "PUT";
    return params;
};

$('.editable').editable({
    url: window.location.origin + '/workspace/profile/' + $("input[name=_user_id]").attr("content"),
    type: 'text',
    mode: 'inline',
    ajaxOptions: {
        type: 'put'
    },
    success: function(data){
        console.log(data);
    },
    error: function(data){
        console.log(data.responseText);
        return "error"

    }
});