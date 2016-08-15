


function updateTasks(project_id){

    // console.log(project_block);

    var project_block = $('section.content').find('.box[data-id=' + project_id + ']');


    getTasks(project_block, project_id);

}

function getTasks(project_block, project_id){

    // console.log(project_id);
    // console.log(project_block);

    $.ajax({
        type: "GET",
        url: window.location.origin + '/workspace/profile/mytask/' + project_id,
        success: function(data){

            var response = $.parseJSON(data);

            updateHtmlTasks(response, project_block);

            // console.log(response);

        },
        error: function(){

        }
    });

}

function updateHtmlTasks(data, project_block){

    // $(project_block).html('');

    data.forEach(function(item){
        // console.log(item);

        var task = $(project_block).find('li.row[data-id="' + item.id + '"]');

        $(task).css("border-left", "20px solid " + item.status);
        console.log(item.id);
        console.log(item.status);
        console.log("---");


        $(task).find('.label-mark-block').html(item.mark);

        $(task).find('.label-priority-block').html(item.priority);

    });

    // $(project_block).find('ul.ui-sortable').sortable('toArray', {attribute: 'data-id'});

    // $(project_block).find('li.row').each(function(){
    //     console.log(this);
    // });

    // $(project_block).find('li.row').css("border-left", "20px solid " + data.status);
    //
    // $(project_block).find('.label-mark-block').html(data.mark);
    //
    // $(project_block).find('.label-priority-block').html(data.priority);

}