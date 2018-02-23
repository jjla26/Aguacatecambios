function cambiarcampos(obj){
    
    if (obj.value == "Banesco"){
        
        document.getElementById("mercantilCuentas").style.display='none';
        document.getElementById("banescoCuentas").style.display='block';
        
    }else{
        document.getElementById("mercantilCuentas").style.display='block';
        document.getElementById("banescoCuentas").style.display='none';
      
    }
}

function cambiarcampos12(){
    
        document.getElementById("b1").style.display='block';
}

function cambiarcampos13(){
    
        document.getElementById("b2").style.display='block';
}

function cambiarcampos6(){
    
        document.getElementById("b3").style.display='block';

}
function cambiarcampos7(){
    
        document.getElementById("b4").style.display='block';

}
function cambiarcampos8(){
    
        document.getElementById("b5").style.display='block';
        
}
function cambiarcampos9(){
    
        document.getElementById("b6").style.display='block';

}
function cambiarcampos10(){
    
        document.getElementById("b7").style.display='block';
}

function cambiarcampos14(){
    
        document.getElementById("b8").style.display='block';
}

function cambiarcampos11(obj){
        if(obj.value == "Efectivo"){
                document.getElementById("comprobante1").remove();
        }else{
                document.getElementById("comprobante1").style.display='block';
}}