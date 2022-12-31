<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
Router::start();
Router::addRoute("_default", \controllers\MainController::class);
\Ubiquity\security\acl\AclManager::start();
\Ubiquity\security\acl\AclManager::initFromProviders([
	new \Ubiquity\security\acl\persistence\AclDAOProvider($config, [
		'acl'=>\models\AclElement::class,
		'role'=>\models\Role::class,
		'resource'=>\models\Resource::class,
		'permission'=>\models\Permission::class
	]),
	new \Ubiquity\security\acl\persistence\AclCacheProvider()
]);