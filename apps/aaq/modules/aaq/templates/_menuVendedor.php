<?php
/*
 * Menú de acciones para el actor admin.
 *
 * El resaltado de la aplicación se logra comparando la URI solicitada con la URI
 * esperada para cada módulo. Si el nombre del módulo (que se encuentra en la URI)
 * es parte de la URI solicitada se resalta la aplicación.
 */
?>
    <li class="menu_role">
            <ul class="menu_sub">
                <li class ="menu_sub_header"><a class="alternate" href="<?php echo url_for('@homepage') ?>"></a>Facturas</li>
                <li class="app <?php echo in_array('cliente_factura', explode('/', $sf_request->getUri())) ? "selected" : "" ?>"><a href="<?php echo url_for('@cliente_factura') ?>" class="alternate">Cliente a Facturar</a></li>
                <li class="app <?php echo in_array('factura', explode('/', $sf_request->getUri())) ? "selected" : "" ?>"><a href="<?php echo url_for('@factura') ?>" class="alternate">Facturas</a></li>
                <li class="app last <?php echo in_array('detalle_factura', explode('/', $sf_request->getUri())) ? "selected" : "" ?>"><a href="<?php echo url_for('@detalle_factura') ?>" class="alternate">Detalles Facturas</a></li>
            </ul>
    </li>
    <li class="menu_role">
            <ul class="menu_sub">
                <li class ="menu_sub_header"><a class="alternate" href="<?php echo url_for('@homepage') ?>"></a>Cotización</li>
                <li class="app <?php echo in_array('cliente_cotizacion', explode('/', $sf_request->getUri())) ? "selected" : "" ?>"><a href="<?php echo url_for('@cliente_cotizacion') ?>" class="alternate">Cliente a Cotizar</a></li>
                <li class="app <?php echo in_array('cotizacion', explode('/', $sf_request->getUri())) ? "selected" : "" ?>"><a href="<?php echo url_for('@cotizacion') ?>" class="alternate">Cotizaciones</a></li>
                <li class="app <?php echo in_array('detalles_cotizacion', explode('/', $sf_request->getUri())) ? "selected" : "" ?>"><a href="<?php echo url_for('@detalles_cotizacion') ?>" class="alternate">Detalles Cotizaciones</a></li>
            </ul>
    </li>
