function calcularofic(obj){
	
	var pesos2 = (document.formul0.pesos2.value)*1;
	
	if(pesos2 > 90000){
	
	var pesos2 = (document.formul0.pesos2.value)*1;

	var total = pesos2*(document.formul0.tasaesp.value);
	

	document.formul0.bolivares2.value= total;

	
	}else{
		
	var total = pesos2*(document.formul0.tasa.value);
	

	document.formul0.bolivares2.value= total;
	
}

function calcularofic1(){

	var pesos3 = (document.formul3.pesos3.value)*1;

	var total = pesos3*(document.formul3.tasa.value);
	

	document.formul3.bolivares3.value= total;
	
}
