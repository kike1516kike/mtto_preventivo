/*document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        document.getElementById("notificacion").style.display = "none";
    }, 2000);
});*/


function ocultarNotificaciones() {
    setTimeout(function() {
        var notificaciones = document.querySelectorAll('.notificacion');
        for (var i = 0; i < notificaciones.length; i++) {
            notificaciones[i].style.display = 'none';
        }
    }, 4000);
}

document.addEventListener('DOMContentLoaded', ocultarNotificaciones);

