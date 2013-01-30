<?php

class SendMail {

    public static function sendPasswordForProfesorMail($persona, $password) {
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        
        $template = get_partial('ipe/MailProfesorRegister', array('persona' => $persona, 'password' => $password));
        $message = get_partial('ipe/Mail', array('template' => $template));

        $email = new Swift_Message('[Instituto Práctico Ebenezer] Registro', html_entity_decode($message, ENT_NOQUOTES, 'UTF-8'), 'text/html', 'utf-8');
        $email->addTo($persona->getEMail(), $persona);
        $email->addFrom(sfConfig::get('app_sf_guard_extra_plugin_mail_from'), sfConfig::get('app_sf_guard_extra_plugin_name_from'));

        sfContext::getInstance()->getMailer()->send($email);
    }
    
    public static function sendPasswordForAlumnoMail($persona, $password) {
        sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
        
        $template = get_partial('ipe/MailAlumnoRegister', array('persona' => $persona, 'password' => $password));
        $message = get_partial('ipe/Mail', array('template' => $template));

        $email = new Swift_Message('[Instituto Práctico Ebenezer] Registro', html_entity_decode($message, ENT_NOQUOTES, 'UTF-8'), 'text/html', 'utf-8');
        $email->addTo($persona->getEMail(), $persona);
        $email->addFrom(sfConfig::get('app_sf_guard_extra_plugin_mail_from'), sfConfig::get('app_sf_guard_extra_plugin_name_from'));

        sfContext::getInstance()->getMailer()->send($email);
    }
}
?>
