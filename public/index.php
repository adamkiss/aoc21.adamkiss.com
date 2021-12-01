<?php

use Kirby\Cms\App;

include '../vendor/autoload.php';

$kirby = new App([
	'roots' => [
		'index'    => __DIR__,
		'base'     => $base = dirname(__DIR__, 1),
		'content'  => $base . '/content',
		'site'     => $site = $base . '/site',
		'inputs'   => $site . '/inputs',
		'days'     => $site . '/days',
		'storage'  => $storage = $base . '/storage',
		'accounts' => $storage . '/accounts',
		'cache'    => $storage . '/cache',
		'logs'     => $storage . '/logs',
		'sessions' => $storage . '/sessions',
		'db'       => $storage . '/db'
	]
]);

echo $kirby->render();
