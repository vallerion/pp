
    // $('.show-modal').click(function(){
    //
    // });

    // $('#name').editable();

    $(document).on("click", ".show-modal", function(){
        switcherModalAction($(this).attr('modal-act'));
    });

    $(document).on("click", "#modal-submit", function(){
        // console.log($('#modal-block form').serialize().replace('visible=on', 'visible=1'));
        postModal($('#modal-block form').attr('action'), $('#modal-block form').serialize().replace('visible=on', 'visible=1'));
    });

    // $('#modal-block').on('hidden.bs.modal', function () {
    //     $.noty.closeAll();
    //     $(this).find('.modal-content').html('');
    // })

    function onHiddenModal($modal){
        $.noty.closeAll();
        $modal.data('bs.modal', null);
        $modal.remove();
        $('#modal-block').remove();
    }
    

    function switcherModalAction(modal_act){

        switch(modal_act){
            case 'create-team':

                getModalHtml(window.location.origin + '/workspace/teams/create');

                break;
            case 'create-project':

                getModalHtml(window.location.origin + '/workspace/projects/create');

                break;
            case 'create-task':

                getModalHtml(window.location.origin + '/workspace/tasks/create');

                break;

            case 'show-task':

                var id = $('.show-modal[modal-act="' + modal_act + '"]').attr('modal-id');
                getModalHtml(window.location.origin + '/workspace/tasks/' + id);

                break;

            case 'show-project':

                var id = $('.show-modal[modal-act="' + modal_act + '"]').attr('modal-id');
                getModalHtml(window.location.origin + '/workspace/projects/' + id);

                break;
            case 'show-team':

                var id = $('.show-modal[modal-act="' + modal_act + '"]').attr('modal-id');
                getModalHtml(window.location.origin + '/workspace/teams/' + id);

                break;
        }

    }

    function getModalHtml(url){

        $.ajax({
            type: "GET",
            url: url,
            success: function(data){

                $modal = $(data).modal({show:false});
                $modal.find('.selectpicker').selectpicker();
                $('body').append(data);
                $modal.on('hidden.bs.modal', function(){
                    onHiddenModal($modal);
                });

                $modal.modal("show");

                // $('#modal-block .modal-content').html(data);
            },
            error: function(response){
                $('#modal-block').modal("hide");
            }
        });

    }

    function postModal(action, data){

        var url = window.location.origin + '/' + action;

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
                        $('#modal-block.modal.fade.in').modal("hide");
                        switcherUpdateMenu(action);
                    }, 1800);

                    // console.log(url);

                }

            },
            error: function(response){

                responseHandler(response);
            }
        });

    }

    function switcherUpdateMenu(url){

        switch(url){
            case 'workspace/teams/create':

                updateMenuAjax('workspace/teams', '.teams-section');

                break;
            case 'workspace/projects/create':

                updateMenuAjax('workspace/projects', '.projects-section');

                break;
            case 'workspace/tasks/create':

                updateMenuAjax('workspace/tasks', '.tasks-section');

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

