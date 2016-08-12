

    // $(document).on("click", "a[data-toggle='popover']", function(){
    //     console.log($(this).attr("data-content-id"));
    // });

    // $(document).click(function (e) {
        // if (($("[data-toggle='popover']").has(e.target).length == 0) || $(e.target).is('.close')) {
        //     $("[data-toggle='popover']").popover('hide');
        // }
    // });

    // var editor = new wysihtml5.Editor(document.getElementById("textarea"), {
    //     toolbar:        "toolbar",
    //     // stylesheets:    "css/stylesheet.css",
    //     parserRules:    wysihtml5ParserRules
    // });


    // $(document).ready(function(){

        // console.log(document.getElementById("textarea"));
        // console.log(document.getElementsByTagName("textarea"));

        // $('textarea').each(function(){
        //     console.log(this);
            // new wysihtml5.Editor(this, {
            //     toolbar:        "toolbar",
            //     // stylesheets:    "css/stylesheet.css",
            //     parserRules:    wysihtml5ParserRules
            // });
            // $(this).wysihtml5.Editor({
            //     toolbar: "toolbar",
            //     parserRules: wysihtml5ParserRules
            // });
        // });


    //     $('.text-editor').each(function(){
    //         var textarea = $(this).find('textarea')[0];
    //         var toolbar = $(this).find('.toolbar')[0];
    //
    //         new wysihtml5.Editor(textarea, {
    //             toolbar: toolbar,
    //             // stylesheets:    "css/stylesheet.css",
    //             parserRules: wysihtml5ParserRules
    //         });
    //
    //         // console.log(toolbar);
    //
    //     });
    //
    // });

    $(document).on("click", '*[data-submit="get"]', function(e){
        e.preventDefault();

        $.get($(this).attr('href'));

        var project_id = $(this).attr('data-project-id');

        // console.log(project_id);

        var project_block = $('section.content').find('[data-id=' + project_id + ']');

        // console.log(project_block);

        updateTasks(project_block);

        // window.location.reload();

    });

    $(document).on("click", ".show-modal", function(e){
        e.preventDefault();
        switcherModalAction($(this).attr('modal-act'), $(this).attr('modal-id'));
    });

    $(document).on("click", "#modal-submit", function(){
        // console.log($('#modal-block form').serialize().replace('visible=on', 'visible=1'));

        var form = $(this).parent().parent().find('form');
        var action = form.attr('action');
        var serialize = form.serialize();

        postModal(action, serialize.replace('visible=on', 'visible=1'));
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
    

    function switcherModalAction(modal_act, modal_id){

        switch(modal_act){
            case 'create-team':

                getModalHtml(window.location.origin + '/workspace/team/create');

                break;
            case 'create-project':

                getModalHtml(window.location.origin + '/workspace/project/create');

                break;
            case 'create-task':

                getModalHtml(window.location.origin + '/workspace/task/create');

                break;

            case 'show-task':

                getModalHtml(window.location.origin + '/workspace/task/' + modal_id + '/modal');

                break;

            case 'show-project':

                getModalHtml(window.location.origin + '/workspace/project/' + modal_id + '/modal');

                break;
            case 'show-team':

                getModalHtml(window.location.origin + '/workspace/team/' + modal_id + '/modal');

                break;
        }

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

    function postModal(action, data){

        var url = window.location.origin + '/' + action;

        console.log(data);

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

