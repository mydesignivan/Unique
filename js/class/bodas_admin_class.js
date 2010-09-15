var Bodas = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/

    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtNombreNovio : 'required',
                txtNombreNovia : 'required',
                txtUbiSalon : 'required',
                txtUbiIglesia : 'required',
                txtHistNovia : 'required',
                txtHistNovio : 'required',
                txtHistNovios : 'required'
            },
            submitHandler : function(form){
                _Loader.show('#form1');
                //form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });
        $('#form1').validate(o);

  //      formatNumber.init('#txtPhoneNum, #txtPhoneCode, #txtAdultos, #txtNiños');

       // ESTO ES PARA EL UPLOAD SIMPLE
        $('#ajaxupload-form iframe').load(function(){
            if( this.src=="about:blank" ) return false;

            var content = this.contentDocument || this.contentWindow.document;
                content = content.body.innerHTML;

            _btnSubmit.disabled=false;

            _divAjaxLoad.hide();
            _working=false;

            var result;
            
            try{
                eval('result = '+content);
            }catch(e){

                alert('ERROR:\n\n'+content);
                return false;
            }
            if( result ){
                if( result['status']=="success" ) {
                    _divError.hide();
                    var output = result['output'][0];

                    _imgThumb.attr('src', output['href_image_full'])
                             .attr('alt', output['filename_image'])
                             .attr('width', output['thumb_width'])
                             .attr('height', output['thumb_height'])
                             .show();
                    //_ajaxupload_output = output;
                }else _divError.html(result['error'][0]['message']).show();

            }else alert("Ha ocurrido un error en el servidor.");

            return false;
        });
        //-----
    };

   this.upload = function(txt,opcion){
        if( _working ) {
            alert("El servidor se encuentra ocupado.");
            return false;
        }
        


        _working=true;

        var input = $('#'+txt);
        if( !input.val() ) return false;
        var parent = input.parent();
        var ext = input.val().replace(/^([\W\w]*)\./gi, '').toLowerCase();

        if( !(ext && /^(jpg|png|jpeg|gif)$/.test(ext)) ){
            alert('Error: Solo se permiten imagenes');
            return false;
        }

        var inputclone = input.clone(true);

        var form = $('#ajaxupload-form');

        _btnSubmit = input.parent().find('.jq-au-button')[0];
        _btnSubmit.disabled=true;

        _divAjaxLoad = input.parent().find('.ajaxupload-load').show();
        _imgThumb = input.parent().parent().parent().find('.jq-au-thumb');
        _divError = input.parent().parent().find('.ajaxupload-error');


        form.find('input:file').remove();
        input.prependTo(form);
        form.append("<input type='hidden' value='"+opcion+"' id='opcion' name='opcion'> " );
        form.append("<input type='hidden' value='"+txt+"' id='txt' name='txt'> " );
        parent.prepend(inputclone);

        $('#ajaxupload-form iframe').attr('src', '');
        form.submit();



        return false;
    };

    this.agregarRegalo = function(){
        if($("#txtRegalo").val().length>0){
            $("#lstListaRegalos").append("<option value=''>"+$("#txtRegalo").val()+"</option");
            $("#txtRegalo").val("");
        }

    }
    this.quitarRegalo = function(){
        $("#lstListaRegalos option:selected").remove();
    }

    this.agregarMenu = function(){
        if($("#txtMenu").val().length>0){
            $("#lstListaMenu").append("<option value=''>"+$("#txtMenu").val()+"</option");
            $("#txtMenu").val("");
        }

    }
    this.quitarMenu = function(){
        $("#lstListaMenu option:selected").remove();
    }


 


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _optval={};
     var _working=false;
     var _imgThumb;
     var _divError;
     var _divAjaxLoad;
     var _btnSubmit;

    /* PRIVATE METHODS
     **************************************************************************/
     var _Loader = {
         show : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').show();
             $('#btnSubmit')[0].disabled=true;
         },
         hide : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').hide();
             $('#btnSubmit')[0].disabled=false;
         }
     };

})();
