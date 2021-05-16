function saludoArchivo() {
    alert("Saludo desde arvhivo js");
}

function parametros(nombre, asunto) {
    alert("Nombre: " + nombre + " Asunto: " + asunto);
}

function leerValores() {
    var nombre = document.getElementById('nombre');
    nombre.value = "otra cosa";
    alert(nombre.value);

}

function registarGeneroAjax(nombreGenero) {
    var parametros = {"nombreG": nombreGenero};
    $.ajax(
            {
                data: parametros,
                url: '?controlador=Genero&accion=registrarGenero',
                type: 'post',
                beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor ...");
                },
                success: function (response) {
                    $("#resultado").html(response);
                }
            }
    );
} // registarActorAjax

function agregarGenero(idGenero) {
    var parametros = {"idGenero": idGenero};
    $.ajax(
            {
                data: parametros,
                url: '?controlador=Pelicula&accion=agregarGenero',
                type: 'post',
                beforeSend: function () {
                    $("#resultado2").html("Procesando, espere por favor ...");
                },
                success: function (response) {
                    $("#resultado2").html(response);
                }
            }
    );
} // 

function agregarActor(idActor) {
    var parametros = {"idActor": idActor};
    $.ajax(
            {
                data: parametros,
                url: '?controlador=Pelicula&accion=agregarActor',
                type: 'post',
                beforeSend: function () {
                    $("#resultado1").html("Procesando, espere por favor ...");
                },
                success: function (response) {
                    $("#resultado1").html(response);
                }
            }
    );
} // 

function eliminarPelicula(idPelicula) {
    var parametros = {"idPelicula": idPelicula};
    
    $.ajax(
            {
                data: parametros,
                url: '?controlador=Pelicula&accion=eliminarPelicula',
                type: 'post',
                beforeSend: function () {
               
                },
                success: function (response) {
                    $("#fila" + idPelicula).remove();

                }
            }
    );
} // 

function actualizaPelicula(idPelicula, nombreP, duracionP, sinopsisP, idiomaP) {
    var parametros = {"idPelicula": idPelicula, "nombreP":nombreP, "duracionP":duracionP, "sinopsisP":sinopsisP, "idiomaP":idiomaP};
    $.ajax(
            {
                data: parametros,
                url: '?controlador=Pelicula&accion=actualizaPelicula',
                type: 'post',
                beforeSend: function () {
                     $("#resultado3").html("Actualizando, espere por favor ...");
                },
                success: function (response) {
                             
                    $("#resultado3").html(response);
                }
            }
    );
} // 