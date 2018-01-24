function pagoOnChange(sel) {
      if (sel.value=="0"){
           $("#div0").show();
           $("#div3").hide();
		   $("#div4").hide();
           $("#div7").show();
		   $("#div6").hide();
           $("#div5").show();
		   $("#div1").hide();
		   $("#div2").hide();
           
          
   }else if(sel.value=="1"){

           $("#div0").hide();
           $("#div1").show();
		   $("#div7").hide();
           $("#div2").show();
		   $("#div6").hide();
           $("#div5").show();
		   $("#div3").hide();
		   $("#div4").hide();
 
   }else{
		   $("#div0").hide();
           $("#div3").show();
		   $("#div7").hide();
           $("#div4").show();
		   $("#div5").hide();
           $("#div6").show();
		   $("#div1").hide();
		   $("#div2").hide();

   }
}