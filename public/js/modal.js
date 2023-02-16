// Obtenemos el modal en una variable
var modal = document.getElementById("myModal");

// Obtenemos el boton/enlace que activa el modal
var btn = document.getElementById("myBtn");

// Obtenemos el boton/enlace que cierra el modal
var span = document.getElementsByClassName("close")[0];

// Cuando el boton/enlace sea precionado, se abre modal
btn.onclick = function() {
  modal.style.display = "block";
}

// Cuando el boton/enlace sea precionado, se cierra modal
span.onclick = function() {
  modal.style.display = "none";
}

// Cuando se precione en cualquier lugar fuera del modal, se cierra modal
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


var modal_logout = document.getElementById("myModal_logout");
var btn_logout = document.getElementById("myBtn_logout");
var span_logout = document.getElementsByClassName("close_logout")[0];

btn_logout.onclick = function() {
    modal_logout.style.display = "block";
  }

  // Cuando el boton/enlace sea precionado, se cierra modal
  span_logout.onclick = function() {
    modal_logout.style.display = "none";
  }

  // Cuando se precione en cualquier lugar fuera del modal, se cierra modal
  window.onclick = function(event) {
    if (event.target == modal_logout) {
      modal_logout.style.display = "none";
    }
  }


  // Modal Para Nuevo Auxiliar
var modal_newAux = document.getElementById("myModal_NewAux");
var btn_newAux = document.getElementById("myBtn_NewAux");
var span_newAux = document.getElementsByClassName("close_NewAux")[0];
 
    btn_newAux.onclick = function() {
      modal_newAux.style.display = "block";
    }
  
    // Cuando el boton/enlace sea precionado, se cierra modal
    span_newAux.onclick = function() {
      modal_newAux.style.display = "none";
    }
  
    // Cuando se precione en cualquier lugar fuera del modal, se cierra modal
    window.onclick = function(event) {
      if (event.target == modal_newAux) {
        modal_newAux.style.display = "none";
      }
    }  