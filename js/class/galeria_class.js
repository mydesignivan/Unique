var Galeria = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode_edit){
        _mode_edit = mode_edit;

        // ESTO ES PARA LA GALERIA DE IMAGEN
        $(document).ready(function(){
            PictureGallery.initializer({
                sel_input      : '#txtUploadFile',
                sel_button     : '#btnUpload',
                sel_ajaxloader : '#ajax-loader1',
                sel_gallery    : '#gallery-image',
                sel_msgerror   : '#pg-msgerror',
                action         : baseURI+'paneladmin/products/ajax_upload_gallery',
                href_remove    : baseURI+'paneladmin/products/ajax_upload_delete',
                defined_size   : {
                    width  : 130,
                    height : 58
                },
                callback       : function(){
                    $('a.jq-image').fancybox();
                }
            });
        });

        $("#gallery-image").sortable({
                                stop : function(){
                                    $('a.jq-image').fancybox();
                                },
                                revert: true,
                                handle : '.handle'
                           }).disableSelection();
        // ----

        // Configura Fancybox
        $('a.jq-image').fancybox();

    };

    this.upload = function(){
        var input = $('#txtImage');
        if( !input.val() ) return false;
        var parent = input.parent();
        var ext = input.val().replace(/^([\W\w]*)\./gi, '').toLowerCase();
        
        if( !(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) ){
            alert('Error: Solo se permiten imagenes');
            return false;
        }

        var inputclone = input.clone(true);

        var form = $('#ajaxupload-form');

        $('#btnUpload2')[0].disabled=true;
        $('#ajaxupload-load').show();
        
        form.find('input:file').remove();
        input.prependTo(form);
        parent.prepend(inputclone);
        
        $('#ajaxupload-form iframe').attr('src', '');
        form.submit();

        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _ajaxupload_output=false;
     var _mode_edit=false;

    /* PRIVATE METHODS
     **************************************************************************/
     var _Loader = {
         show : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').show();
             f.find('.jq-submit')[0].disabled=true;
         },
         hide : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').hide();
             f.find('.jq-submit')[0].disabled=false;
         }
     };

     var _on_submit = function(form){
        if( !_ajaxupload_output && !_mode_edit ){
            $('#txtImage').css('border-style', 'dashed');
            $('#ajaxupload-error').html('Este campo es obligatorio.').show();
            return false;
        }else $('#txtImage').css('border-style', 'solid');

        if( $('#gallery-image li').length==0 || $('#gallery-image').is(':hidden') ){
            $('#pg-msgerror').html('Debe ingresar al menos una im&aacute;gen').show();
            return false;
        }

        if( tinyMCE.get('txtContent').getContent().length==0 ){
            $('#msgbox1').show();
            return false;
        }
  
        _Loader.show('#form1');

        var data={};
        data.gallery={};
        data.gallery.images_new = PictureGallery.get_images_new();
        if( _mode_edit ) {
            data.gallery.images_del = PictureGallery.get_images_del();
            data.gallery.images_order = PictureGallery.get_orders();
        }
        data.image_thumb = _ajaxupload_output;

        $('#json').val(JSON.encode(data));

        form.submit();
        return true;
     }

})();
