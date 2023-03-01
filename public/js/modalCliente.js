// Modal Para Nuevo Cliente
var modal_newCli = document.getElementById("myModal_NewCli");
var btn_newCli = document.getElementById("myBtn_NewCli");
var span_newCli = document.getElementsByClassName("close_NewCli")[0];

btn_newCli.onclick = function () {
    modal_newCli.style.display = "block";
}

span_newCli.onclick = function () {
    modal_newCli.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal_newCli) {
        modal_newCli.style.display = "none";
    }
}


// PARA MOSTRAR EL MODAL DE EDITAR CLIENTE
function modalEditarMostrarClie(id) {

    var modal_editCli = document.getElementById("myModal_EditCli-" + id);
    modal_editCli.style.display = "block";

}

//PARA OCULTAR EL MODAL DE EDITAR CLIENTE
function modalEditarOcultarClie(id) {

    var modal_editCli = document.getElementById("myModal_EditCli-" + id);
    modal_editCli.style.display = "none";

}

//PARA MOSTRAR EL MODAL DE ELIMINAR CLIENTE
function modalEliminarMostrarClie(id) {

    var modal_deleteCli = document.getElementById("myModal_DeleteCli-" + id);
    modal_deleteCli.style.display = "block";

}

//PARA OCULTAR EL MODAL DE ELIMIANR CLIENTE
function modalEliminarOcultarClie(id) {

    var modal_deleteCli = document.getElementById("myModal_DeleteCli-" + id);
    modal_deleteCli.style.display = "none";

}
