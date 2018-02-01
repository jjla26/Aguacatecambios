function cambiarcampos2(obj){
    
    if (obj.value == "Pendiente"){
        
        document.getElementById("bancosOrg").remove();
        document.getElementById("cuentasOrg").remove();
        
    }else{
        document.getElementById("bancosOrg").add();
        document.getElementById("cuentasOrg").add();
      
    }
}