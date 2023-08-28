
function agregarAlCarrito(menuId) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/registroCarrito.php?id=" + menuId, true);
    xhr.onreadystatechange = function() {
     
    };
    xhr.send();
  }