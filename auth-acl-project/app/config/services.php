<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
Router::start();
Router::addRoute("_default", \controllers\MainController::class);
\Ubiquity\security\acl\AclManager::startWithCacheProvider();
\Ubiquity\security\acl\AclManager::addRole('@ADMIN',['@USER']);
\Ubiquity\security\acl\AclManager::addAndAllow('@INVITED',resource:'*',permission: 'READ');
\Ubiquity\security\acl\AclManager::addAndAllow('@ADMIN',resource:'*',permission: 'WRITE');