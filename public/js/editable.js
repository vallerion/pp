
$('.editable').editable({
    url: 'post.php',
    type: 'text',
    pk: 1,
    mode: 'inline',
    success: function(){},
    error: function(){
        return "error"
    }
});