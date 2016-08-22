
    $(function () {
        var $image = $('#image');
        var cropBoxData;
        var canvasData;
        $('#modal').on('shown.bs.modal', function () {
            $image.cropper({
                autoCropArea: 0.5,
                built: function () {
                    $image.cropper('setCanvasData', canvasData);
                    $image.cropper('setCropBoxData', cropBoxData);
                }
            });
        }).on('hidden.bs.modal', function () {
            cropBoxData = $image.cropper('getCropBoxData');
            canvasData = $image.cropper('getCanvasData');
            $image.cropper('destroy');
        });
    });

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN':
            // document.querySelector('input[name="_token"]') != null ?  document.querySelector('input[name="_token"]').getAttribute('content') : ""}
            $("input[name=_token]").attr("content")}
    });

    // $.ajaxSetup({
    //     headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').getAttribute('content') }
    // });

    // $('.btn-confirm').click(function(){
    //
    //     // $(this).removeClass('btn-confirm');
    //
    //     console.log("btn-confirm click");
    //
    //     var btn_confirm = this;
    //     var old_html = $(this).html();
    //
    //     $(this).removeClass('btn-success');
    //     $(this).addClass('btn-default');
    //
    //     var btn_yes = '<button class="btn btn-success">Yes</button>';
    //     var btn_no = '<button class="btn btn-danger">No</button>';
    //
    //     $(this).html('Are you sure? ' + btn_yes + btn_no);
    //
    //     $(this).one('click', '.btn-success', function(){
    //         console.log("yes");
    //     });
    //
    //     $(this).one('click', '.btn-danger', function(){
    //         console.log("no");
    //         $(btn_confirm).html('');
    //     });
    //
    //
    //
    //
    // });

    $(document).on("click", ".popover .close", function(){
        $(this).parents(".popover").popover("hide");
    });

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

                var url = window.location.origin + '/ajax/task/' + $(object).attr("data-id") + '/action?action=close';

                // $.get(url,
                //     function(){
                //         var $task_row = $('.task-row[data-id="' + $(object).attr("data-id") + '"]');
                //         $task_row.css("border-left", "20px solid #c5c5c5");
                //         $task_row.find('a[data-action="modal-task"]').addClass('text-task-closed');
                //     }
                // );


                confirmInline(object, function(){

                    $.get(url,
                        function(){

                            var $task_row = $('.task-row[data-id="' + $(object).attr("data-id") + '"]');
                            $task_row.addClass('task-closed');
                            $task_row.find('a[data-action="modal-task"]').addClass('text-task-closed');

                            // $('#modal-block').modal('hide');
                            // $('#modal-block').modal('hide');

                        }
                    );

                });


                break;

            case 'reopen-task':

                var url = window.location.origin + '/ajax/task/' + $(object).attr("data-id") + '/action?action=open';

                // $.get(url,
                //     function(){
                //         var $task_row = $('.task-row[data-id="' + $(object).attr("data-id") + '"]');
                //         $task_row.css("border-left", "20px solid #3c8dbc");
                //         $task_row.find('a[data-action="modal-task"]').removeClass('text-task-closed');
                //     }
                // );

                confirmInline(object, function(){

                    $.get(url,
                        function(){

                            var $task_row = $('.task-row[data-id="' + $(object).attr("data-id") + '"]');
                            $task_row.removeClass('task-closed');
                            $task_row.find('a[data-action="modal-task"]').removeClass('text-task-closed');

                            // $('#modal-block').modal('hide');
                            // $('#modal-block').modal('hide');

                        }
                    );

                });

                break;

            case 'modal-project':

                var data_id = $(object).attr("data-id");

                getModalHtml(window.location.origin + '/ajax/project/' + data_id + '/show');

                break;

            case 'modal-task':

                var data_id = $(object).attr("data-id");

                getModalHtml(window.location.origin + '/ajax/task/' + data_id + '/show');
                
                break;

            case 'modal-team':

                var data_id = $(object).attr("data-id");

                getModalHtml(window.location.origin + '/ajax/team/' + data_id + '/show');

                break;

            case 'modal-create-team':

                getModalHtml(window.location.origin + '/ajax/team/create');

                break;

            case 'modal-create-task':


                var data_id = $(object).parents('.project-box').attr('data-id');

                if(data_id != undefined)
                    getModalHtml(window.location.origin + '/ajax/task/create?project_id=' + data_id);
                else
                    getModalHtml(window.location.origin + '/ajax/task/create');

                break;

            case 'modal-create-project':

                getModalHtml(window.location.origin + '/ajax/project/create');

                break;

            case 'modal-submit':

                submitModal(object);

                break;

            case 'refresh-tasks':

                var project_box = $(object).parents('.project-box');
                var data_id = $(project_box).attr("data-id");

                refreshTasks(project_box, data_id); // task.js

                break;

            case 'user-info':

                // refreshTasks(object); // refreshTasks() -> task.js
                //

                $(document).find('*[data-action="user-info"]').each(function(index, value){
                    $(value).popover("hide");
                });

                // if(!$('*').is('.popover'))
                uploadProfileSm(object);
                // else
                //     $('.popover').popover("hide");

                break;

            case 'delete-task':

                var task_row = $(object).parents('.task-row');
                var data_id = $(task_row).attr("data-id");

                // deleteTask(task_row, data_id); // task.js

                confirmModal(function(){
                    deleteTask(task_row, data_id);
                    // console.log("confirm");
                });

                break;

            case 'edit-task':

                var task_row = $(object).parents('.task-row');
                var data_id = $(task_row).attr("data-id");

                getModalHtml(window.location.origin + '/ajax/task/' + data_id + '/edit');

                break;

            case 'test':

                // confirmInline(object, function(){
                //     console.log("click yes");
                // });

                break;
        }

    }

    function confirmInline(object, callbackYes){

        if($(object).hasClass('confirm-process'))
            return;

        if($(object).hasClass('btn-success'))
            var btn_class = "btn-success";
        else if($(object).hasClass('btn-danger'))
            var btn_class = "btn-danger";

        console.log(btn_class);

        $(object).removeClass(btn_class);
        $(object).addClass('btn-default');
        $(object).addClass('confirm-process');

        var old_html = $(object).html();
        console.log(object);

        var btn_yes = '<button class="btn btn-success">Yes</button>';
        var btn_no = '<button class="btn btn-danger">No</button>';

        $(object).html('Are you sure? ' + btn_yes + btn_no);

        $(object).one('click', '.btn-success', function(){
            callbackYes();

            $(object).html(old_html);
            $(object).removeClass('btn-default');
            $(object).addClass(btn_class);
            $(object).removeClass('confirm-process');
        });

        $(object).one('click', '.btn-danger', function(){

            // console.log("no");
            $(object).html(old_html);
            $(object).removeClass('btn-default');
            $(object).addClass(btn_class);
            $(object).removeClass('confirm-process');
        });


    }

    function confirmModal(callback){

        // $('#modal-confirm').modal({backdrop: 'static'}).on("click", "button.btn-success",function(){
        //     callback();
        // });

        $('#modal-confirm').modal({backdrop: 'static'}).one("click", "button.btn-success",function(){
            callback();
        });
    }

    function uploadProfileSm(object){

        $.ajax({
            type: "get",
            url: window.location.origin + '/ajax/user/' + $(object).attr('data-id') + '/profile-sm',
            success: function(data){

                console.log("popover_update");

                $(object).popover({
                    html: true,
                    placement: "top",
                    content: data
                }).popover("show");

                // console.log(data);
            }

        });
    }


    function onHiddenModal($modal){
        $.noty.closeAll();
        $('#image-viewer').css({
            "display":"none",
            "height":"0px"
        });
        // $modal.data('bs.modal', null);
        $modal.remove();
        // $('#modal-block').remove();
        // $modal.modal("hide");
    }

    function getModalHtml(url){

        $.ajax({
            type: "GET",
            url: url,
            success: function(data){

                // console.log(data);

                $modal = $(data).modal({show:false});

                if($(data).find('input[name="image-viewer"]')) {

                    $('#image-viewer').css("display","flex").animate({
                        "height":"130px",
                        "opacity":"0.75"
                    }, "slow");
                    // console.log(data);
                }

                renderModal($modal);

                // $('body').append(data);
                $modal.on('hidden.bs.modal', function(){
                    onHiddenModal($modal);
                });

                $modal.modal("show");



                // console.log($modal);


                // $modal.after('<div class="image-viewer"></div>');

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


    function submitModal(object){

        var form = $(object).parent().parent().find('form');
        var form_action = form.attr('action');
        var data = form.serialize();
        var type = $(form).attr("method");

        console.log(type);

        var url = window.location.origin + '/' + form_action;

        // console.log(data);

        $.ajax({
            type: type,
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

                console.log(response.responseText);

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

