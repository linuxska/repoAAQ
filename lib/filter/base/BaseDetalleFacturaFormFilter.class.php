<?php

/**
 * DetalleFactura filter form base class.
 *
 * @package    aaq
 * @subpackage filter
 * @author     Abraham Rafael Rico Moreno
 */
abstract class BaseDetalleFacturaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'factura_id'           => new sfWidgetFormPropelChoice(array('model' => 'Factura', 'add_empty' => true)),
      'cantidad_servicios'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'clave_servicio'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_servicio' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio_servicio'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'factura_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Factura', 'column' => 'id')),
      'cantidad_servicios'   => new sfValidatorPass(array('required' => false)),
      'clave_servicio'       => new sfValidatorPass(array('required' => false)),
      'descripcion_servicio' => new sfValidatorPass(array('required' => false)),
      'precio_servicio'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('detalle_factura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleFactura';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'factura_id'           => 'ForeignKey',
      'cantidad_servicios'   => 'Text',
      'clave_servicio'       => 'Text',
      'descripcion_servicio' => 'Text',
      'precio_servicio'      => 'Number',
    );
  }
}
