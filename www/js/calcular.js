function calcular(){
	
	var pesos = document.formul.pesos.value*1;
	
	var total = pesos*(document.formul.tasacalc.value);
	
	document.formul.bolivares.value= total;
	
}

