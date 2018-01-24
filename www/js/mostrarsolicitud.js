function pagoOnChange1(sel) {
      if (sel.value=="0") {
           
           $("#campos1").show();
           $("#campos2").show();
           $("#campos3").show();
           $("#campos4").show();
           $("#cantidadp").hide();
           $("#nombresolp").hide();
           $("#emailsolp").hide();
           $("#cedulasolp").hide();
           $("#cantidadb").hide();
           $("#nombresolb").hide();
           $("#emailsolb").hide();
           $("#cedulasolb").hide();
           $("#enviarp").hide();
           $("#enviarb").hide();
           
      }else if(sel.value=="Pesos Chilenos") {
          
           $("#campos1").hide();
           $("#campos2").hide();
           $("#campos3").hide();
           $("#campos4").hide();
           $("#cantidadp").show();
           $("#nombresolp").show();
           $("#emailsolp").show();
           $("#cedulasolp").show();
           $("#cantidadb").hide();
           $("#nombresolb").hide();
           $("#emailsolb").hide();
           $("#cedulasolb").hide();
           $("#enviarp").show();
           $("#enviarb").hide();
           
  
        
   }else{
       
           $("#campos1").hide();
           $("#campos2").hide();
           $("#campos3").hide();
           $("#campos4").hide();
           $("#cantidadp").hide();
           $("#nombresolp").hide();
           $("#emailsolp").hide();
           $("#cedulasolp").hide();
           $("#cantidadb").show();
           $("#nombresolb").show();
           $("#emailsolb").show();
           $("#cedulasolb").show();
           $("#enviarp").hide();
           $("#enviarb").show();
           
  
   }
    
}