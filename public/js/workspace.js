
    $('.show-modal').click(function(){
        switcher($(this).attr('modal-act'));
    });

    $('#modal-block').on('hidden.bs.modal', function () {
        $.noty.closeAll();
    })
    

    function switcher(action){

        switch(action){
            case 'create-team':

                getModalHtml('workspace/teams/create');
                $('#modal-block').modal("show");

                break;
            case 'create-project':

                getModalHtml('workspace/projects/create');
                $('#modal-block').modal("show");

                break;
            case 'create-task':

                // $('.modal-title').html('Создание проекта');

                break;
        }

    }

    function getModalHtml(url){

        $.ajax({
            type: "GET",
            url: url,
            success: function(data){
                $('#modal-block .modal-content').html(data);
            },
            error: function(response){
                $('#modal-block').modal("hide");
            }
        });

    }

    function postModal(url, data){

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data){
                // $('#modal-block .modal-content').html(data);
                console.log(data);
                var response = $.parseJSON(data);

                if(responseHandler(response))
                    setTimeout(function(){$('#modal-block').modal("hide")}, 2000);

            },
            error: function(response){

                responseHandler(response);
            }
        });

    }
    
    $(document).on("click", "#modal-submit", function(){
        // console.log($('#modal-block form').serialize().replace('visible=on', 'visible=1'));
        postModal($('#modal-block form').attr('action'), $('#modal-block form').serialize().replace('visible=on', 'visible=1'));
    });
    
    function modal_submit(){
        // console.log('modal_submit');


    }
