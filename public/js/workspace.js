


    $(document).on("click", '*[data-action]', function(e){
        e.preventDefault();

        var action = $(this).attr('data-action');

        // console.log($(this).attr('data-action'));

        switcherAction(action, this);

        // $.get($(this).attr('href'));

        // var project_id = $(this).attr('data-project-id');

        // console.log(project_id);

        // var project_block = $('section.content').find('[data-id=' + project_id + ']');

        // console.log(project_block);

        // updateTasks(project_id);

        // window.location.reload();

    });

    function switcherAction(action, object){

        switch (action){
            case 'apply-task':

                var url = window.location.origin + '/workspace/task/' + $(object).attr("data-id") + '/action?action=close';

                $.get(url, function(){

                    var $task_row = $('.task-row[data-id="' + $(object).attr("data-id") + '"]');
                    $task_row.css("border-left", "20px solid #c5c5c5");
                    $task_row.find('a[data-action="modal-task"]').addClass('text-task-closed');

                });

                break;

            case 'reopen-task':

                var url = window.location.origin + '/workspace/task/' + $(object).attr("data-id") + '/action?action=open';

                $.get(url, function(){

                    var $task_row = $('.task-row[data-id="' + $(object).attr("data-id") + '"]');
                    $task_row.css("border-left", "20px solid #3c8dbc");
                    $task_row.find('a[data-action="modal-task"]').removeClass('text-task-closed');

                });

                break;

            case 'modal-project':

                var data_id = $(object).attr("data-id");

                getModalHtml(window.location.origin + '/workspace/project/' + data_id + '/modal');

                break;

            case 'modal-task':

                var data_id = $(object).attr("data-id");

                getModalHtml(window.location.origin + '/workspace/task/' + data_id + '/modal');

                break;

            case 'modal-team':

                var data_id = $(object).attr("data-id");

                getModalHtml(window.location.origin + '/workspace/team/' + data_id + '/modal');

                break;

            case 'modal-create-team':

                getModalHtml(window.location.origin + '/workspace/team/create');

                break;

            case 'modal-create-task':

                getModalHtml(window.location.origin + '/workspace/task/create');

                break;

            case 'modal-create-project':

                getModalHtml(window.location.origin + '/workspace/project/create');

                break;

            case 'modal-submit':

                postModal(object);

                break;

            case 'refresh-tasks':

                refreshTasks(object); // refreshTasks() -> task.js

                break;
        }

    }

    function onHiddenModal($modal){
        $.noty.closeAll();
        $modal.data('bs.modal', null);
        $modal.remove();
        $('#modal-block').remove();
    }

    function getModalHtml(url){

        $.ajax({
            type: "GET",
            url: url,
            success: function(data){

                $modal = $(data).modal({show:false});

                renderModal($modal);

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

    function renderModal($modal){

        // selectpicker render
        $modal.find('.selectpicker').selectpicker();

        $modal.find('.text-editor').each(function(){
            var textarea = $(this).find('textarea')[0];
            var toolbar = $(this).find('.toolbar')[0];

            new wysihtml5.Editor(textarea, {
                toolbar: toolbar,
                parserRules: wysihtml5ParserRules
            });

            // console.log(toolbar);

        });

        // text editor render
        // $modal.find('.textarea').wysihtml5({
        //     toolbar: "toolbar",
        //     // parserRules: wysihtml5ParserRules,
        //     "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        //     "emphasis": true, //Italics, bold, etc. Default true
        //     "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        //     "html": false, //Button which allows you to edit the generated HTML. Default false
        //     "link": true, //Button to insert a link. Default true
        //     "image": true, //Button to insert an image. Default true,
        //     "color": false //Button to change color of font
        // });
        //
        // // popover render
        // $modal.find('[data-toggle="popover"]').each(function(index, element) {
        //     // var popover = $(this).popover({html:true});
        //     var contentElementId = $(element).attr("data-content-id");
        //     var contentHtml = $modal.find('#' + contentElementId).html();
        //     $(contentHtml).css("display", "block");
        //
        //     var titleHtml = String($(element).attr("data-title")) + "<a href='#' class='close'>&times;</a>";
        //
        //     $(element).popover({
        //         // trigger: 'focus',
        //         html: true,
        //         title: titleHtml,
        //         content: contentHtml
        //     });
        // });

    }

    // function postModal(action, data){
    function postModal(object){

        var form = $(object).parent().parent().find('form');
        var form_action = form.attr('action');
        var data = form.serialize();

        var url = window.location.origin + '/' + form_action;

        // console.log(data);

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
                        // switcherUpdateMenu(form_action);
                    }, 1800);

                    // console.log(url);

                }

            },
            error: function(response){

                // console.log(response.responseText);

                var errors = $.parseJSON(response.responseText);

                responseHandler(errors);
            }
        });

    }

    function switcherUpdateMenu(url){



        switch(url){
            case 'workspace/team':

                updateMenuAjax(window.location.origin + '/' + url, '.teams-section', 'show-team');

                break;
            case 'workspace/project':

                updateMenuAjax(window.location.origin + '/' + url, '.projects-section', 'show-project');

                break;
            case 'workspace/task':

                updateMenuAjax(window.location.origin + '/' + url, '.tasks-section', 'show-task');

                break;
        }

    }

    function updateMenuAjax(url, menu_section, modal_action){


        $.ajax({
            type: "GET",
            url: url,
            success: function(data){

                // console.log(data);

                var response = $.parseJSON(data);


                updateMenuHtml(url, menu_section, response, modal_action);

                // $(menu_section).append('')
                // $('#modal-block .modal-content').html(data);
            },
            error: function(response){
                // $('#modal-block').modal("hide");
            }
        });

    }

    function updateMenuHtml(url, menu_section, responce, modal_action){

        var modal_act = $(menu_section + ' a.show-modal').attr('modal-act');
        $(menu_section + ' a.show-modal').append('<i class="fa fa-plus pull-right plus show-modal" modal-act="' + modal_act + '"></i><i class="fa fa-angle-left pull-right"></i>');
        $(menu_section + ' a.show-modal').removeClass('show-modal').removeAttr('modal-act');

        $(menu_section + ' ul.treeview-menu').remove();
        $(menu_section).append('<ul class="treeview-menu"></ul>');

        responce.forEach(function (item, index) {
            if(index > 4)
                return;
            $(menu_section + ' ul.treeview-menu').append('<li><a class="show-modal" modal-act="' + modal_action + '" modal-id="' + item.id + '" href="#"><i class="fa fa-circle-o"></i>' + item.name + '</a></li>');
        });

        $(menu_section + ' ul.treeview-menu').append('<li class="divider"></li><li class="footer"><a href="' + url + '">See all</a></li>');

    }

