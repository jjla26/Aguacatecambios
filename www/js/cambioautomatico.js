function cambioautomatico(){
	var pesos= (document.formempresas.pesos.value)*1;
	
	var total= pesos*9.5;
	
	document.formempresas.bolivares.value= total;
	
	
}

