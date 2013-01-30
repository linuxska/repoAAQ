<?php

/**
 * DetallesCotizacion form base class.
 *
 * @method DetallesCotizacion getObject() Returns the current form's model object
 *
 * @package    aaq
 * @subpackage form
 * @author     Abraham Rafael Rico Moreno
 */
abstract class BaseDetallesCotizacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'cotizacion_id'     => new sfWidgetFormPropelChoice(array('model' => 'Cotizacion', 'add_empty' => false)),
      'cantidad_servicio' => new sfWidgetFormInputText(),
      'clave'             => new sfWidgetFormInputText(),
      'descripcion'       => new sfWidgetFormTextarea(),
      'precio_servicio'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'cotizacion_id'     => new sfValidatorPropelChoice(array('model' => 'Cotizacion', 'column' => 'id')),
      'cantidad_servicio' => new sfValidatorString(array('max_length' => 8)),
      'clave'             => new sfValidatorString(array('max_length' => 64)),
      'descripcion'       => new sfValidatorString(),
      'precio_servicio'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('detalles_cotizacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetallesCotizacion';
  }


}
