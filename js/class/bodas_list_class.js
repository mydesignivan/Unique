var BodasList = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.del_sel = function(){
        var list = $("#tblList tbody input:checked");
        if( list.length==0 ){
            alert("Debe seleccionar un item.");
            return false;
        }

        var data = get_data(list);

        if( confirm("¿Está seguro de eliminar la(s) boda(s) seleccionada(s)?\n\n"+data.names.join(", ")) ){
            location.href = baseURI+'paneladmin/bodas/delete/'+data.id.join("/");
        }
        return false;
    };

    this.del = function(id){
        if( confirm("¿Está seguro de eliminar esta boda?")){
              location.href = baseURI+'paneladmin/bodas/delete/'+id;
        }
        return false;
    };


})();
