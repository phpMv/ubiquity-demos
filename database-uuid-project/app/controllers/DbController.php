<?php
namespace controllers;
 use Ramsey\Uuid\Uuid;
 use Ubiquity\orm\DAO;

 /**
  * Controller DbController
  */
class DbController extends \controllers\ControllerBase{

	public function index(){
		$db=DAO::getDatabase();
		$st=$db->query('SELECT * FROM `Organization`');
		$updateSt=$db->prepareStatement('update `Organization` set uuid= ? where uuid= ?');
		$db->beginTransaction();
		foreach ($st as $row){
			$uuid=Uuid::uuid6();
			echo "$uuid<br>";
			$updateSt->execute([$uuid,$row['uuid']]);
		}
		$db->commit();
	}
}
