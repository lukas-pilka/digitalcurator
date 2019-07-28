<?php

require __DIR__ . '/../vendor/autoload.php';

$configurator = new Nette\Configurator;

// uncomment if you want enable debug mode for IP
$configurator->setDebugMode(array("127.0.0.1", "::1", "77.87.242.172"));

// Explicit enable debugger, uncomment if you want enable debug mode for all IPs
$configurator->setDebugMode(true);

// Explicit disable debugger, uncomment if you want disable debug mode for all IPs
//$configurator->setDebugMode(false);

//$configurator->enableTracy(__DIR__ . '/../log');

$configurator->setTimeZone('Europe/Prague');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->register();

$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon');

$container = $configurator->createContainer();

return $container;
