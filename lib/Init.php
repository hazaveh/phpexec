<?php
/**
 * Authored by Mahdi Hazaveh.
 * Email: Mahdi@hazaveh.net
 * Date: 1/10/2017
 * Time: 6:46 PM
 */
set_time_limit(0);
ini_set('memory_limit', '-1');
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Commands.php';
use Symfony\Component\Console\Application;
$app = new Application();
$app->add(new ServerCommand());
$app->add(new IncludeCommand());
$app->run();