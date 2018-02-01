function cambiarcampos3(obj){
    
    if (obj.value == "Banesco"){
        
        document.getElementById("mercantilCuentas1").style.display='none';
        document.getElementById("banescoCuentas1").style.display='block';
        
    }else{
        document.getElementById("mercantilCuentas1").style.display='block';
        document.getElementById("banescoCuentas1").style.display='none';
      
    }
}