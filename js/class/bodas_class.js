var Bodas = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtNameInvitado : 'required',
                txtEmail : {required: true, email: true},
                txtPhoneNum : "required",
                cboMenu : "required",
                txtNinio : "required",
                txtAdultos : "required"
 
            },
            submitHandler : function(form){
                var el1 = $('#txtDedicatoria');
                var el2 = $('#txtCronica');

                if( el1.length>0 ) $('#form1').append(el1);
                if( el2.length>0 ) $('#form1').append(el2);

                _Loader.show('#form1');
                form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });
        $('#form1').validate(o);

        formatNumber.init('#txtPhoneNum, #txtPhoneCode, #txtAdultos, #txtNinio');
        $('#txtNameInvitado').blur(function(){$(this).ucTitle()});
    };

    this.load_menu = function(vista, num_op){
        if( _working ) return false;
        _working=true;

        $(".menu-bodas li").removeClass("current");
        $(".menu-bodas li").eq(num_op).addClass("current");

        $('div.jq-tab').hide();
        var tab = $('#tab'+num_op);
        if( !tab.data('opened') ){
            $.get(baseURI+'paneluser/index/ajax_get_form/'+vista, function(data){
                _working=false;
                tab.html(data).show();
                tab.data('opened', true);
            });
        }else{
            _working=false;
            tab.show();
        }
        
        return false;
    };

    this.popup_login = function(){
        $.get(baseURI+'bodas/ajax_showpopup/', function(data){
            $('#popup-login').html(data).modal({
                overlayClose : true,
                onShow : function(){
                    $('#txtUser').val('').focus();
                    $('#txtPass').val('');
                }
            });
        });
    };

    this.submit_login = function(f){
        $('#ajaxupload').show();
        $(f).find(':submit')[0].disabled = true;

        $.post(baseURI+'bodas/login', $(f).serialize(), function(data){
            $('#ajaxupload').hide();
            $(f).find(':submit')[0].disabled=false;
            
            try{
                var res;
                eval('res = '+data);
            }catch(e){
                alert('ERROR AJAX:\n\n'+data);
                return false;
            }

            if( typeof res=="object" ){
                if( res.status=="error" ){
                    $('#msgbox-error').html(res.message).show();
                }else location.href = baseURI+'paneluser/';
            }

            return false;
        });
        
        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
     var _working=false;

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
