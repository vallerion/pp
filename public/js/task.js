


function updateTasks(project_block){

    console.log(project_block);



}

function getTasks(project_id){

    $.ajax({
        type: "GET",
        url: window.location.origin + '/workspace/project/' + project_id + '/mytask',
        success: function(){

        },
        error: function(){

        }
    });

}