function habilitarcant(){
	
	var totalpesos = document.formul0.totalpesos.value;
	var totalpesos = totalpesos.toString().replace(/\./g,'');
	var totalpesos = totalpesos.replace(/\,/g,'.')
	
	
	if(totalpesos<10000){
				
				document.getElementById('nombre1').disabled = true;
                document.getElementById('tipodoc').disabled =true;
                document.getElementById('cedula1').disabled =true;
                document.getElementById('banco1').disabled =true;
                document.getElementById('cuenta1').disabled = true;
                document.getElementById('pesos1').disabled = true;
                document.getElementById('bolivares1').disabled = true;
                document.getElementById('pesos1').value = "";
                document.getElementById('bolivares1').value = "";
                document.getElementById("transf1").disabled = true;
                document.getElementById("botonenv").disabled= true;
                document.getElementById('pesosbs1').value = "";
                
               alert("El deposito minimo aceptado es de 10000 CLP");
		
		
	}else if (totalpesos >= 10000 && totalpesos < 20000) {
		
				document.getElementById('nombre3').required = false;
        		document.getElementById('tipodoc1').required = false;
        		document.getElementById('cedula3').required = false;
        		document.getElementById('banco3').required = false;
        		document.getElementById('cuenta3').required = false;
        		document.getElementById('pesos3').required = false;
        		document.getElementById('bolivares3').required = false;
        		document.getElementById("transf1").disabled = true;
		        document.getElementById('nombre1').disabled = false;
		        document.getElementById('pesosbs1').value = "Pesos";
               	document.getElementById('tipodoc').disabled = false;
               	document.getElementById('cedula1').disabled = false;
               	document.getElementById('banco1').disabled = false;
               	document.getElementById('cuenta1').disabled = false;
               	document.getElementById('pesos1').disabled = false;
               	document.getElementById('bolivares1').disabled = false;
               	document.getElementById("botonenv").disabled= false;
               	document.getElementById('nombre2').style.display = 'none';
               	document.getElementById('cedula2').style.display = 'none';
               	document.getElementById('banco2').style.display = 'none';
               	document.getElementById('cuenta2').style.display = 'none';
               	document.getElementById('pesos2').style.display = 'none';
               	document.getElementById('bolivares2').style.display = 'none';
                document.formul0.totalpesos10.value = totalpesos;
               	document.formul0.transf1.value= 1;
                
        		var limite = 100000;
        		var totalpesos  = document.formul0.totalpesos.value
				var totalpesos2 = document.formul0.totalpesos10.value;
	        	console.log(totalpesos);
	       		var h1Text = document.querySelector(".entry-title").textContent;
        		var pesos = totalpesos;
        		var pesos2 = totalpesos2;
        		document.formul0.pesos.value = pesos;
        		document.formul0.pesos11.value = pesos2;
        		console.log(pesos2);
        	
        
        	
        		if(totalpesos >= limite){
		
					document.getElementById("botonenv").disabled= false;
	       			var total = pesos2*h1Text;
                	document.formul0.pesos.value = totalpesos;
        			document.formul0.bolivares.value= format_number((total).toString().replace(/\./g,','));
        			document.formul0.bolivares11.value = pesos2*h1Text;
        		}else{
        			
        			document.getElementById("botonenv").disabled= false;
        			var total = pesos2*h1Text;
        			document.formul0.bolivares.value= format_number((total).toString().replace(/\./g,','));
        			document.formul0.bolivares5.value= format_number(((totalpesos*h1Text)-total).toString().replace(/\./g,','));
        			document.formul0.pesos5.value= format_number((totalpesos-pesos2).toString().replace(/\./g,','));
        			document.formul0.bolivares11.value = pesos2*h1Text;
        		}
                
				
		}
	
	
		else{ 
		
		document.getElementById("transf1").disabled = false;
		document.formul0.totalpesos10.value = totalpesos;
		document.getElementById('pesos1').value = "";
		document.getElementById('bolivares1').value = "";
		document.getElementById("transf1").disabled = false;
		document.getElementById('nombre1').disabled = false;
	        document.getElementById('tipodoc').disabled = false;
	        document.getElementById('cedula1').disabled = false;
	        document.getElementById('banco1').disabled = false;
	        document.getElementById('cuenta1').disabled = false;
	        document.getElementById('pesos1').disabled = false;
	        document.getElementById('bolivares1').disabled = false;
	        document.formul0.transf1.value= 1;
	        document.getElementById("botonenv").disabled= false;
	        document.getElementById('pesosbs1').value = "";
      
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
	
	var limite = 100000;
	var totalpesos = document.formul0.totalpesos10.value;
	totalpesos = Number(totalpesos);
	console.log(totalpesos);
	var h1Text = document.querySelector(".entry-title").textContent;
	var pesos2 = document.formul0.pesos.value;
	pesos2 = pesos2.toString().replace(/\./g,'');
	pesos2 = pesos2.replace(/\,/g,'.');
	document.formul0.pesos11.value = pesos2;
	console.log(pesos2);
	pesos2 = Number(pesos2);

	if(pesos2 <= totalpesos){
	if(pesos2 >=10000){
	 if(totalpesos >= limite){
		
		document.getElementById("botonenv").disabled= false;
	
	var total = pesos2*h1Text;

	document.formul0.bolivares.value= format_number((total).toString().replace(/\./g,','));
	document.formul0.bolivares5.value= format_number(((totalpesos*h1Text)-total).toString().replace(/\./g,','));
	document.formul0.pesos5.value= format_number((totalpesos-pesos2).toString().replace(/\./g,','));
	document.formul0.bolivares11.value = pesos2*h1Text;
	document.formul0.pesos11.value = Math.round(total);
	document.formul0.pesos8.value = Math.round((totalpesos-(bolivares1/h1Text)));
	document.formul0.bolivares8.value = Math.round((totalpesos*h1Text)-bolivares1);
	 	
	 }else{
		document.getElementById("botonenv").disabled= false;
		
	var total = pesos2*h1Text;
	

	document.formul0.bolivares.value= format_number((total).toString().replace(/\./g,','));
	document.formul0.bolivares5.value= format_number(((totalpesos*h1Text)-total).toString().replace(/\./g,','));
	document.formul0.pesos5.value= format_number((totalpesos-pesos2).toString().replace(/\./g,','));
	document.formul0.bolivares11.value = pesos2*h1Text;
	document.formul0.pesos11.value = Math.round(total);
	document.formul0.pesos8.value = Math.round((totalpesos-(bolivares1/h1Text)));
	document.formul0.bolivares8.value = Math.round((totalpesos*h1Text)-bolivares1);
		
	}}else{
		document.getElementById("botonenv").disabled= true;
		alert("El deposito minimo es de $10.000 CLP");
	}}else{
		document.getElementById("botonenv").disabled= true;
		console.log(pesos2);
		console.log(totalpesos);
		alert("La cantidad de pesos no puede ser mayor a la cantidad depositada");
		
		
	}}


function calcularBsPesos(){
	

	var limite = 100000;
	var totalpesos = document.formul0.totalpesos10.value;
	totalpesos = Number(totalpesos);
	console.log(totalpesos);
	var h1Text = document.querySelector(".entry-title").textContent;
	var bolivares1 = document.formul0.bolivares.value;
	bolivares1 = bolivares1.toString().replace(/\./g,'');
	bolivares1 = bolivares1.replace(/\,/g,'.');
	document.formul0.bolivares11.value = bolivares1;
	console.log(bolivares1);
	bolivares1 = Number(bolivares1);
	
	console.log(bolivares1/h1Text);

	if((bolivares1/h1Text)<= totalpesos){
	if((bolivares1/h1Text)>=10000){
	if(totalpesos>= limite){
		
	document.getElementById("botonenv").disabled= false;
	
	var total = bolivares1/h1Text;
	
	document.formul0.pesos.value = format_number((Math.round(total)).toString().replace(/\./g,','));
	document.formul0.pesos5.value= format_number((Math.round(totalpesos-(bolivares1/h1Text))).toString().replace(/\./g,','));
	document.formul0.bolivares5.value = format_number((Math.round((totalpesos*h1Text)-bolivares1)).toString().replace(/\./g,','));
	document.formul0.pesos11.value = Math.round(total);
	document.formul0.pesos8.value = Math.round((totalpesos-(bolivares1/h1Text)));
	document.formul0.bolivares8.value = Math.round((totalpesos*h1Text)-bolivares1);

	}else{
	
	document.getElementById("botonenv").disabled= false;
		
	var total = bolivares1/h1Text;

	document.formul0.pesos.value = format_number((Math.round(total)).toString().replace(/\./g,','));
	document.formul0.pesos5.value= format_number((Math.round(totalpesos- (bolivares1/h1Text))).toString().replace(/\./g,','));
	document.formul0.bolivares5.value = format_number((Math.round((totalpesos*h1Text)-bolivares1)).toString().replace(/\./g,','));	
	document.formul0.pesos11.value = Math.round(total);
	document.formul0.pesos8.value = Math.round((totalpesos-(bolivares1/h1Text)));
	document.formul0.bolivares8.value = Math.round((totalpesos*h1Text)-bolivares1);
	
	
}}else{
		document.getElementById("botonenv").disabled= true;
		alert("El minimo a transferir es de $10.000 CLP");
	}}else{
		
		document.getElementById("botonenv").disabled= true;
		
		alert("La cantidad de pesos no puede ser mayor a la cantidad depositada");
		
		
	}}



function format_number(number, prefix, thousand_separator, decimal_separator)
	{
		var thousand_separator = thousand_separator || '.',
			decimal_separator = decimal_separator || ',',
			regex		= new RegExp('[^' + decimal_separator + '\\d]', 'g'),
			number_string = number.replace(regex, '').toString(),
			split	  = number_string.split(decimal_separator),
			rest 	  = split[0].length % 3,
			result 	  = split[0].substr(0, rest),
			thousands = split[0].substr(rest).match(/\d{3}/g);
		
		if (thousands) {
			separator = rest ? thousand_separator : '';
			result += separator + thousands.join(thousand_separator);
		}
		result = split[1] != undefined ? result + decimal_separator + split[1] : result;
		return prefix == undefined ? result : (result ? prefix + result : '');
	};

