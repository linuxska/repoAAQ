$(document).ready(function() {
    $('#nivel_id_idioma').change(function() {
        var id_idioma = $(this).attr('value');
        var id_nivel = $('#nivel_id').attr('value');

        var env = location.pathname.split('/');

        /* Esto genera la URL dinamicamente dependiendo del host donde esta alojado
         * el sistema i.e. http://ci.dgtyv.net/index.php/ */
        $.ajax({
            url:location.protocol + '//' + location.host + '/' + env[1] + '/nivel/lista/' + id_idioma,
            dataType: 'json',
            data: 'id_nivel=' + id_nivel,
            success: function(data, textStatus, XMLHttpRequest) {
                $('div.sf_admin_form_field_requisito ul.checkbox_list').empty();
                jQuery.each(data, function(i, val) {
                    $('div.sf_admin_form_field_requisito ul.checkbox_list').append('<li></li>');

                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last').append('<input type="checkbox">');

                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last input').attr('value', i)
                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last input').attr('id', 'nivel_requisito_' + i);
                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last input').attr('name', 'nivel[requisito][]');

                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last').append('<label></label>');
                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last label').attr('for', 'nivel_requisito_' + i);
                    $('div.sf_admin_form_field_requisito ul.checkbox_list li:last label').text(val);
                });
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {

            }
        });
    });
    if ($('#nivel_id').attr('value') == '') {
        $('#nivel_id_idioma').trigger('change');
    }
});
