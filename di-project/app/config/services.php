<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
Router::start();
Router::addRoute("_default", "controllers\\IndexController");
\Ubiquity\assets\AssetsManager::start($config);
