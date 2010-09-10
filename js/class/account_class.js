var Account = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var o = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtName: 'required',
                txtEmail: {
                   required: true,
                   email: true
                },
                txtMessage: 'required'
            },
            submitHandler : function(form){
                _Loader.show('#form1');
                form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });
        $('#form1').validate(o);
    };

    this.initializer2 = function(){
        _optval = $.extend({}, jQueryValidatorOptDef, {
            rules : {
                txtEmail: {
                   required: true,
                   email: true
                },
                txtInfo   : 'required',
                txtCodeGM : 'required'
            },
            submitHandler : function(form){
                _Loader.show('#form1');
                form.submit();
            },
            invalidHandler : function(){
                _Loader.hide('#form1');
            }
        });

        $('#form1').validate(_optval);
    };

    this.showcontapass = function(el){
        $(el).parent().hide();
        
        $('#contPass').fadeIn('slow', function(){
            $('#txtPassOld, #txtPassNew, #txtConfirmPass').val('');
            $('#txtPassOld').focus();

            _optval.rules.txtPassOld = {
                required : true,
                remote : {
                   url  : baseURI+'panel/myaccount/ajax_check_pass/',
                   type : "post"
                }
            };
            _optval.rules.txtPassNew = {
                required : true,
                password : true
            };
            _optval.rules.txtConfirmPass = {
                required : true,
                equalTo  : '#txtPassNew'
            };
            $('#form1').validate(_optval);
        });
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
             f.find('.jq-submit')[0].disabled=true;
         },
         hide : function(sel){
             var f = $(sel);
             f.find('img.jq-loading').hide();
             f.find('.jq-submit')[0].disabled=false;
         }
     };

})();
