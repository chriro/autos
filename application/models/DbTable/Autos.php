<?php

class Application_Model_DbTable_Autos extends Zend_Db_Table_Abstract{
	protected $_name = 'autos';
	protected $_primary = array('aid');

	public function gettodo(){
		$p = $this->fetchall();
		return $p->toarray();
	}

	public function guardar($dat){
		 if ($dat)
       {		
			return $this->insert($dat);
		}		

	}

	public function row($aid){

    	if($aid==''){
			return false;    		
    	}
    	$data=$this->fetchRow("aid='$aid'");
    	return $data->toArray();
    }

    public function actualizar($data='')
    {
    	if($data==''){
    		return false;
    	}
    	$this->update($data,"aid='".$data['aid']."'");

    }

    public function eliminar($aid){

        return $this->delete("aid='$aid'");

    }



}