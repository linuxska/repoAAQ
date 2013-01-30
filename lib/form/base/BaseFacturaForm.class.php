<?php

/**
 * Factura form base class.
 *
 * @method Factura getObject() Returns the current form's model object
 *
 * @package    aaq
 * @subpackage form
 * @author     Abraham Rafael Rico Moreno
 */
abstract class BaseFacturaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'cliente_factura_id'   => new sfWidgetFormPropelChoice(array('model' => 'ClienteFactura', 'add_empty' => false)),
      'fecha_factura'        => new sfWidgetFormDate(),
      'lugar_expedicion'     => new sfWidgetFormInputText(),
      'cantidad_total_letra' => new sfWidgetFormInputText(),
      'pago_mensual'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'cliente_factura_id'   => new sfValidatorPropelChoice(array('model' => 'ClienteFactura', 'column' => 'id')),
      'fecha_factura'        => new sfValidatorDate(),
      'lugar_expedicion'     => new sfValidatorString(array('max_length' => 128)),
      'cantidad_total_letra' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
      'pago_mensual'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Factura';
  }


}
