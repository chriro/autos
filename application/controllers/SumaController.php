<?php
class SumaController extends Zend_Controller_Action{
	public function init (){

	}

	public function sumarAction(){
		$a=12;
		$b=11;
		$c=$a+$b;
		$this->view->suma=$c;
	}
}
?>