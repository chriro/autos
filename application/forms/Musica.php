<?php

class Application_Form_Musica extends Zend_Form{
	public function init(){
		$this->setName("frmMusica");

		$mid=new Zend_Form_Element_Text('mid');
		$mid->setAttrib("maxlength","15")->setAttrib("size","10");

		$nom=new Zend_Form_Element_Text('nom');
		$nom->setAttrib("maxlength","100")->setAttrib("size","10");

		$dur=new Zend_Form_Element_Text('dur');
		$dur->setAttrib("maxlength","100")->setAttrib("size","10");

		$submit = new Zend_Form_Element_Submit('Guardar');
		$submit->setAttrib("class","btn btn-primary");

		$this-> addElements(array($mid,$nom,$dur,$submit));
	}
}