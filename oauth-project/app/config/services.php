<?php
use Ubiquity\controllers\Router;
use Ubiquity\security\csrf\CsrfManager;

\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
Router::start();
CsrfManager::start();
