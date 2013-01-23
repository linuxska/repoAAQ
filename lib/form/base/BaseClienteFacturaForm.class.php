<?php

/**
 * ClienteFactura form base class.
 *
 * @method ClienteFactura getObject() Returns the current form's model object
 *
 * @package    aaq
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseClienteFacturaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'nombre_cliente' => new sfWidgetFormInputText(),
      'rfc'            => new sfWidgetFormInputText(),
      'direccion'      => new sfWidgetFormInputText(),
      'telefono'       => new sfWidgetFormInputText(),
      'colonia'        => new sfWidgetFormInputText(),
      'cp'             => new sfWidgetFormInputText(),
      'ciudad'         => new sfWidgetFormInputText(),
      'estado'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'nombre_cliente' => new sfValidatorString(array('max_length' => 256)),
      'rfc'            => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'direccion'      => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'telefono'       => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'colonia'        => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'cp'             => new sfValidatorString(array('max_length' => 5, 'required' => false)),
      'ciudad'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'estado'         => new sfValidatorString(array('max_length' => 128, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cliente_factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClienteFactura';
  }


}
