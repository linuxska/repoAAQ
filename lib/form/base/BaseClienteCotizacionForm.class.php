<?php

/**
 * ClienteCotizacion form base class.
 *
 * @method ClienteCotizacion getObject() Returns the current form's model object
 *
 * @package    aaq
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseClienteCotizacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nombre_cliente' => new sfWidgetFormInputText(),
      'nombre_empresa' => new sfWidgetFormInputText(),
      'telefono'       => new sfWidgetFormInputText(),
      'direccion'      => new sfWidgetFormInputText(),
      'ciudad'         => new sfWidgetFormInputText(),
      'cp'             => new sfWidgetFormInputText(),
      'estado'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_cliente' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'nombre_empresa' => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'telefono'       => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'direccion'      => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'ciudad'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'cp'             => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'estado'         => new sfValidatorString(array('max_length' => 45, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cliente_cotizacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClienteCotizacion';
  }


}
