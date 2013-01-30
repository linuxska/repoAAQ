$(document).ready(function() {
    $('#print_ticket').click(function() {
        $('div#header').hide();
        $('div#footer').hide();
        $('div#menu').hide();
        $('div.ticket table tr th.image').show();
        $('#print_ticket').hide();
        $('.ticket').css('font-size', '10pt');
        $('.ticket td.header').css('font-size', '8pt');

        window.print();

        $('.ticket').css('font-size', '12pt');
        $('.ticket td.header').css('font-size', '12pt');
        $('div.ticket table tr th.image').hide();
        $('#print_ticket').show();
        $('div#header').show();
        $('div#footer').show();
        $('div#menu').show();
    });
});