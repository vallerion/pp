
    $('.show-modal').click(function(){
        // console.log($(this).attr('data-act'));
        
        $('.modal-title').html('title');
        $('.modal-body').html('body');
        $('.modal-footer').html('<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>');
        
        $('.modal-block').modal("show");
    });

