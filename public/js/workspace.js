
    $('.show-modal').click(function(){
        switcher($(this).attr('modal-act'));
    });

    $('#modal-block').on('hidden.bs.modal', function () {
        $.noty.closeAll();
    })
    

    function switcher(action){

        switch(action){
            case 'create-first-team':

                getModalHtml('workspace/teams/fcreate');
                $('#modal-block').modal("show");

                break;
            case 'create-team':

                getModalHtml('workspace/teams/create');
                $('#modal-block').modal("show");

                break;
            case 'create-task':

                // $('.modal-title').html('Добавление задачи');

                break;
            case 'create-project':

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

                responseHandler(response);
            },
            error: function(response){

                responseHandler(response);
            }
        });

    }
    
    function modal_submit(){
        // console.log('modal_submit');

        postModal('workspace/teams/create', $('#modal-block form').serialize());
    }
