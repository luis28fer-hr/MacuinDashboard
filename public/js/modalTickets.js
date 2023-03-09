
// PARA MOSTRAR ASIGNAR AUXILIAR A UN TICKET
function modalAsignarAuxiliar(id) {

    var modal_asigAux = document.getElementById("myModal_AsigAux-"+id);
    modal_asigAux.style.display = "block";

}

//PARA OCULTAR EL MODAL DE MOSTRAR ASIGNAR AUXILIAR A UN TICKET
function modalOcultarAsignarAuxiliar(id) {

    var modal_asigAux = document.getElementById("myModal_AsigAux-"+id);
    modal_asigAux.style.display = "none";

}


// PARA MOSTRAR LOS MENSAJES AL AUXILIAR A UN TICKET
function modalMensajeAuxiliar(id) {

    var modal_mensajeAux = document.getElementById("myModal_MensajeAux-"+id);
    modal_mensajeAux.style.display = "block";

}

//PARA OCULTAR EL MODAL DE MOSTRAR ASIGNAR AUXILIAR A UN TICKET
function modalOcultarMensajeAuxiliar(id) {

    var modal_mensajeAux = document.getElementById("myModal_MensajeAux-"+id);
    modal_mensajeAux.style.display = "none";

}


// PARA MOSTRAR LOS MENSAJES AL CLIENTE A UN TICKET
function modalMensajeCliente(id) {

    var modal_mensajeCli = document.getElementById("myModal_MensajeCli-"+id);
    modal_mensajeCli.style.display = "block";

}

//PARA OCULTAR EL MODAL DE MOSTRAR ASIGNAR CLIENTE A UN TICKET
function modalOcultarMensajeCliente(id) {

    var modal_mensajeCli = document.getElementById("myModal_MensajeCli-"+id);
    modal_mensajeCli.style.display = "none";

}


// PARA MOSTRAR FILTRO PDF
function modalPDF() {

    var modal_pdf = document.getElementById("myModal_PDF");
    modal_pdf.style.display = "block";

}

//PARA OCULTAR EL MODAL DE PDF
function modalOcultarPDF() {

    var modal_pdf = document.getElementById("myModal_PDF");
    modal_pdf.style.display = "none";

}



// PARA MOSTRAR FILTRO PDF DE PERFIL AUXILIAR
function modalPDFaux() {

    var modal_pdf_aux = document.getElementById("myModal_PDFaux");
    modal_pdf_aux.style.display = "block";

}

//PARA OCULTAR EL MODAL DE PDF PERFIL AUXILIAR
function modalOcultarPDFaux() {

    var modal_pdf_aux = document.getElementById("myModal_PDFaux");
    modal_pdf_aux.style.display = "none";

}



// PARA MOSTRAR LOS MENSAJES AL ADMINISTRADOR QUE RECIBE EL AUXILIAR
function modalMensajeAdmAuxiliar() {

    var modal_mensajeAux = document.getElementById("myModal_MensajeAux");
    modal_mensajeAux.style.display = "block";

}

//
function modalOcultarMensajeAdmAuxiliar() {

    var modal_mensajeAux = document.getElementById("myModal_MensajeAux");
    modal_mensajeAux.style.display = "none";

}

// PARA MOSTRAR LOS MENSAJES AL AUXILAR QUE ENVIA AL AUXILIAR
function modalMensajeAuxiliarClie() {

    var modal_mensajeAuxCli = document.getElementById("myModal_MensajeCli");
    modal_mensajeAuxCli.style.display = "block";

}

//
function modalOcultarMensajeAuxiliarClie() {

    var modal_mensajeAuxCli = document.getElementById("myModal_MensajeCli");
    modal_mensajeAuxCli.style.display = "none";

}
