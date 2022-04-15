<?php
namespace controllers;

use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\cache\CacheManager;
use Ubiquity\controllers\Startup;
use Ubiquity\db\Database;
use Ubiquity\db\providers\pdo\PDOWrapper;
use Ubiquity\db\reverse\DbGenerator;
use Ubiquity\exceptions\DAOException;
use Ubiquity\exceptions\DBException;
use Ubiquity\orm\DAO;
use Ubiquity\orm\reverse\DatabaseReversor;
use Ubiquity\utils\http\URequest;
use controllers\traits\UITrait;

/**
 * Controller MainController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 */
class MainController extends ControllerBase {
	use UITrait;

	/**
	 *
	 * @route("_default")
	 */
	#[Route('_default')]
	public function index() {
		try {
			$config = Startup::$config;
			DAO::startDatabase($config);
		} catch (DAOException $e) {
			$input = $this->jquery->semantic()->htmlInput('dbName', 'text', $config['database']['dbName'] ?? '');
			$bt = $input->addAction('Create database');
			$bt->postOnClick('/createDb', "{db: $('#dbName').val() }", '#response', [
				'jsCallback' => '$("#db-form").html("");'
			]);
			return $this->jquery->renderView("MainController/index.html");
		}
		$this->redirectToRoute('oauth-index', [], false, false);
	}

	/**
	 *
	 * @post("createDb")
	 */
	#[Post('createDb')]
	public function createDb() {
		$dbName = URequest::post('db', 'oauth-test');
		$config = Startup::$config;
		if ($config['database']['dbName'] !== $dbName) {
			$config['database']['dbName'] = $dbName;
			Startup::saveConfig($config);
		}
		CacheManager::start($config);
		$generator = new DatabaseReversor(new DbGenerator());
		$generator->createDatabase($dbName);
		$db = new Database(PDOWrapper::class, 'mysql', '');
		try {
			$db->connect();
			$db->beginTransaction();
			$db->execute($generator->__toString());
			$db->commit();
			$this->showMessage('Database creation', "Db <b>$dbName</b> created!", 'check circle', 'success');
		} catch (DBException $e) {
			$this->showMessage('Database creation', $e->getMessage(), 'warning circle', 'warning');
		}
		$this->jquery->renderView("MainController/createDb.html");
	}
}
