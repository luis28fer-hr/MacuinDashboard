// Obtenemos el modal en una variable
var newDep = document.getElementById("myModal_NewDep");

// Obtenemos el boton/enlace que activa el modal
var btnNewDep = document.getElementById("myBtn_NewDep");

// Obtenemos el boton/enlace que cierra el modal
var spanNewDep = document.getElementsByClassName("close_NewDep")[0];

// Cuando el boton/enlace sea precionado, se abre modal
btnNewDep.onclick = function () {
    newDep.style.display = "block";
}

// Cuando el boton/enlace sea precionado, se cierra modal
spanNewDep.onclick = function () {
    newDep.style.display = "none";
}

// Cuando se precione en cualquier lugar fuera del modal, se cierra modal
window.onclick = function (event) {
    if (event.target == newDep) {
        newDep.style.display = "none";
    }
}



// PARA MOSTRAR EL MODAL DE EDITAR DEPARTAMENTO
function modalEditarMostrarDepar(id) {

    var modal_editDep = document.getElementById("myModal_EditDep-" + id);
    modal_editDep.style.display = "block";

}

//PARA OCULTAR EL MODAL DE EDITAR AUXILIAR
function modalEditarOcultarDepar(id) {

    var modal_editDep = document.getElementById("myModal_EditDep-" + id);
    modal_editDep.style.display = "none";

}


// PARA MOSTRAR EL MODAL DE EDITAR DEPARTAMENTO
function modaEliminarMostrarDepar(id) {

    var modal_EliminarDep = document.getElementById("myModal_DeleteDep-" + id);
    modal_EliminarDep.style.display = "block";

}

//PARA OCULTAR EL MODAL DE EDITAR AUXILIAR
function modalEliminarOculatrDepar(id) {

    var modal_EliminarDep = document.getElementById("myModal_DeleteDep-" + id);
    modal_EliminarDep.style.display = "none";

}


