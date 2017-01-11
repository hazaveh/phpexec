<?php
/**
 * Authored by Mahdi Hazaveh.
 * Email: Mahdi@hazaveh.net
 * Date: 1/11/2017
 * Time: 10:10 AM
 */
/**
 * Well there is no magic. as you see the main source is pretty simple.
 */
require_once __DIR__ .'/../vendor/autoload.php';
// Good Boys Follow The rules
header( 'Content-type: text/html; charset=utf-8' );
// Check for Optional Inclusions.
if (file_exists(__DIR__ . "/../includes.php")) {
    require_once __DIR__ . "/../includes.php";
}
// Setting up your code.
$content = file_get_contents("php://input");
// Lets see if you have any errors or not.
eval("?>". $content);

