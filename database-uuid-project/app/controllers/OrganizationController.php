<?php
namespace controllers;
 use services\dao\OrgaRepository;
 use services\transformers\UUIDTransformer;
 use Ubiquity\attributes\items\di\Autowired;
 use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Route;

 /**
  * Controller OrganizationController
  */
 #[Route('organizations',automated: true)]
class OrganizationController extends \controllers\ControllerBase{

	#[Autowired]
	public OrgaRepository $orgaRepository;

	#[Route(name: 'orgas.index')]
	public function index(){
		$this->orgaRepository->all();
		$this->loadView("OrganizationController/index.html");
	}

	#[Get(name: 'orgas.one')]
	public function one(string $uuid){
		$this->orgaRepository->byId($uuid);
		$this->loadView("OrganizationController/one.html");
	}
}
