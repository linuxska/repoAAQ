<?php

/**
 * DetalleFactura form base class.
 *
 * @method DetalleFactura getObject() Returns the current form's model object
 *
 * @package    aaq
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseDetalleFacturaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'factura_id'           => new sfWidgetFormPropelChoice(array('model' => 'Factura', 'add_empty' => false)),
      'cantidad_servicios'   => new sfWidgetFormInputText(),
      'clave_servicio'       => new sfWidgetFormInputText(),
      'descripcion_servicio' => new sfWidgetFormTextarea(),
      'precio_servicio'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'factura_id'           => new sfValidatorPropelChoice(array('model' => 'Factura', 'column' => 'id')),
      'cantidad_servicios'   => new sfValidatorString(array('max_length' => 8)),
      'clave_servicio'       => new sfValidatorString(array('max_length' => 16)),
      'descripcion_servicio' => new sfValidatorString(),
      'precio_servicio'      => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('detalle_factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleFactura';
  }


}
