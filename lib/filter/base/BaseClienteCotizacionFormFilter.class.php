<?php

/**
 * ClienteCotizacion filter form base class.
 *
 * @package    aaq
 * @subpackage filter
 * @author     Abraham Rafael Rico Moreno
 */
abstract class BaseClienteCotizacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_cliente' => new sfWidgetFormFilterInput(),
      'nombre_empresa' => new sfWidgetFormFilterInput(),
      'telefono'       => new sfWidgetFormFilterInput(),
      'direccion'      => new sfWidgetFormFilterInput(),
      'ciudad'         => new sfWidgetFormFilterInput(),
      'cp'             => new sfWidgetFormFilterInput(),
      'estado'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_cliente' => new sfValidatorPass(array('required' => false)),
      'nombre_empresa' => new sfValidatorPass(array('required' => false)),
      'telefono'       => new sfValidatorPass(array('required' => false)),
      'direccion'      => new sfValidatorPass(array('required' => false)),
      'ciudad'         => new sfValidatorPass(array('required' => false)),
      'cp'             => new sfValidatorPass(array('required' => false)),
      'estado'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cliente_cotizacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClienteCotizacion';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'nombre_cliente' => 'Text',
      'nombre_empresa' => 'Text',
      'telefono'       => 'Text',
      'direccion'      => 'Text',
      'ciudad'         => 'Text',
      'cp'             => 'Text',
      'estado'         => 'Text',
    );
  }
}
