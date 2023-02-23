// Modal Para Nuevo Auxiliar
var modal_newAux = document.getElementById("myModal_NewAux");
var btn_newAux = document.getElementById("myBtn_NewAux");
var span_newAux = document.getElementsByClassName("close_NewAux")[0];

btn_newAux.onclick = function () {
    modal_newAux.style.display = "block";
}

span_newAux.onclick = function () {
    modal_newAux.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal_newAux) {
        modal_newAux.style.display = "none";
    }
}


// PARA MOSTRAR EL MODAL DE EDITAR AUXILIAR
function modalEditarMostrar(id) {

    var modal_editAux = document.getElementById("myModal_EditAux-" + id);
    modal_editAux.style.display = "block";

}

//PARA OCULTAR EL MODAL DE EDITAR AUXILIAR
function modalEditarOcultar(id) {

    var modal_editAux = document.getElementById("myModal_EditAux-" + id);
    modal_editAux.style.display = "none";

}

//PARA MOSTRAR EL MODAL DE ELIMINAR AUXILIAR
function modalEliminarMostrar(id) {

    var modal_deleteAux = document.getElementById("myModal_DeleteAux-" + id);
    modal_deleteAux.style.display = "block";

}

//PARA OCULTAR EL MODAL DE ELIMIANR AUXILIAR
function modalEliminarOcultar(id) {

    var modal_deleteAux = document.getElementById("myModal_DeleteAux-" + id);
    modal_deleteAux.style.display = "none";

}
