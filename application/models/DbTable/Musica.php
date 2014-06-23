<?php

class Application_Model_DbTable_Musica extends Zend_Db_Table_Abstract{

	protected $_name = 'musica';
	protected $_primary = array('mid');

	public function gettodo(){

		$r= $this->fetchall();
		return $r->toArray();
	}

	public function guardar($data){

		if($data){

			return $this->insert($data);
		}
	}

	public function rowmusic($mid){

		if($mid==''){
			return false;
		}
		$data=$this->fetchrow("mid='$mid'");
		return $data->toArray();
	}

	public function actualizar($data=''){

		ini_set('memory_limit','512M');
		set_time_limit(0);

		if($data==''){
			return false;
		}
		$this->update($data,"mid='".$data['mid']."'");
	}

	public function eliminar($mid){

		return $this->delete("mid='$mid'");
	}
}