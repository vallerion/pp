
    // $('.show-modal').click(function(){
    //
    // });

    $(document).on("click", ".show-modal", function(){
        switcher($(this).attr('modal-act'));
    });

    $(document).on("click", "#modal-submit", function(){
        // console.log($('#modal-block form').serialize().replace('visible=on', 'visible=1'));
        postModal(window.location.origin + $('#modal-block form').attr('action'), $('#modal-block form').serialize().replace('visible=on', 'visible=1'));
    });

    $('#modal-block').on('hidden.bs.modal', function () {
        $.noty.closeAll();
    })
    

    function switcher(modal_act){

        switch(modal_act){
            case 'create-team':

                getModalHtml(window.location.origin + '/workspace/teams/create');
                $('#modal-block').modal("show");

                break;
            case 'create-project':

                getModalHtml(window.location.origin + '/workspace/projects/create');
                $('#modal-block').modal("show");

                break;
            case 'create-task':

                getModalHtml(window.location.origin + '/workspace/tasks/create');
                $('#modal-block').modal("show");

                break;

            case 'show-task':

                // var task_id = $('.show-modal[modal-act="show-task"]').attr('modal-task-id');
                // console.log();
                // getModalHtml('workspace/projects/' + task_id);
                // $('#modal-block').modal("show");

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

        // var  = url;

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data){
                // $('#modal-block .modal-content').html(data);
                console.log(data);
                var response = $.parseJSON(data);

                if(responseHandler(response)) {
                    setTimeout(function () {
                        $('#modal-block').modal("hide");
                        updateMenuSwitcher(url);
                    }, 1800);

                    // console.log(url);

                }

            },
            error: function(response){

                responseHandler(response);
            }
        });

    }

    function updateMenuSwitcher(url){

        switch(url){
            case 'workspace/teams/create':


                updateMenuAjax('workspace/teams', '.teams-section');

                break;
        }

    }

    function updateMenuAjax(url, menu_section){

        $.ajax({
            type: "GET",
            url: url,
            success: function(data){

                var response = $.parseJSON(data);
                // console.log(response);

                updateMenuHtml(url, menu_section, response);

                // $(menu_section).append('')
                // $('#modal-block .modal-content').html(data);
            },
            error: function(response){
                // $('#modal-block').modal("hide");
            }
        });

    }

    function updateMenuHtml(url, menu_section, responce){

        var modal_act = $(menu_section + ' a.show-modal').attr('modal-act');
        $(menu_section + ' a.show-modal').append('<i class="fa fa-plus pull-right plus show-modal" modal-act="' + modal_act + '"></i><i class="fa fa-angle-left pull-right"></i>');
        $(menu_section + ' a.show-modal').removeClass('show-modal').removeAttr('modal-act');

        $(menu_section + ' ul.treeview-menu').remove();
        $(menu_section).append('<ul class="treeview-menu"></ul>');

        responce.forEach(function (item) {
            $(menu_section + ' ul.treeview-menu').append('<li><a href="' + url + '/' + item.id + '"><i class="fa fa-circle-o"></i>' + item.name + '</a></li>');
        });

        $(menu_section + ' ul.treeview-menu').append('<li class="divider"></li><li class="footer"><a href="' + url + '">See all</a></li>');

    }

