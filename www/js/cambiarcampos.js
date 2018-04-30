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
                
                
                document.getElementById('nombre3').required = false;
                document.getElementById('tipodoc1').required = false;
                document.getElementById('cedula3').required = false;
                document.getElementById('cuenta3').required = false;
                document.getElementById('banco3').required = false;
                document.getElementById('pesos3').required = false;
                document.getElementById('bolivares3').required = false;
                document.getElementById('pesosbs1').disabled= true;
                document.getElementById('pesosbs1').required = false;                
                
                var limite = 100000;
                var totalpesos  = document.formul0.totalpesos.value;
	        var totalpesos2 = document.formul0.totalpesos10.value;
	        var h1Text = document.querySelector(".entry-title").textContent;
        	var pesos = totalpesos;
        	var pesos2 = totalpesos2;
        	document.formul0.pesos.value = pesos;
        	document.formul0.pesos11.value = pesos2;
        	
                if(totalpesos >= limite){
		
		document.getElementById("botonenv").disabled= false;
	
        	var total = pesos2*h1Text;
                
                document.formul0.pesos.value = totalpesos;
        	document.formul0.bolivares.value= format_number((total).toString().replace(/\./g,','));
        	
        	}else{
        		document.getElementById("botonenv").disabled= false;
        		
        	var total = pesos2*h1Text;
        	
                document.formul0.bolivares.value= format_number((total).toString().replace(/\./g,','));
        	document.formul0.bolivares5.value= format_number(((totalpesos*h1Text)-total).toString().replace(/\./g,','));
        	document.formul0.pesos5.value= format_number((totalpesos-pesos2).toString().replace(/\./g,','));
        		
        	}
		
		
	
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
                document.getElementById('pesosbs1').disabled= false;
                document.getElementById('pesos1').value = "";
                document.getElementById('bolivares1').value = "";
                document.getElementById('pesos10').value = "";
                document.getElementById('bolivares10').value = "";
                document.getElementById('pesos3').value = "";
                document.getElementById('bolivares3').value = "";
                document.getElementById('pesos7').value = "";
                document.getElementById('bolivares7').value = "";
                
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
                document.getElementById('pesos1').value = "";
                document.getElementById('bolivares1').value = "";
                document.getElementById('pesos10').value = "";
                document.getElementById('bolivares10').value = "";
                document.getElementById('pesos3').value = "";
                document.getElementById('bolivares3').value = "";
                document.getElementById('pesos7').value = "";
                document.getElementById('bolivares7').value = "";
                
        }
        
        
        
}

function cambiarcampos18(obj){
        
        if(obj.value =="Bolivares"){
                
                document.getElementById("pesos1").readOnly = true;
                document.getElementById("bolivares1").readOnly = false;
                
        }else if(obj.value =="Pesos"){

                document.getElementById("pesos1").readOnly = false;
                document.getElementById("bolivares1").readOnly = true;
                
        }else{
                document.getElementById("pesos1").readOnly = true;
                document.getElementById("bolivares1").readOnly = true;
                document.getElementById("pesos3").readOnly = true;
                document.getElementById("bolivares3").readOnly = true;

        }

}

