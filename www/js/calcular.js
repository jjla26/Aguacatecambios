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
	if(totalpesos >= limite){
	
	var total = pesos2*h1Text;
	console.log(total);

	document.formul0.bolivares.value= total;

	
	}else{
		
	var total = pesos2*h1Text;
	

	document.formul0.bolivares.value= total;
	
}}


function calcularBsPesos(){
	
	var limite = 90000;
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var pesos2	= (document.formul0.pesos.value)*1;
	var bolivares1=(document.formul0.bolivares.value)*1;
	var h1Text = document.querySelector(".entry-title").textContent;
	
	if(totalpesos>= limite){
		
	var total = bolivares1/h1Text;
	
	document.formul0.pesos.value= total;
	
	}else{
		
	var total = bolivares1/h1Text;

	document.formul0.pesos.value= total;
		
}
	
}

function calcularPesosBs1(){
	
	var limite = 10000;
	
	var totalpesos = (document.formul0.totalpesos.value)*1;
	
	var h1Text = document.querySelector(".entry-title").textContent;
	
	var pesos2 = (document.formul0.pesos5.value)*1;
	
	console.log(pesos2);
	
	console.log(totalpesos);
	
	console.log(h1Text);
	
	if(totalpesos >= limite){
	
	var total = pesos2*h1Text;
	console.log(total);

	document.formul0.bolivares5.value= total;

	
	}else{
		
	var total = pesos2*h1Text;
	

	document.formul0.bolivares5.value= total;
	
}
	
}


function calcularBsPesos1(){
	
	var limite = 10000;
	var totalpesos = (document.formul0.totalpesos.value)*1;
	var pesos2	= (document.formul0.pesos5.value)*1;
	var bolivares1=(document.formul0.bolivares5.value)*1;
	var h1Text = document.querySelector(".entry-title").textContent;
	console.log(totalpesos);
	console.log(h1Text);
	if(totalpesos>= limite){
		
	var total = bolivares1/h1Text;
	
	document.formul0.pesos5.value= total;
	
	}else{
		
	var total = bolivares1/h1Text;

	document.formul0.pesos5.value= total;
		
}
	
}
	



