<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 13:02
 */


define('ROOT', dirname(__FILE__));
define( 'URL', 'http://localhost/test2' );
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

$_SESSION['message'] ="";
$router =new Router();

$router->run();

