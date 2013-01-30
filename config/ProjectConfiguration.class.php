<?php

require_once '/Users/linuxska/sfproject/repoIPE/lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    sfConfig::set('sf_upload_dir','uploads');
    $this->enablePlugins('sfPropelPlugin');
    $this->enablePlugins('sfTCPDFPlugin');
    $this->enablePlugins('sfGuardPlugin');
    $this->enablePlugins('sfGuardExtraPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
  }
}
