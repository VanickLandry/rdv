<?php






// this check prevents access to debug front controllers that are deployed by accident to production servers.
// feel free to remove this, extend it or make something more sophisticated.

if (!in_array(@$_SERVER['REMOTE_ADDR'], array('192.168.2.3', '::1', '41.202.194.42')))
{
    echo $_SERVER['REMOTE_ADDR'];
    die('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}
////ini_set('display_errors', 1);
////ini_set('display_startup_errors', 1);
////error_reporting(E_ALL);
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
