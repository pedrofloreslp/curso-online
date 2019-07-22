$(document).ready(function () {

    var $tablaDato;
    var $tbodyCurso = $('#tabla-curso tbody');
    
    listarCursos();
    
    function cargando(){
        $("#tabla-curso-cargando").addClass('visible').removeClass('invisible');
        $("#tabla-curso").addClass('invisible').removeClass('visibble');
    }
    
    function cargado(){
        $("#tabla-curso-cargando").addClass('invisible').removeClass('visible');
        $("#tabla-curso").addClass('visible').removeClass('invisible');
    }
    
    function listarCursos(){
        var idUsuario = $('#sesion-id-usuario').val();
        cargando();
        
        if($tablaDato !== undefined){
            $tablaDato.destroy();
        }
        
        jqXmlHttpRequest = $.getJSON("php/controller/curso/obtenerListaPorIdUsuario.php",
            {idUsuario: idUsuario},
            function (respuestaJSON) {
                $tbodyCurso.find('tr').remove();
                $.each(respuestaJSON, function (key, value) {
                    $tbodyCurso.append(
                        '<tr>' +
                            '<td>' +
                                value.id + 
                            '</td>' + 
                            '<td>' +
                                value.nombre +
                            '</td>' +
                        '</tr>'
                    );
                });
            });

        jqXmlHttpRequest.always(function () {
            cargado();
            $tablaDato = $('#tabla-curso').DataTable();
        });
    }
    
    $("#btn-crear").click(function(){
        $('#c-nombre').val('');
        $('#modalCrear').modal('show');
    });
    
    $("#btn-modificar").click(function(){
        if($('#tabla-curso tr').hasClass('selected')){
            var id = $('#tabla-curso tr.selected').find('td:nth-of-type(1)').text();
            jqXmlHttpRequest = $.getJSON("php/controller/curso/obtenerPorId.php",
                {id: id},
                function (resultado) {
                    $('#m-nombre').val(resultado.nombre);
                });
            jqXmlHttpRequest.always(function () {
                $('#modalModificar').modal('show');
            });
        }else{
            alert('Debe seleccionar un curso.');
        }
    });
    
    $("#btn-eliminar").click(function(){
        if($('#tabla-curso tr').hasClass('selected')){
            var id = $('#tabla-curso tr.selected').find('td:nth-of-type(1)').text();
            jqXmlHttpRequest = $.getJSON("php/controller/curso/obtenerPorId.php",
                {id: id},
                function (resultado) {
                    $('#e-nombre').html(resultado.nombre);
                });
            jqXmlHttpRequest.always(function () {
                $('#modalEliminar').modal('show');
            });
        }else{
            alert('Debe seleccionar un curso.');
        }
    });
    
    $("#f-crear").click(function(){
        var idUsuario = $('#sesion-id-usuario').val();
        var nombre = $('#c-nombre').val();
        jqXmlHttpRequest = $.getJSON("php/controller/curso/insertar.php", {nombre: nombre, idUsuario: idUsuario});
        jqXmlHttpRequest.always(function () {
            $('#modalCrear').modal('hide');
            listarCursos();
        });
    });
    
    $("#f-modificar").click(function(){
        var id = $('#tabla-curso tr.selected').find('td:nth-of-type(1)').text();
        var nombre = $('#m-nombre').val();
        jqXmlHttpRequest = $.getJSON("php/controller/curso/modificar.php", 
        {id:id, nombre:nombre});
        jqXmlHttpRequest.always(function () {
            $('#modalModificar').modal('hide');
            listarCursos();
        });
    });
 
    $("#f-eliminar").click(function(){
        var id = $('#tabla-curso tr.selected').find('td:nth-of-type(1)').text();
        jqXmlHttpRequest = $.getJSON("php/controller/curso/eliminar.php", {id: id});
        jqXmlHttpRequest.always(function () {
            $('#modalEliminar').modal('hide');
            listarCursos();
        });
    });
    
    $('#tabla-curso tbody').on('click', 'tr', function(){
        if ($(this).hasClass('selected')){
            $(this).removeClass('selected');
        } else {
            $('#tabla-curso tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });
});
