function buscarPorCorreoOtro(){ 
    var correo = document.getElementById("buscar").value;
    //location.href=  "../../controladores/user/buscar.php?correo="+correo
    if(correo==""){ 
      document.getElementById("informacion").innerHTML="";
    }else{ 
        if(window.XMLHttpRequest) { 
            xmlhttp= new XMLHttpRequest(); 
        }else{ 
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        } 
       xmlhttp.onreadystatechange= function(){ 
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("informacion").innerHTML=this.responseText;
            }
        }; 
        xmlhttp.open("GET","../../controladores/user/buscar2.php?correo="+correo,true); 
        xmlhttp.send();
    } 
    return false;
}