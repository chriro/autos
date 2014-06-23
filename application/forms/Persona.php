<?php

class Application_Form_Persona extends Zend_Form{
	public function init(){
		$this->setName("frmPersona");

		$pid=new Zend_Form_Element_Text('pid');
		$pid->setAttrib("maxlength","15")->setAttrib("size","10");

		$apat=new Zend_Form_Element_Text('apat');
		$apat->setAttrib("maxlength","100")->setAttrib("size","10");

		$amat=new Zend_Form_Element_Text('amat');
		$amat->setAttrib("maxlength","100")->setAttrib("size","10");

		$nom=new Zend_Form_Element_Text('nom');
		$nom->setAttrib("maxlength","100")->setAttrib("size","10");

		$tel=new Zend_Form_Element_Text('tel');
		$tel->setAttrib("maxlength","20")->setAttrib("size","10");

		$dir=new Zend_Form_Element_Text('dir');
		$dir->setAttrib("maxlength","200")->setAttrib("size","10");

		$submit = new Zend_Form_Element_Submit('Guardar');
		$submit->setAttrib("class","btn btn-primary");

		$this-> addElements(array($pid,$apat,$amat,$nom,$tel,$dir,$submit));

	}
}