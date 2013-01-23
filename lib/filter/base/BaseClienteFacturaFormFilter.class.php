<?php

/**
 * ClienteFactura filter form base class.
 *
 * @package    aaq
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseClienteFacturaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_cliente' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rfc'            => new sfWidgetFormFilterInput(),
      'direccion'      => new sfWidgetFormFilterInput(),
      'telefono'       => new sfWidgetFormFilterInput(),
      'colonia'        => new sfWidgetFormFilterInput(),
      'cp'             => new sfWidgetFormFilterInput(),
      'ciudad'         => new sfWidgetFormFilterInput(),
      'estado'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_cliente' => new sfValidatorPass(array('required' => false)),
      'rfc'            => new sfValidatorPass(array('required' => false)),
      'direccion'      => new sfValidatorPass(array('required' => false)),
      'telefono'       => new sfValidatorPass(array('required' => false)),
      'colonia'        => new sfValidatorPass(array('required' => false)),
      'cp'             => new sfValidatorPass(array('required' => false)),
      'ciudad'         => new sfValidatorPass(array('required' => false)),
      'estado'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cliente_factura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClienteFactura';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nombre_cliente' => 'Text',
      'rfc'            => 'Text',
      'direccion'      => 'Text',
      'telefono'       => 'Text',
      'colonia'        => 'Text',
      'cp'             => 'Text',
      'ciudad'         => 'Text',
      'estado'         => 'Text',
    );
  }
}
