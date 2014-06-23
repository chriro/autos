<?php

class SandroController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function indexAction() {


            }

    public function listarAction() {

    		$lista = new Application_Model_DbTable_Persona();
    		$datos = $lista->_gettodo();
    		// $this->view->dato=$datos;

    		}
    public function nuevoAction() {
    		$formPersona = new Application_Form_Persona();
            $this->view->frmPersona=$formPersona;
    		if($this->getRequest()->isPost())
    		{
    			$formData = $this->getRequest()->getPost();
    			if($formPersona->isValid($formData))
    			{
    				unset($formData['Guardar']);
    				$usuario = new Application_Model_DbTable_Persona();
    				$usuario->_guardar($formData);
    				$this->_redirect("/Sandro/listar");	
    			}
    		}

   		}
    public function modificarAction() {
    		$pid=$this->_getParam('id');
        	$lista = new Application_Model_DbTable_Persona();
    		$dat_per=$lista->_row($pid);
    		// print_r($dat_per);
    		$formPersona = new Application_Form_Persona();
    		if($this->getRequest()->isPost())
    		{
    			$formData = $this->getRequest()->getPost();
    			if($formPersona->isValid($formData))
    			{
    				// print_r($formData);
    				unset($formData['Guardar']);
    				$usuario = new Application_Model_DbTable_Persona();
    				$usuario->_update($formData);
    				$this->_redirect("/Sandro/listar");	
    			}
    		}
    		$formPersona->pid->setAttrib('readonly','true');
    		$formPersona->populate($dat_per);
    		$this->view->frmPersona=$formPersona;
   		} 
    public function eliminarAction() {
            $pid=$this->_getParam('pid');
            $eliminar= new Application_Model_DbTable_Persona();
            $eliminar->_delete($pid);
            $this->_redirect("/Sandro/listar"); 

    		}  


   
}
