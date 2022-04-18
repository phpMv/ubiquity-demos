<?php
namespace controllers;

use Ajax\php\ubiquity\utils\DataFormHelper;
use Ajax\semantic\html\base\constants\Direction;
use Ubiquity\attributes\items\router\Get;
use Ubiquity\attributes\items\router\Post;
use Ubiquity\attributes\items\router\Route;
use Ubiquity\cache\CacheManager;
use Ubiquity\contents\validation\ValidatorsManager;
use Ubiquity\controllers\crud\CRUDController;
use Ubiquity\controllers\crud\viewers\ModelViewer;
use Ubiquity\controllers\crud\viewers\traits\FormModelViewerTrait;
use Ubiquity\orm\DAO;
use models\User;
use Ubiquity\controllers\Router;
use Ubiquity\orm\OrmUtils;

/**
 * Controller UsersJqueryController
 *
 * @property \Ajax\php\ubiquity\JsUtils $jquery
 * @route("users")
 */
#[Route('users')]
class UsersJqueryController extends ControllerBase {

	/**
	 *
	 * {@inheritdoc}
	 * @see \Ubiquity\controllers\Controller::index()
	 * @get
	 */
	#[Get]
	public function index() {
		$frm=$this->jquery->semantic()->htmlForm('');
		$this->jquery->getOnClick('#users-bt', Router::path('display.users'), '#users', [
			'hasLoader' => 'internal'
		]);
		$this->jquery->renderDefaultView();
	}

	/**
	 *
	 * @get("all","name"=>"display.users","cache"=>true)
	 */
	#[Get('all',name: 'display.users',cache: true)]
	public function displayUsers() {
		$users = DAO::getAll(User::class);
		$this->jquery->click('#close-bt', '$("#users").html("");');
		$this->jquery->postOnClick('li[data-ajax]', Router::path('display.one.user', [
			""
		]), '{}', '#user-detail', [
			'attr' => 'data-ajax'
		]);
		$this->jquery->renderDefaultView([
			'users' => $users
		]);
	}

	/**
	 *
	 * @post("{userId}","name"=>"display.one.user","cache"=>true,"duration"=>3600)
	 */
	#[Post('{userId}',name: 'display.one.user',cache: true,duration: 3600)]
	public function displayOneUser($userId) {
		$user = DAO::getById(User::class, $userId);
		$this->jquery->hide('#users-content', '', '', true);
		$this->jquery->click('#close-user-bt', '$("#user-detail").html("");$("#users-content").show();');
		$this->jquery->renderDefaultView([
			'user' => $user
		]);
	}

	#[Get('/update/{userId}')]
	public function formUserAction(int $userId){
		$user=DAO::getById(User::class,$userId,false)??new User();
		$frm=$this->jquery->semantic()->dataForm('frm-user',$user);
		DataFormHelper::defaultFields($frm);
		$frm->addField('submit');
		DataFormHelper::defaultUIConstraints($frm);
		$frm->fieldAsHidden('id');
		$frm->setCaptions(['','Firstname','Lastname','Password','Send modifications']);
		$frm->fieldAsSubmit('submit','green fluid',Router::path('display.one.user',[$userId]),'main .ui.container',['hasLoader'=>false]);
		$frm->addSeparatorAfter(2);
		$frm->addDividerBefore('submit','');
		$this->jquery->renderDefaultView();
	}
	#[Get('expire')]
	public function expire(){
		CacheManager::setExpired(Router::path('display.users'));
		echo 'cache expired';
	}
}
