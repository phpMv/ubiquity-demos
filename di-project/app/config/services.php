<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
Router::start();
Router::addRoute("_default", "controllers\\TestController");
\Ubiquity\assets\AssetsManager::start($config);
