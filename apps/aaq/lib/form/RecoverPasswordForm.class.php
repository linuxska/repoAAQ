<?php

class RecoverPasswordForm extends sfForm {

  public function configure() {
	parent::configure();

  	$this->setWidget('username_or_email', new sfWidgetFormInputText());
        $this->widgetSchema->setLabels(array( 'username_or_email'    => 'Nombre de usuario'));

  	$this->setValidator('username_or_email', new ValidadorUsernameOrEmail(array('required' => true), array('required' => 'Requerido.')));
  	  
	$this->widgetSchema->setNameFormat('recover_password[%s]');  	  
  }
  
  /**
  *
  * Nota: La clase sfForm no proporciona un método save(). Este método no sobreescribe nada.
  */
  public function save($con = null) {
  	  if (null === $con) {
  	  	  $con = Propel::getConnection(ListaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
  	  }

	  try {
	  	  $con->beginTransaction();
	
	  	  $this->doSave($con);
	
	  	  $con->commit();
	  } catch (Exception $e) {
	  	  $con->rollBack();
	
	  	  throw $e;
	  }
	  return $this->object;
    }
    
  public function doSave($con = null) {
	if (null === $con) {
            $con = Propel::getConnection(ListaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

	if (AlumnoPeer::doCount(sfGuardUserPeer::existAlumnoCriteria($this->values['username_or_email']))) {
		$this->object = AlumnoPeer::doSelectOne(sfGuardUserPeer::existAlumnoCriteria($this->values['username_or_email']));
		
		$c = new Criteria;
		$c->add(sfGuardUserPeer::USERNAME, $this->object->getNoControl(), Criteria::EQUAL);
		
		$sf_user = sfGuardUserPeer::doSelectOne($c);
		
		$password = sfGuardUserPeer::doMakePassword($sf_user->getUsername());
		SendMail::sendPasswordForAlumnoMail($this->object, $password);
	} else {
		$this->object = ProfesorPeer::doSelectOne(sfGuardUserPeer::existProfesorCriteria($this->values['username_or_email']));
		
		$c = new Criteria;
		$c->add(sfGuardUserPeer::USERNAME, $this->object->getRfc(), Criteria::EQUAL);
		
		$sf_user = sfGuardUserPeer::doSelectOne($c);
		
		$password = sfGuardUserPeer::doMakePassword($sf_user->getUsername());
		SendMail::sendPasswordForProfesorMail($this->object, $password);
	}
	
	$sf_user->setPassword($password);
	return $sf_user->save();
  }

}
?>
