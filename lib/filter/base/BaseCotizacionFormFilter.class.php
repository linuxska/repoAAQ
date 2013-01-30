<?php

/**
 * Cotizacion filter form base class.
 *
 * @package    aaq
 * @subpackage filter
 * @author     Abraham Rafael Rico Moreno
 */
abstract class BaseCotizacionFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cliente_cotizacion_id' => new sfWidgetFormPropelChoice(array('model' => 'ClienteCotizacion', 'add_empty' => true)),
      'fecha_cotizacion'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tiempo_entrega'        => new sfWidgetFormFilterInput(),
      'forma_pago'            => new sfWidgetFormFilterInput(),
      'garantia'              => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cliente_cotizacion_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ClienteCotizacion', 'column' => 'id')),
      'fecha_cotizacion'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tiempo_entrega'        => new sfValidatorPass(array('required' => false)),
      'forma_pago'            => new sfValidatorPass(array('required' => false)),
      'garantia'              => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('cotizacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cotizacion';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'cliente_cotizacion_id' => 'ForeignKey',
      'fecha_cotizacion'      => 'Date',
      'tiempo_entrega'        => 'Text',
      'forma_pago'            => 'Text',
      'garantia'              => 'Text',
    );
  }
}
