<?php

require_once dirname(__FILE__).'/../lib/cotizacionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/cotizacionGeneratorHelper.class.php';

/**
 * cotizacion actions.
 *
 * @package    aaq
 * @subpackage cotizacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class cotizacionActions extends autoCotizacionActions
{

	public function executeImprimirCotizacion(sfWebRequest $request) {
    	//var_dump($this->getRoute()->getObject()); die();
    	try {
            $this->cotizacion = $this->getRoute()->getObject();
        } catch (sfError404Exception $e) {
            $this->getUser()->setFlash('error', "La cotizacion solicitada no existe.");
            $this->redirect('@cotizacion');
        }
        
        $content = $this->getPartial('cotiz');

        $lista = new AAQ_04($content);

        $lista->doPDF();

        $this->setLayout(false);
        return sfView::NONE;
    }
}
