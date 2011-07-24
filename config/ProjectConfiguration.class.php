<?php
ini_set('date.timezone', 'Australia/Melbourne');
ini_set('auto_detect_line_endings',true);

require_once '/usr/share/php/symfony/lib/autoload/sfCoreAutoload.class.php';

//require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfAdminThemejRollerPlugin');
  }
}
