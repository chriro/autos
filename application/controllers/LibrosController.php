<?php

class LibrosController extends Zend_Controller_Action {
	public function init() {
        
    }

	public function indexAction(){
		$dblistar=new Application_Model_DbTable_Libros();
		$a=$dblistar->_getall();
		$this->view->lista=$a;
	}

	public function nuevoAction(){
		$frmLibros= new Application_Form_Libros();
		$this->view->fm=$frmLibros;
		if($this->getRequest()->isPost()){
    		$formData = $this->getRequest()->getPost();
    			if($frmLibros->isValid($formData)){
    				unset($formData['Guardar']);
    				print_r($formData);
    				$libro = new Application_Model_DbTable_Libros();
    				$libro->guardar($formData); 
    				$this->_redirect("/libros");
    			}


    	}
	}

	public function modificarAction(){
		$lid=$this->_getParam('lid');
    	$lista = new Application_Model_DbTable_Libros();
    	$dat_lib=$lista->row($lid);
    	// print_r($dat_aut);
    	$formLibros = new Application_Form_Libros();
    	if($this->getRequest()->isPost())
    	{
    		$formData = $this->getRequest()->getPost();
    		if($formLibros->isValid($formData))
    		{
    			// print_r($formData);
    			unset($formData['Guardar']);
    			$libro = new Application_Model_DbTable_Libros();
    			$libro->actualizar($formData);
    			$this->_redirect("/libros");	
    	 	}
    	}
    	$formLibros->lid->setAttrib('readonly','true');
    	$formLibros->populate($dat_lib);
    	$this->view->fm=$formLibros;
	}

	public function eliminarAction() {
        $lid=$this->_getParam('lid');
        $eliminar= new Application_Model_DbTable_Libros();
        $eliminar->eliminar($lid);
        $this->_redirect("/libros"); 

    		  
    }

}