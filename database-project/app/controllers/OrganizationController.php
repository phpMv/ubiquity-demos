<?php
namespace controllers;
 use services\dao\OrgaRepository;
 use services\transformers\UUIDTransformer;
 use Ubiquity\attributes\items\di\Autowired;
 use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\contents\transformation\TransformersManager;
 use Ubiquity\orm\repositories\ViewRepository;
 use Ubiquity\utils\models\UArrayModels;

 /**
  * Controller OrganizationController
  */
 #[Route('organizations',automated: true)]
class OrganizationController extends \controllers\ControllerBase{

	#[Autowired]
	public OrgaRepository $orgaRepository;

	public function index(){
		$this->orgaRepository->all();
		$this->loadView("OrganizationController/index.html");
	}

	#[Get(name: 'users.one')]
	public function one(int $uuid){
		$id=UUIDTransformer::getOptimus()->decode($uuid);
		$this->orgaRepository->byId($id);
		$this->loadView("OrganizationController/one.html");
	}
}
