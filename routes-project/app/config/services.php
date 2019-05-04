<?php
use Ubiquity\controllers\Router;

\Ubiquity\cache\CacheManager::startProd($config);
try{
	\Ubiquity\orm\DAO::startDatabase($config);
}catch(Exception $e){
	echo $e->getMessage();
}
Router::start();
Router::addRoute("_default", controllers\RoutesIllustration::class);
Router::get("foo", function(){
	echo 'Dynamic route with Hello world!';
});
Router::addRoute("bar", controllers\RoutesActions::class,"routeForbar");
\Ubiquity\assets\AssetsManager::start($config);
