function mostrarCarrito(){
	//Obtiene el carrito guardado en el almacenamiento local y le da el formato JSON
	let productosEnCarrito = localStorage.getItem('productsInCart');
    productosEnCarrito = JSON.parse(productosEnCarrito);

    let contenedor_carrito = document.querySelector(".carrito-cuerpo"); //contenedor donde se mostrará el carrito 
    let subtotalCarrito = localStorage.getItem('totalCost'); //subtotal del pedido almacenado en el almacenamiento local
    console.log(productosEnCarrito);

    //Si las variables anteriores se asignaron correctamente y el carrito contiene productos...
    if(productosEnCarrito && contenedor_carrito && !(Object.keys(productosEnCarrito).length === 0)){
        contenedor_carrito.innerHTML = ''; //Se vacía el contenedor padre temporalmente para actualizar el carrito.

        //Se inserta al contenedor padre un div por cada producto que muestra el producto en el carrito junto con algunas opciones.
        Object.values(productosEnCarrito).map(item => {
        contenedor_carrito.innerHTML +=`<div class="producto">
					            <div class="imgProducto" >
					                <ion-icon name="close-circle" id="${item.nombre}" onclick="removerProducto(this)"></ion-icon>
					                <img alt="Imagen del producto" src="Images/Productos/${item.imagen}">				                
					            </div>
					            <div class="nombreProducto">
					            	<span><a style='color:rgb(177,210,43);' href='pagina-producto.php?prod_id=${item.id}'>${item.nombre}</a></span>
					            </div>
					            <div class="precio">$${item.precio}.00</div>
					            <div class="cantidad">
					                <select id="${item.nombre}1" style="background-color: rgb(177,210,43)" name="cantidad_producto" onchange ="subtotalProducto(this,${item.precio},'${item.nombre}')">
					                	<option value="1">1</option>
					                	<option value="2">2</option>
					                	<option value="3">3</option>
					                	<option value="4">4</option>
					                	<option value="5">5</option>
					                	<option value="6">6</option>
					                	<option value="7">7</option>
					                	<option value="8">8</option>
					                	<option value="9">9</option>
					                	<option value="">Otro</option>
					                	<option value="${item.cantidad}" selected="selected">${item.cantidad}</option>
					                </select>
					            </div>
					            <div class="subtotal">
					                $100.00
					            </div>
			      			</div>`;
			//Se llama a la función que calcula el subtotal del producto.
			subtotalProducto(document.getElementById(item.nombre+"1"),item.precio,item.nombre);
        })


        /*carrito.innerHTML += `
        <div class="basketTotalContainer">
            <h4 class="basketTotalTitle">Basket Total</h4>
            <h4 class="basketTotal">$${subtotalCarrito}.00</h4>
        </div>
        `*/
}}


function agregarProducto(producto){ //La función recibe como parámetro un objeto JSON que contiene las especificaciones del producto y la cantidad deseada
	//Obtiene el carrito guardado en el almacenamiento local y le da el formato JSON
	let productosEnCarrito = localStorage.getItem('productsInCart');
	productosEnCarrito = JSON.parse(productosEnCarrito);
	//Si el carrito no está vacío...
	if (productosEnCarrito){
		//Si aún no hay en el carrito un producto con el mismo nombre que el que se desea agregar, se agrega el producto.
		if (productosEnCarrito[producto.nombre] == undefined){
            productosEnCarrito = {...productosEnCarrito,
					             [producto.nombre]:producto}
		//En el caso de que ya exista un producto con el mismo nombre en el carrito, solo se aumenta la cantidad en 1.
        }else {productosEnCarrito[producto.nombre].cantidad =  parseInt(productosEnCarrito[producto.nombre].cantidad) + 1;}
    }
    //En el caso de que el carrito estuviera vacío, se crea el arreglo del carrito y se le agrega el producto.
    else{
        productosEnCarrito = {
        [producto.nombre]: producto}
    }
    console.log(productosEnCarrito);
    //Finalmente, se actualiza el almacenamiento local con los cambios realizados.
	localStorage.setItem('productsInCart', JSON.stringify(productosEnCarrito));
	alert("¡Tu producto se añadió al carrito!");

}

function removerProducto(element){
	//if (confirm("Desea eliminar este producto de su carrito?")){
    element.parentNode.parentNode.parentNode.removeChild(element.parentNode.parentNode);
    console.log(element.id);
    productosEnCarrito = JSON.parse(localStorage.getItem('productsInCart'));
    productoEliminado = element.id;
    delete productosEnCarrito[productoEliminado];
    localStorage.setItem('productsInCart', JSON.stringify(productosEnCarrito));
	//}
	//location.reload();

}

function subtotalProducto(elemento,precio,nombreProducto){
	let labelsubTotal = elemento.parentNode.parentNode.getElementsByClassName("subtotal")[0];
	let valor = elemento.value;
	if (valor == ""){
		elemento.parentNode.innerHTML =`<input type='number' max='99' min='1' value='10' style='background-color: rgb(177,210,43)' onchange='subtotalProducto(this,${precio},"${nombreProducto}")'>`;
		valor = 10;
	}
	if (valor < 100){
		labelsubTotal.innerHTML = "$" + valor * precio + ".00";	
		var productosJSON = JSON.parse(localStorage.getItem('productsInCart'));
		var clavesJSON = Object.keys(productosJSON);
		console.log(nombreProducto);
		for (var i = 0; i < clavesJSON.length; i++) {
		   if(nombreProducto === clavesJSON[i]){ 
		   	console.log(valor);

		       productosJSON[nombreProducto].cantidad = valor;
		       break;}}
		localStorage.setItem("productsInCart", JSON.stringify(productosJSON));
	}
}


window.onload = mostrarCarrito();




/*<svg onclick="increase()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle-fill" fill="rgb(177,210,43)" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5.5a.5.5 0 0 0 0-1H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5z"/></svg>
					                <span class="cantidad_numero">&nbsp&nbsp&nbsp1&nbsp&nbsp&nbsp</span>
					                <svg onclick="increase(this)" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle-fill" fill="rgb(177,210,43)" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-11.5.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/></svg>*/
