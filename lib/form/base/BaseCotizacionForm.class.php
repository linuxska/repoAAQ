<?php

/**
 * Cotizacion form base class.
 *
 * @method Cotizacion getObject() Returns the current form's model object
 *
 * @package    aaq
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCotizacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'cliente_cotizacion_id' => new sfWidgetFormPropelChoice(array('model' => 'ClienteCotizacion', 'add_empty' => false)),
      'fecha_cortizacion'     => new sfWidgetFormDate(),
      'tiempo_entrega'        => new sfWidgetFormInputText(),
      'forma_pago'            => new sfWidgetFormInputText(),
      'garantia'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'cliente_cotizacion_id' => new sfValidatorPropelChoice(array('model' => 'ClienteCotizacion', 'column' => 'id')),
      'fecha_cortizacion'     => new sfValidatorDate(),
      'tiempo_entrega'        => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'forma_pago'            => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'garantia'              => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cotizacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cotizacion';
  }


}
