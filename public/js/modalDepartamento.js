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

//EDITAR DEPARTAMENTO

var EditDep = document.getElementById("myModal_EditDep");
var btnEditDep = document.getElementById("myBtn_EditDep");
var spanEditDep = document.getElementsByClassName("close_EditDep")[0];


btnEditDep.onclick = function () {
    EditDep.style.display = "block";
}
spanEditDep.onclick = function () {
    EditDep.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == EditDep) {
        EditDep.style.display = "none";
    }
}

//ELIMINAR DEPARTAMENTO

var DeleteDep = document.getElementById("myModal_DeleteDep");
var btnDeleteDep = document.getElementById("myBtn_DeleteDep");
var spanDeleteDep = document.getElementsByClassName("close_DeleteDep")[0];


btnDeleteDep.onclick = function () {
    DeleteDep.style.display = "block";
}
spanDeleteDep.onclick = function () {
    DeleteDep.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == DeleteDep) {
        DeleteDep.style.display = "none";
    }
}



