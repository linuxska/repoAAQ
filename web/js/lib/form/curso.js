$(document).ready(function() {
    $('#curso_hora_inicio_hour').change(function() {
        var hora_inicio = $(this).attr('value');
        var hora_final;
        if (++hora_inicio > 23 ){
            hora_final = 00;
        } else {
            hora_final = hora_inicio++;
        }
        
        $('#curso_hora_final_hour').attr('value', hora_final);
    });
});
