<?php

 require_once dirname(__FILE__).'/..\lib\vendor\symfony\lib/autoload/sfCoreAutoload.class.php';
// require_once 'E:\dev_symfony\symfony-1.4.11\lib\autoload\sfCoreAutoload.class.php';

sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('ahDoctrineEasyEmbeddedRelationsPlugin');
    $this->enablePlugins('sfDateTimePlugin');
    $this->enablePlugins('tmcTwitterBootstrapPlugin');
  }
}
