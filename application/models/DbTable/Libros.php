<?php

class Application_Model_DbTable_Libros extends Zend_Db_Table_Abstract{
	protected $_name='libros';
	protected $_primary=array('lid');

	public function _getall(){
		$l=$this->fetchall();
		if ($l) {
			return $l->toarray();
		}
	}

	public function guardar($dat){
		 if ($dat)
       {		
			return $this->insert($dat);
		}		
	}

	public function row($lid){

    	if($lid==''){
			return false;    		
    	}
    	$data=$this->fetchRow("lid='$lid'");
    	return $data->toArray();
    }

    public function actualizar($data='')
    {
    	if($data==''){
    		return false;
    	}
    	$this->update($data,"lid='".$data['lid']."'");

    }

    public function eliminar($lid){

        return $this->delete("lid='$lid'");

    }
}