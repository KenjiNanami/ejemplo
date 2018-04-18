function validar() {
    
    var nombre, apellidos, correo, usuario, contrasena, telefono, expresion, expresion_nombre;
    
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    contrasena = document.getElementById("contraseña").value;
    telefono = document.getElementById("telefono").value;
    
    expresion=/\w+@\w+\.+[a-z]/;
    expresion_nombre=/^[a-z][a-z]*/;
    
    if(nombre === "" || apellidos === "" || correo === "" || usuario === "" ||  contrasena === "" || telefono === ""){
       
       alert("Todos los campos son obligatorios");
        return false;// Para que se detenga
    }
    else if(nombre.length>30){
        
        
       alert("El nombre es muy largo");
        return false;// Para que se detenga
        
    }
    else if(isNaN(telefono)){
        
        alert("El telefono ingresado no es un número");
        return false;// Para que se detenga
        
    }else if(!expresion.test(correo)){
             
        alert("El correo no es valido");
        return false;// Para que se detenga
            
    }else if(!expresion_nombre.test(nombre)){
        
        alert("El nombre es incorrecto");
        return false;// Para que se detenga
        
    }
}

function SoloNumeros(evt){
    
    if(window.event){//asignamos el valor de la tecla a keynum
        
        keynum = evt.keyCode; //IE
        
    }else{
        
        keynum = evt.which; //FF
    } 
 //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6 ){
        
        return true;
        
    }else{
        
        return false;
    }
}


function soloLetras(e) {
    
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 18 , 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        
        if(key == especiales[i]) {
            
            tecla_especial = true;
            
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        
        alert('Tecla no aceptada');
        return false;
        
      }
}



