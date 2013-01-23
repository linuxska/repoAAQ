<?php

/**
 * Factura filter form base class.
 *
 * @package    aaq
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFacturaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cliente_factura_id'   => new sfWidgetFormPropelChoice(array('model' => 'ClienteFactura', 'add_empty' => true)),
      'fecha_factura'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'lugar_expedicion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_total_letra' => new sfWidgetFormFilterInput(),
      'pago_mensual'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cliente_factura_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ClienteFactura', 'column' => 'id')),
      'fecha_factura'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'lugar_expedicion'     => new sfValidatorPass(array('required' => false)),
      'cantidad_total_letra' => new sfValidatorPass(array('required' => false)),
      'pago_mensual'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('factura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Factura';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'cliente_factura_id'   => 'ForeignKey',
      'fecha_factura'        => 'Date',
      'lugar_expedicion'     => 'Text',
      'cantidad_total_letra' => 'Text',
      'pago_mensual'         => 'Number',
    );
  }
}
