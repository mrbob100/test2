<?php
/**
 * Created by PhpStorm.
 * User: vladymir
 * Date: 05.12.19
 * Time: 13:02
 */

$lux=isset($_SESSION['message']);
if(!$lux) {
    unset($_SESSION['message'] );
   session_start();
    $_SESSION['message']="";

}
$lux=isset($_SESSION['view']);


if(!$lux) {
    unset( $_SESSION['view']);
    $_SESSION['view'] ="";
}


define('ROOT', dirname(__FILE__));
define( 'URL', 'http://localhost/test2' );
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);

$router =new Router();

$router->run();


