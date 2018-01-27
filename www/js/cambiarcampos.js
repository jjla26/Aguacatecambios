function cambiarcampos(obj){
    
    if (obj.value == "Banesco"){
        document.formul0.cuentaorigen.options[5].wrap( "<span>" );
        document.formul0.cuentaorigen.options[6].wrap( "<span>" );;   
        document.formul0.cuentaorigen.options[7].hide();

    }else{
    
        document.formul0.cuentaorigen.options[1].remove();
        document.formul0.cuentaorigen.options[2].remove();
        document.formul0.cuentaorigen.options[3].remove();
        document.formul0.cuentaorigen.options[4].remove();
    }
}