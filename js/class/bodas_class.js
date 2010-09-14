var Bodas = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtNameInvitado : 'required',
                
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

    };

    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _optval={};

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
