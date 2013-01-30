<?php

/**
 * factura module helper.
 *
 * @package    aaq
 * @subpackage factura
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class facturaGeneratorHelper extends BaseFacturaGeneratorHelper
{
	public function linkToImprimirFactura($object, $params) {
        return sprintf('<a href="%s">Imprimir Factura</a>', url_for('@factura_imprimir?id=' . $object->getId()));
    }
}
