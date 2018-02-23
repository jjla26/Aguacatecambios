function calcular1(){
		
	var bolivares1= (document.formul.bolivares1.value)*1;
	
	var total1= bolivares1/(document.formul.tasacalc.value);
	
	
	document.formul.pesos1.value= Math.round((total1)*100)/100;
}