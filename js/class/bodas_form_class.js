var Bodas = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/

    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
            /*    txtNombreNovio : 'required',
                txtNombreNovia : 'required',
                txtApellidoNovio : 'required',
                txtApellidoNovia : 'required',
                txtUbiSalon : 'required',
                txtUbiIglesia : 'required',
                txtHistNovia : 'required',
                txtHistNovio : 'required',*/
                txtHistNovios : 'required'
            },
            submitHandler : function(form){
             var regalos=[];
             $("#lstRegalos option").each(function () {regalos.push($(this).text()); });
            _ajaxupload_output.regalos=regalos;
             var menus=[];
             $("#lstMenu option").each(function () {menus.push($(this).text()); });

             _ajaxupload_output.menus=menus;

             $("#json").val(JSON.encode(_ajaxupload_output));
             alert(JSON.encode(_ajaxupload_output));
             

//            $("#json").val($("#json").val()+JSON.encode(regalos));

            //alert(JSON.encode(regalos));



                _Loader.show('#form1');
               form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });
        $('#form1').validate(o);


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

                    eval("_ajaxupload_output."+_inputAjaxUpload+" = output;");


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
        _inputAjaxUpload = txt;
        _btnSubmit = input.parent().find('.jq-au-button')[0];
        _btnSubmit.disabled=true;

        _divAjaxLoad = input.parent().find('.ajaxupload-load').show();
        _imgThumb = input.parent().parent().parent().find('.jq-au-thumb');
        _divError = input.parent().parent().find('.ajaxupload-error');


        form.find('input').remove();
        input.prependTo(form);
        form.append("<input type='hidden' value='"+opcion+"' name='opcion' />");
        parent.prepend(inputclone);

        $('#ajaxupload-form iframe').attr('src', '');
        form.submit();

        return false;
    };

    this.agregarItem = function(list, item){
        if($(item).val().length>0){
            $(list).append("<option value=''>"+$(item).val()+"</option");
            $(item).val("");
        }

    }
    this.quitarItem = function(list){
        $(list+" :selected").remove();
    }



 


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _optval={};
     var _working=false;
     var _imgThumb;
     var _divError;
     var _divAjaxLoad;
     var _btnSubmit;
     var _inputAjaxUpload;
     var _ajaxupload_output= {};

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
