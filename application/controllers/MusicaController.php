<?php
class MusicaController extends Zend_Controller_Action{

	public function init(){

	}

	public function indexAction() {

    }

	public function listarAction(){

		$lista= new Application_Model_DbTable_Musica();
		$datos=$lista->gettodo();
		$this->view->dato=$datos;
	}

	public function nuevoAction(){

		$formMusica=new Application_Form_Musica();
		$this->view->frmMusica=$formMusica;
		if($this->getrequest()->isPost()){

			$formdata = $this->getrequest()->getPost();
			if($formMusica->isValid($formdata)){

				unset($formdata['Guardar']);
				$music = new Application_Model_DbTable_Musica();
				$music->guardar($formdata);
				$this->_redirect("/musica/listar");
			}
		}
	}

	public function modificarAction(){

		$mid=$this->_getParam('mid');
		$lista= new Application_Model_DbTable_Musica();
		$dat_mus=$lista->rowmusic($mid);
		$formMusica=new Application_Form_Musica();
		if($this->getrequest()->isPost()){

			$formdata = $this->getrequest()->getPost();
			if($formMusica->isValid($formdata)){

				unset($formdata['Guardar']);
				$music = new Application_Model_DbTable_Musica();
				$music -> actualizar($formdata);
				$this -> _redirect("/musica/listar");
			}
		}

		$formMusica->mid->setAttrib('readonly','true');
		$formMusica->populate($dat_mus);
		$this->view->frmMusica=$formMusica;
	}

	public function eliminarAction(){

		$mid=$this->_getParam('mid');
		$eliminar= new Application_Model_DbTable_Musica();
		$eliminar->eliminar('mid');
		$this->_redirect("/musica/listar");
	}
}