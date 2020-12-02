function validateRegisterForm() {
  var x = document.forms["registerForm"];
  if (x['contrasena_registro'].value != x['contrasena_conf'].value) {
    alert("Las constraseñas no coinciden");
    document.getElementById("contrasena2").style.backgroundColor = 'rgb(255,180,180)';
    //document.getElementById("contenido").innerHTML += "<label style='color:red'>Las contraseñas no coindicen</label>";
    return false;
  }
  else if (x['nombres_registro'].value.trim() == "" || x['nombres_registro'].value == null ||  x['nombres_registro'].value.length < 3){
  	alert("El nombre es demasiado corto (mínimo 3 caractéres)");
    document.getElementById("nombre").style.backgroundColor = 'rgb(255,180,180)';
    return false;
  }
  else if (x['usuario_registro'].value.trim() == "" || x['usuario_registro'].value == null ||  x['usuario_registro'].value.length < 4){
  	alert("El usuario es demasiado corto (mínimo 4 caractéres)");
    document.getElementById("username").style.backgroundColor = 'rgb(255,180,180)';
    return false;
  }
  else if (x['contrasena_registro'].value.trim() == "" || x['contrasena_registro'].value == null ||  x['contrasena_registro'].value.length < 4){
  	alert("La contraseña es demasiado corta (mínimo 4 caractéres)");
    document.getElementById("contrasena").style.backgroundColor = 'rgb(255,180,180)';
    return false;
  }
  else{
  	return true;
  }
}