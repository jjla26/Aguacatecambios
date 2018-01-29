function cambiarcampos(obj){
    
    if (obj.value == "Banesco"){
        
        document.getElementById("mercantilCuentas").style.display='none';
        document.getElementById("banescoCuentas").style.display='block';
        
    }else{
        document.getElementById("mercantilCuentas").style.display='block';
        document.getElementById("banescoCuentas").style.display='none';
      
    }
}