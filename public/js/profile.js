
// $.fn.editable.defaults.params = function (params) {
//     params._token = $("meta[name=token]").attr("content");
//     return params;
// };

// $.ajaxSetup({
//     headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').getAttribute('content') }
// });

// $.fn.editable.defaults.params = function (params) {
//     params._token = $("input[name=_token]").attr("content");
//     // params._method = "PUT";
//     return params;
// };

// $('.editable-username').click(function(){
//
//     $(this).editable({
//         url: window.location.origin + '/workspace/profile/' + $("input[name=_user_id]").attr("content"),
//         type: 'text',
//         mode: 'inline',
//         ajaxOptions: {
//             type: 'put'
//         },
//         success: function(data){
//             console.log(data);
//         },
//         error: function(data){
//             console.log(data.responseText);
//             return "error"
//
//         }
//     }).editable("show");
//
// });

$('.editable-username').editable({
    url: window.location.origin + '/workspace/profile/' + $('.editable-username').attr("data-pk"),
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