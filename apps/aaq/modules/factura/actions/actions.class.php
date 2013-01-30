<?php

require_once dirname(__FILE__).'/../lib/facturaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/facturaGeneratorHelper.class.php';

/**
 * factura actions.
 *
 * @package    aaq
 * @subpackage factura
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class facturaActions extends autoFacturaActions
{
	public function executeImprimirFactura(sfWebRequest $request) {
    	//var_dump($this->getRoute()->getObject()); die();
    	try {
            $this->factura = $this->getRoute()->getObject();
        } catch (sfError404Exception $e) {
            $this->getUser()->setFlash('error', "La factura solicitado no existe.");
            $this->redirect('@factura');
        }
        
        $content = $this->getPartial('fact');

        $lista = new AAQ_03($content);

        $lista->doPDF();

        $this->setLayout(false);
        return sfView::NONE;
    }
}
