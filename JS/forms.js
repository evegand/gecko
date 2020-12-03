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

function confirmDelete(){
  return confirm("¿Deseas eliminar este registro? \n No podrás revertir esta acción");
}

function confirmModifyUser(){
  if (confirm("¡Deseas guardar los cambios?")){
    var x = document.forms['modifyForm'];
    if(x['new_contrasena'].value != x['new_contrasena2'].value){
      document.getElementsByName('new_contrasena2')[0].style.background = 'rgb(255,180,180)';
      alert("Las contraseñas no coinciden");
    }
    else
      return true;
  }
  return false;

}

function color(element){
  element.style.backgroundColor = "";
}

function showPass() {
  var x = document.getElementById("contrasena");
  var y = document.getElementById("contrasena2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}