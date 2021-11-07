<?php
namespace controllers;
use Ajax\php\ubiquity\JsUtils;
use Ajax\semantic\html\elements\HtmlList;

use Ubiquity\attributes\items\router\Route;
use Ubiquity\utils\http\UFilesUpload;


/**
  * Controller NormalController
  * @property JsUtils $jquery
  */
class FileUploadTester extends \controllers\ControllerBase{

	#[Route('tester')]
	public function index(){
		$div=$this->jquery->semantic()->htmlSegment('div');
		$div->setStyle('width:100%;min-height:300px');
		$div->addDimmer(["on"=>"hover","opacity"=>0.5])->asIcon('download','Uploadez vos fichiers ici');
		$progress=$div->asFileDropZone( '#div','/upload','Téléchargement de fichiers');
		$this->jquery->renderView("FileUploadTester/index.html");
	}

	#[Route('upload')]
	public function upload() {
		$upload = new UFilesUpload();
		$upload->upload('upload');
		if ($upload->hasErrors()) {
			$toast=$this->jquery->semantic()->toast('body');
			$toast->setTitle('File upload');
			$toast->setMessage((new HtmlList('lst',$upload->getErrorMessages()))->compile());
			$toast->setShowIcon('warning circle');
			$toast->setClass('error');
		}
		if ($upload->isSuccess()) {
			$msg=$this->jquery->semantic()->htmlMessage('msg','','success');
			$msg->addHeader('File upload');
			$msg->setIcon('upload');
			$msg->addList($upload->getMessages());
			echo $msg;
		}
		echo $this->jquery->compile();
	}

}
