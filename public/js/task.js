
// function updateHtml(project_block, data){
//
// }

function refreshTasks(object){

    var project_box = $(object).parents('.project-box');
    var data_id = $(project_box).attr("data-id");

    $.ajax({
        type: "GET",
        url: window.location.origin + "/workspace/profile/mytask/" + data_id,
        success: function(data){
            $(project_box).find('.todo-list').html(data);
        }
    });

    // console.log(data_id);
}