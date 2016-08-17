
// function updateHtml(project_block, data){
//
// }

function refreshTasks(object, data_id){

    // var project_box = $(object).parents('.project-box');
    // var data_id = $(project_box).attr("data-id");

    $.ajax({
        type: "GET",
        url: window.location.origin + "/ajax/user/task/" + data_id,
        success: function(data){
            $(object).find('.todo-list').html(data);
        }
    });

    // console.log(data_id);
}

function deleteTask(object, data_id){

    // var project_box = $(object).parents('.task-row');
    // var data_id = $(project_box).attr("data-id");

    $.ajax({
        type: "DELETE",
        url: window.location.origin + "/workspace/task/" + data_id,
        success: function(data){
            $(object).remove();
            console.log(data.responseText);
        },
        error: function(data){
            console.log(data.responseText);
        }
    });

}