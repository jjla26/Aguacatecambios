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

function cambiarcampos16(obj){
        
        if(obj.value =="Bolivares"){
                
                document.getElementById("pesos2").readOnly = true;
                document.getElementById("bolivares2").readOnly = false;
        }else if(obj.value =="Pesos"){

                document.getElementById("pesos2").readOnly = false;
                document.getElementById("bolivares2").readOnly = true;
        }else{
                document.getElementById("pesos2").readOnly = true;
                document.getElementById("bolivares2").readOnly = true;

        }

}

function cambiarcampos17(obj){
        
        if(obj.value == 1){

                document.getElementById('nombre2').style.display = 'none';
                document.getElementById('cedula2').style.display = 'none';
                document.getElementById('cuenta2').style.display = 'none';
                document.getElementById('banco2').style.display = 'none';
                document.getElementById('pesos2').style.display = 'none';
                document.getElementById('bolivares2').style.display = 'none';
                

                document.getElementById('nombre2').required = false;
                document.getElementById('cedula2').required = false;
                document.getElementById('cuenta2').required = false;
                document.getElementById('banco2').required = false;
                document.getElementById('pesos2').required = false;
                document.getElementById('bolivares2').required = false;
                
        }else if (obj.value == 2 ){


                document.getElementById('nombre2').style.display = 'block';
                document.getElementById('cedula2').style.display = 'block';
                document.getElementById('banco2').style.display = 'block';
                document.getElementById('cuenta2').style.display = 'block';
                document.getElementById('pesos2').style.display = 'block';
                document.getElementById('bolivares2').style.display = 'block';

                document.getElementById('nombre3').required = true;
                document.getElementById('tipodoc1').required = true;
                document.getElementById('cedula3').required = true;
                document.getElementById('banco3').required = true;
                document.getElementById('cuenta3').required = true;
                document.getElementById('pesos3').required = true;
                document.getElementById('bolivares3').required = true;
                
                
        }else{

                document.getElementById('nombre2').style.display = 'none';
                document.getElementById('cedula2').style.display = 'none';
                document.getElementById('banco2').style.display = 'none';
                document.getElementById('cuenta2').style.display = 'none';
                document.getElementById('pesos2').style.display = 'none';
                document.getElementById('bolivares2').style.display = 'none';
                
                document.getElementById('nombre3').required = false;
                document.getElementById('tipodoc1').required = false;
                document.getElementById('cedula3').required = false;
                document.getElementById('banco3').required = false;
                document.getElementById('cuenta3').required = false;
                document.getElementById('pesos3').required = false;
                document.getElementById('bolivares3').required = false;
                
                
        }
        
        
        
}

function cambiarcampos18(obj){
        
        if(obj.value =="Bolivares"){
                
                document.getElementById("pesos1").readOnly = true;
                document.getElementById("bolivares1").readOnly = false;
                document.getElementById("pesos3").readOnly = true;
                document.getElementById("bolivares3").readOnly = false;
        }else if(obj.value =="Pesos"){

                document.getElementById("pesos1").readOnly = false;
                document.getElementById("bolivares1").readOnly = true;
                document.getElementById("pesos3").readOnly = false;
                document.getElementById("bolivares3").readOnly = true;
        }else{
                document.getElementById("pesos1").readOnly = true;
                document.getElementById("bolivares1").readOnly = true;
                document.getElementById("pesos3").readOnly = true;
                document.getElementById("bolivares3").readOnly = true;

        }

}
