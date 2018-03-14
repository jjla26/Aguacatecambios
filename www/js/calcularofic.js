function calcularofic(){
	
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var limite = 90000;
	var pesos2 = (document.formul0.pesos2.value)*1;
	if(totalpesos >= limite){
	
	var total = pesos2*(document.formul0.tasaesp.value);
	

	document.formul0.bolivares2.value= total;

	
	}else{
		
	var total = pesos2*(document.formul0.tasa.value);
	

	document.formul0.bolivares2.value= total;
	
}}

function calcularofic1(){

	var pesos3 = (document.formul3.pesos3.value)*1;

	var total = pesos3*(document.formul3.tasa.value);
	
	document.formul3.bolivares3.value= total;
	
}

function calcularofic2(){
	
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var limite = 90000;
	var pesos2 = (document.formul0.pesos2.value)*1;
	var bolivares1=(document.formul0.bolivares2.value)*1;
	
	if(totalpesos>= 90000){
		
	var total = bolivares1/(document.formul0.tasaesp.value);
	
	document.formul0.pesos2.value= total;
	
	}else{
		
	var total = bolivares1/(document.formul0.tasa.value);

	document.formul0.pesos2.value= total;
		
}}
	
function calcularPesosBs(){
	
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var h1Text = document.querySelector(".entry-title").textContent;
	console.log(h1Text);
	var pesos2 = (document.formul0.pesos2.value)*1;
	if(totalpesos >= limite){
	
	var total = pesos2*(document.formul0.tasaesp.value);
	

	document.formul0.bolivares2.value= total;

	
	}else{
		
	var total = pesos2*(document.formul0.tasa.value);
	

	document.formul0.bolivares2.value= total;
	
}}


function calcularBsPesos(){
	
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var limite = 90000;
	var pesos2 = (document.formul0.pesos2.value)*1;
	var bolivares1=(document.formul0.bolivares2.value)*1;
	
	if(totalpesos>= 90000){
		
	var total = bolivares1/(document.formul0.tasaesp.value);
	
	document.formul0.pesos2.value= total;
	
	}else{
		
	var total = bolivares1/(document.formul0.tasa.value);

	document.formul0.pesos2.value= total;
		
}}
	
