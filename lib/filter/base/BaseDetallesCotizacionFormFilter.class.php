<?php

/**
 * DetallesCotizacion filter form base class.
 *
 * @package    aaq
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseDetallesCotizacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cotizacion_id'     => new sfWidgetFormPropelChoice(array('model' => 'Cotizacion', 'add_empty' => true)),
      'cantidad_servicio' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clave'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_servicio'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cotizacion_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cotizacion', 'column' => 'id')),
      'cantidad_servicio' => new sfValidatorPass(array('required' => false)),
      'clave'             => new sfValidatorPass(array('required' => false)),
      'descripcion'       => new sfValidatorPass(array('required' => false)),
      'precio_servicio'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('detalles_cotizacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetallesCotizacion';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Text',
      'cotizacion_id'     => 'ForeignKey',
      'cantidad_servicio' => 'Text',
      'clave'             => 'Text',
      'descripcion'       => 'Text',
      'precio_servicio'   => 'Number',
    );
  }
}
