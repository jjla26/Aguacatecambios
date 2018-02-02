function cambiarcampos2(obj){
    
    if (obj.value == "Pendiente"){
        
        document.getElementById("bancosOrg").style.display='none';
        document.getElementById("cuentasOrg").style.display='none';
        
    }else{
        document.getElementById("bancosOrg").style.display='block';
        document.getElementById("cuentasOrg").style.display='block';
      
    }
}