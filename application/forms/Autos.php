<?php

class Application_Form_Autos extends Zend_Form{
	public function init(){
		$this->setName("frmAutos");

		$aid=new Zend_Form_Element_Text('aid');
		$aid->setAttrib("maxlength","15")->setAttrib("size","10");

		$nombre=new Zend_Form_Element_Text('nombre');
		$nombre->setAttrib("maxlength","100")->setAttrib("size","10");

		$descripcion=new Zend_Form_Element_Text('descripcion');
		$descripcion->setAttrib("maxlength","100")->setAttrib("size","10");

		$color=new Zend_Form_Element_Text('color');
		$color->setAttrib("maxlength","100")->setAttrib("size","10");

		$pais_proc=new Zend_Form_Element_Text('pais_proc');
		$pais_proc->setAttrib("maxlength","20")->setAttrib("size","10");

		$submit = new Zend_Form_Element_Submit('Guardar');
		$submit->setAttrib("class","btn btn-primary");

		$this-> addElements(array($aid,$nombre,$descripcion,$color,$pais_proc,$submit));

	}
}