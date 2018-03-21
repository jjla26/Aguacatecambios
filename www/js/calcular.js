function habilitarcant(){
	
	var totalpesos = (document.formul0.totalpesos.value)*1;
	console.log(totalpesos);
	if(totalpesos<7000){
				
				document.getElementById('pesosbs1').disabled = true;
				document.getElementById('nombre1').disabled = true;
                document.getElementById('tipodoc').disabled =true;
                document.getElementById('cedula1').disabled =true;
                document.getElementById('banco1').disabled =true;
                document.getElementById('cuenta1').disabled = true;
                document.getElementById('pesos1').disabled = true;
                document.getElementById('bolivares1').disabled = true;
                
                
				alert("El deposito minimo aceptado es de 7000 CLP");
		
		
	}else{
		        document.getElementById('pesosbs1').disabled = false;
		        document.getElementById('nombre1').disabled = false;
                document.getElementById('tipodoc').disabled = false;
                document.getElementById('cedula1').disabled = false;
                document.getElementById('banco1').disabled = false;
                document.getElementById('cuenta1').disabled = false;
                document.getElementById('pesos1').disabled = false;
                document.getElementById('bolivares1').disabled = false;
				
	}
	
	
	if(totalpesos>= 14000){ 
		
		document.getElementById("transf1").disabled = false;
		
		
		
	
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
	
		document.formul0.transf1.value= 1;
		document.getElementById("transf1").disabled = true;
	
}
}

function calcular(){
	
	var h1Text = document.querySelector(".entry-title").textContent;
	var pesos = document.formul.pesos.value*1;
	var total = pesos*h1Text;
	
	document.formul.bolivares.value= total;
	
}

function calcular1(){
		
	var h1Text = document.querySelector(".entry-title").textContent;
	var bolivares1= (document.formul.bolivares1.value)*1;
	var total1= bolivares1/h1Text;
	
	document.formul.pesos1.value= Math.round(total1);
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
	
	document.formul0.pesos.value = Math.round(total);
	document.formul0.pesos5.value = Math.round(totalpesos- (bolivares1/h1Text));
	document.formul0.bolivares5.value = Math.round((totalpesos*h1Text)-bolivares1);
	
	}else{
		
	var total = bolivares1/h1Text;

	document.formul0.pesos.value= Math.round(total);
	document.formul0.pesos5.value= Math.round(totalpesos- (bolivares1/h1Text));
	document.formul0.bolivares5.value = Math.round((totalpesos*h1Text)-bolivares1);	
}}else{
		document.getElementById("botonenv").disabled= true;
		alert("El minimo a transferir es de $7.000 CLP");
	}}else{
		document.getElementById("botonenv").disabled= true;
		
		alert("La cantidad de pesos no puede ser mayor a la cantidad depositada");
		
		
	}}




