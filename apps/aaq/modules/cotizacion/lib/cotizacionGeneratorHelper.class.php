<?php

/**
 * cotizacion module helper.
 *
 * @package    aaq
 * @subpackage cotizacion
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cotizacionGeneratorHelper extends BaseCotizacionGeneratorHelper
{
	public function linkToImprimirCotizacion($object, $params) {
        return sprintf('<a href="%s">Imprimir Cotizacion</a>', url_for('@cotizacion_imprimir?id=' . $object->getId()));
    }
}
