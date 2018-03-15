function calcular(){
	
	var pesos = document.formul.pesos.value*1;
	
	var total = pesos*(document.formul.tasacalc.value);
	
	document.formul.bolivares.value= total;
	
}

function calcularPesosBs(){
	var limite = 10000;
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var h1Text = document.querySelector(".entry-title").textContent;
	console.log(h1Text);
	console.log(h1Text);
	var pesos2 = (document.formul0.pesos.value)*1;
	console.log(pesos2);
	console.log(totalpesos);
	

	if(pesos2<= totalpesos){
	if(pesos2>=7000){
	if(totalpesos >= limite){
		
		document.getElementById("botonenv").disabled= false;
	
	var total = pesos2*h1Text;
	console.log(total);

	document.formul0.bolivares.value= total;
	document.formul0.bolivares5.value= (totalpesos*h1Text)-total;
	document.formul0.pesos5.value= totalpesos-pesos2;
	}else{
		
	var total = pesos2*h1Text;
	

	document.formul0.bolivares.value= total;
	document.formul0.bolivares5.value= (totalpesos*h1Text)-total;
	document.formul0.pesos5.value= totalpesos-pesos2;
		
	}}else{
		document.getElementById("botonenv").disabled= true;
		alert("El deposito minimo es de $7.000 CLP");
	}}else{
		document.getElementById("botonenv").disabled= true;
		
		alert("La cantidad de pesos no puede ser mayor a la cantidad depositada");
		
		
	}}


function calcularBsPesos(){
	
	var limite = 90000;
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var pesos2	= (document.formul0.pesos.value)*1;
	var bolivares1 = (document.formul0.bolivares.value)*1;
	var h1Text = document.querySelector(".entry-title").textContent;
	
	if((bolivares1/h1Text)<= totalpesos){
	if((bolivares1/h1Text)>=7000){
	if(totalpesos>= limite){
		
	document.getElementById("botonenv").disabled= false;
		
	var total = bolivares1/h1Text;
	
	document.formul0.pesos.value = total;
	document.formul0.pesos5.value = totalpesos- (bolivares1/h1Text);
	document.formul0.bolivares5.value = (totalpesos*h1Text)-bolivares1;
	
	}else{
		
	var total = bolivares1/h1Text;

	document.formul0.pesos.value= total;
	document.formul0.pesos5.value= totalpesos- (bolivares1/h1Text);
	document.formul0.bolivares5.value = (totalpesos*h1Text)-bolivares1;	
}}else{
		document.getElementById("botonenv").disabled= true;
		alert("El minimo a transferir es de $7.000 CLP");
	}}else{
		document.getElementById("botonenv").disabled= true;
		
		alert("La cantidad de pesos no puede ser mayor a la cantidad depositada");
		
		
	}}




