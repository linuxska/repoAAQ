$(document).ready(function() {
    $('#lista_id_alumno').blur(function() {
        var env = location.pathname.split('/');
        var no_control = $(this).attr('value');
        $('div.sf_admin_form form table tbody tr:first-child td ul.error_list').remove();

        if ($(this).attr('value').length == 10 ) {
            $.ajax({
                url:location.protocol + '//' + location.host + '/' + env[1] + '/alumno/cursos/' + no_control,
                dataType: 'json',
                success: function(data, textStatus, XMLHttpRequest) {
                    if (data.length == 0) {
                        $('div.sf_admin_form form table tbody tr:first-child td').prepend('<ul class="error_list"><li>"'+ no_control + '" no existe.</li></ul>');
                    } else {
                        $('select#lista_id_curso_anterior').empty();
                        
                        $('select#lista_id_curso_anterior').append('<option></option>');

                        jQuery.each(data, function(i, val) {
                            $('select#lista_id_curso_anterior').append('<option></option>');

                            $('select#lista_id_curso_anterior option:last-child').attr('value', i);
                            
                            $('select#lista_id_curso_anterior option:last-child').text(val);
                        });
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                }
            });
        }
        if ($(this).attr('value').length > 10 ) {
            $('div.sf_admin_form form table tbody tr:first-child td').prepend('<ul class="error_list"><li>"'+ no_control + '" es muy grande (10 caracteres unicamente).</li></ul>');
        }
        if ($(this).attr('value').length < 10 ) {
            $('div.sf_admin_form form table tbody tr:first-child td').prepend('<ul class="error_list"><li>"'+ no_control + '" es muy pequeño (10 caracteres unicamente).</li></ul>');
        }
    });
    
    $('#lista_id_curso_anterior').change(function() {
        var env = location.pathname.split('/');
        var id_curso = $(this).attr('value');
        var no_control = $('#lista_id_alumno').attr('value');
        
        $.ajax({
                url:location.protocol + '//' + location.host + '/' + env[1] + '/alumno/cursos/get/' + no_control + '/' + id_curso,
                dataType: 'json',
                success: function(data, textStatus, XMLHttpRequest) {
                    $('#lista_id').attr('value', data['Id']);
                    $('#lista_id_curso').attr('value', data['IdCurso']);
                    $('#lista_id_documento_probatorio').attr('value', data['IdDocumentoProbatorio']);
                    $('#lista_id_tipo_alumno').attr('value', data['IdTipoAlumno']);
                    $('#lista_inasistencia').attr('value', data['Inasistencia']);
                    $('#lista_motivo_cambio').attr('value', data['MotivoCambio']);
                    $('#lista_observaciones').attr('value', data['Observaciones']);
                    $('#lista_aprobado').attr('value', data['Aprobado']);
                    $('#lista_calificacion').attr('value', data['Calificacion']);
                    $('#lista_curso_anterior').attr('value', data['CursoAnterior']);
                    $('#lista_fecha_inscripcion').attr('value', data['FechaInscripcion']);
                    $('#lista_folio_voucher').attr('value', data['FolioVoucher']);
                    
                    $('#lista_beca_autorizo').attr('value', data['Autorizo']);
                    $('#lista_beca_porcentaje').attr('value', data['Porcentaje']);
                    
                    if (data['Prorroga']) {
                        console.log('in');
                        $('#lista_prorroga').attr('checked', 'checked');
                    }
                    if (data['ReciboPago']) {
                        console.log('in');
                        $('#lista_recibo_pago').attr('checked', 'checked');
                    }
                    
                    if (data['Identificacion']) {
                        console.log('in');
                        $('#lista_identificacion').attr('checked', 'checked');
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                }
            });
    });
});
