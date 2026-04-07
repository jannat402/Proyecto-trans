function getCarrito() {
    return JSON.parse(localStorage.getItem('carrito')) || [];
}

function saveCarrito(carrito) {
    localStorage.setItem('carrito', JSON.stringify(carrito));
}

function agregarAlCarrito(producto) {
    let carrito = getCarrito();

    let item = carrito.find(p => p.id === producto.id);

    if (item) {
        item.cantidad++;
    } else {
        carrito.push({
            id: producto.id,
            nombre: producto.nombre,
            precio: producto.precio,
            cantidad: 1,
            imagen: producto.imagen
        });
    }

    saveCarrito(carrito);
    alert('Producto añadido al carrito');
}