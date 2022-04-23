<?php
namespace controllers;
 use Ajax\php\ubiquity\JsUtils;
 use Ajax\php\ubiquity\utils\DataFormHelper;
 use Ajax\semantic\widgets\dataform\DataForm;
 use models\Organization;
 use services\dao\OrgaRepository;
 use services\transformers\UUIDTransformer;
 use services\ui\UIOrgas;
 use Ubiquity\attributes\items\di\Autowired;
 use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Post;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\Router;
 use Ubiquity\orm\DAO;
 use Ubiquity\utils\http\URequest;

 /**
  * Controller OrganizationController
  */
 #[Route('organizations',automated: true)]
class OrganizationController extends \controllers\ControllerBase{

	#[Autowired]
	public OrgaRepository $orgaRepository;

	private UIOrgas $ui;

	public function initialize() {
		parent::initialize();
		$this->ui=new UIOrgas($this);
	}

	#[Route(name: 'orgas.index')]
	public function index(){
		$this->orgaRepository->all();
		$this->ui->index();
		$this->ui->renderView("OrganizationController/index.html");
	}

	#[Get(name: 'orgas.one')]
	public function one(string $uuid){
		$orga=$this->orgaRepository->byId($uuid);
		if($orga) {
			$this->loadView("OrganizationController/one.html");
		}else{
			$this->ui->toaster('This organization does not exist!','Not found','warning','warning circle');
			$this->index();
		}
	}

	#[Get('/add/',name: 'orgas.add')]
	public function formOrgaNewAction(){
		$orga=new Organization();
		$this->ui->getForm($orga,Router::path('orgas.doadd'));
		$this->ui->renderView('/OrganizationController/form.html');
	}

	 #[Post('/submit/add',name: 'orgas.doadd')]
 	public function submit(){
		$orga=new Organization();
		URequest::setValuesToObject($orga);
		if(DAO::insert($orga)){
			$this->ui->toaster('New organization added in database','Organization insertion','success','check square');
		}else{
			$this->ui->toaster('An error occurred!','Organization insertion','error','warning circle');
		}
		$this->index();
	 }

	 #[Post('/update/{orgaId}',name: 'orgas.update')]
	 public function formOrgaUpdateAction(string $orgaId){
		 $orga=DAO::getById(Organization::class,$orgaId,false)??new Organization();
		 $this->ui->getForm($orga,Router::path('orgas.doupdate',[$orgaId]));
		 $this->ui->renderView('/OrganizationController/form.html');

	 }

	 #[Post('/submit/update/{idOrga}',name: 'orgas.doupdate')]
	 public function submitUpdate(string $idOrga){
		 $orga=$this->orgaRepository->byId($idOrga,false);
		 URequest::setValuesToObject($orga);
		 if(DAO::update($orga)){
			 $this->ui->toaster("$orga updated!",'Organization update','success','check square');
		 }else{
			 $this->ui->toaster('An error occurred!','Organization update','error','warning circle');
		 }
		 $this->index();
	 }

	#[Post('/delete/{orgaId}',name: 'orgas.delete')]
	public function delete(string $orgaId){
		$orga=$this->orgaRepository->byId($orgaId);
		$this->ui->deleteToaster($orga);
	}

	 #[Post('/doDelete/{orgaId}',name: 'orgas.dodelete')]
	 public function doDelete(string $orgaId){
		 $orga=$this->orgaRepository->byId($orgaId);
		 if($this->orgaRepository->remove($orga)){
		 	$this->ui->toaster("The organization $orga has been deleted.",'Deletion','success','remove');
		 }
		 $this->index();
	 }

}
