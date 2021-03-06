var Contents = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        TinyMCE_init.width = '100%';
        TinyMCE_init.height = '300px';
        TinyMCE_init.mode = 'exact';
    };
    
    this.slideCont = function(el){
        var href = $(el).attr('href');
        var div = $(href);

        if( div.is(':hidden') ){
            div.slideDown('slow', function(){
                $(el).parent().parent().find('img.jq-icon').attr('src', 'images/icon_arrow_up.png');
                var id = 'txtCont'+href.substr(5);
                if( !$('#'+id).data('loadtiny') ){
                    TinyMCE_init.elements = id;
                    tinyMCE.init(TinyMCE_init);
                    $('#'+id).data('loadtiny', true);
                }

            });

        }else{
            div.slideUp('slow', function(){
                $(el).parent().parent().find('img.jq-icon').attr('src', 'images/icon_arrow_down.png');
            });
            div.find('.success, .error').hide();
        }

        return false;
    };

    this.save = function(el, reference, id){
        if( _working ) return false;

        var parent = $(el).parent();
        var al = parent.find('.jq-ajaxloader').show();

        var params={
            'reference' : reference,
            'content'   : tinyMCE.get(id).getContent()/*,
            'title'     : parent.find('.jq-title').val()*/
        };
        _working=true;
        el.disabled = true;
        $.post(baseURI+'paneladmin/contents/ajax_save', params, function(data){
            al.hide();
            _working=false;
            el.disabled = false;
            MessageShowHide($(el).parent().parent(), data);
        });

        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _working=false;

    /* PRIVATE METHODS
     **************************************************************************/

})();
