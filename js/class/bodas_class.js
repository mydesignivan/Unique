var Bodas = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtNameInvitado : 'required',
                txtEmail: {required: true, email: true},
                txtPhoneNum: "required",
                cboMenu: "required",
                txtNiños: "required",
                txtAdultos: "required"
  
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

        formatNumber.init('#txtPhoneNum, #txtPhoneCode, #txtAdultos, #txtNiños');
    };

    this.load_menu = function(vista, num_op){
        $(".menu-bodas li").removeClass("current");
        $(".menu-bodas li").eq(num_op).addClass("current");
        $('#resultboda').load(baseURI+'paneluser/index/ajax_get_form/'+vista);

        
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
