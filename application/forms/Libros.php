<?php
class Application_Form_Libros extends Zend_Form{
	public function init(){
		$this->setName("frmLibros");

		$lid=new Zend_Form_Element_Text('lid');
		$lid->setAttrib("maxlength","10")->setAttrib("size","10");

		$nombre=new Zend_Form_Element_Text('nombre');
		$nombre->setAttrib("maxlength","20")->setAttrib("size","10");

		$autor=new Zend_Form_Element_Text('autor');
		$autor->setAttrib("maxlength","10")->setAttrib("size","10");

		$genero=new Zend_Form_Element_Text('genero');
		$genero->setAttrib("maxlength","10")->setAttrib("size","10");

		$submit = new Zend_Form_Element_Submit('Guardar');
		$submit->setAttrib("class","btn btn-primary");

		$this-> addElements(array($lid,$nombre,$autor,$genero,$submit));
	}
}