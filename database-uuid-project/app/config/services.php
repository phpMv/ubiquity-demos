<?php

use Ramsey\Uuid\Uuid;
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
Router::start();
Router::addRoute("_default", "controllers\\MainController");
\Ubiquity\events\EventsManager::addListener(\Ubiquity\events\DAOEvents::BEFORE_INSERT, function($instance){
	$instance->setUuid(Uuid::uuid6());
});
