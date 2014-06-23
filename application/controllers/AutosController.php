<?php

class AutosController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function listarAction() {
    	$lista = new Application_Model_DbTable_Autos();
    	$data = $lista->gettodo();
    	$this->view->dat=$data;

    }

    public function nuevoAction(){
    	$formAutos = new Application_Form_Autos();
    	$this->view->frmAutos=$formAutos;
    	if($this->getRequest()->isPost()){
    		$formData = $this->getRequest()->getPost();
    			if($formAutos->isValid($formData)){
    				unset($formData['Guardar']);
    				print_r($formData);
    				$auto = new Application_Model_DbTable_Autos();
    				$auto->guardar($formData); 
    				$this->_redirect("/autos/listar");
    			}


    	}

    }

    public function modificarAction() {
    		$aid=$this->_getParam('id');
    	    $lista = new Application_Model_DbTable_Autos();
    	    $dat_aut=$lista->row($aid);
    	    // print_r($dat_aut);
    	    $formAutos = new Application_Form_Autos();
    	   if($this->getRequest()->isPost())
    	 	{
    	 		$formData = $this->getRequest()->getPost();
    	 		if($formAutos->isValid($formData))
    	 		{
    				// print_r($formData);
    				unset($formData['Guardar']);
    				$auto = new Application_Model_DbTable_Autos();
    				$auto->actualizar($formData);
    				$this->_redirect("/autos/listar");	
    	 		}
    	 	}
    	 	$formAutos->aid->setAttrib('readonly','true');
    	 	$formAutos->populate($dat_aut);
    		$this->view->frmAutos=$formAutos;
   		} 

    public function eliminarAction() {
            $aid=$this->_getParam('aid');
            $eliminar= new Application_Model_DbTable_Autos();
            $eliminar->eliminar($aid);
            $this->_redirect("/autos/listar"); 

    		}  
    }