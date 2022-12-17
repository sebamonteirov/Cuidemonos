function agregarInvitado() {
    var a = document.getElementById("agregar_invitado");
    var invitadosActuales = document.getElementsByClassName("invitado");
    console.log(invitadosActuales.length);

    a.insertAdjacentHTML("beforebegin", 
    
        "<div class='invitado'>" +
        "<div class='label'><label> Invitado "+ (1 + invitadosActuales.length) + ":</label></div>" +
        "<input type='number' name='invitado" + invitadosActuales.length + "'>" +
        "</div>"
    );
}