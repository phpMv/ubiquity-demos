<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
try {
	\Ubiquity\orm\DAO::startDatabase($config);
} catch (Exception $e) {
	echo $e->getMessage();
}
Router::startAll();
Router::addRoute("_default", "controllers\\IndexController");
\Ubiquity\assets\AssetsManager::start($config);
