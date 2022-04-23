<?php
namespace services\ui;

 use Ajax\php\ubiquity\utils\DataFormHelper;
 use Ajax\semantic\widgets\dataform\DataForm;
 use models\Organization;
 use Ubiquity\controllers\Router;
 use Ubiquity\utils\http\URequest;

 /**
  * Class UIOrgas
  */
class UIOrgas extends \Ajax\php\ubiquity\UIService{

	public function index(){
		if(!URequest::isAjax()) {
			$this->jquery->getOnClick('._new', Router::path('orgas.add'), responseElement: '#form-orgas', parameters: ['hasLoader' =>'internal', 'listenerOn' => 'body']);
			$this->jquery->postOnClick('._update', Router::path('orgas.update', ['']), responseElement: '#form-orgas', parameters: ['attr' => 'data-ajax', 'hasLoader' => 'internal', 'listenerOn' => 'body']);
			$this->jquery->postOnClick('._delete', Router::path('orgas.delete', ['']), responseElement: '#_ajax', parameters: ['attr' => 'data-ajax', 'hasLoader' => 'internal', 'listenerOn' => 'body']);
		}
	}
	public function deleteToaster(Organization $orga){
		$this->toaster("Do you really want to delete {$orga}?",'Deletion','black','remove',[['text'=>'Ok','class'=>'green','click'=>$this->jquery->postDeferred(Router::url('orgas.dodelete',[$orga->getUuid()]),'{}','main .container',['hasLoader'=>false])],['text'=>'Cancel']]);
		echo $this->jquery->compile();
	}

	public function getForm(Organization $organization,string $path):DataForm{
		$frm=$this->semantic->dataForm('frm-orga',$organization);
		DataFormHelper::defaultFields($frm);
		$frm->addField('submit');
		$frm->addField('cancel');
		DataFormHelper::defaultUIConstraints($frm);
		$frm->fieldAsHidden('uuid');
		$frm->setCaptions(['','Name','Domain','Aliases','Send modifications','Cancel']);
		$frm->fieldAsSubmit('submit','green',$path,'main .ui.container',['ajax'=>['hasLoader'=>false]]);
		$frm->fieldAsButton('cancel','red');
		$frm->addSeparatorAfter(2);
		$frm->addDividerBefore('submit','');
		$this->jquery->hide('#main-orgas',immediatly: true);
		$this->jquery->click('#frm-orga-cancel-0',"$('#form-orgas').html('');$('#main-orgas').show();");
		return $frm;
	}

	public function toaster(string $message, $title, $class = 'info', $showIcon = false,$actions=[],$displayTime=3000){
		if(count($actions)>0){
			$displayTime=0;
		}
		$this->semantic->toast('body', \compact('message', 'title', 'class', 'showIcon','actions','displayTime'));
	}

	public function renderView(string $viewName,array $parameters=[],bool $asString=false){
		return $this->jquery->renderView($viewName,$parameters,$asString);
	}

	public function compile(){
		echo $this->jquery->compile();
	}
}
