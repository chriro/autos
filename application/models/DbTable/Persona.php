<?php

class Application_Model_DbTable_Persona extends Zend_Db_Table_Abstract{
	protected $_name = 'persona';
	protected $_primary = array("pid");

	public function _gettodo(){
			$r = $this ->fetchall();
			return $r-> toarray();

	} 

	public function _guardar($data)
    {
        if ($data)
       {
        return $this->insert($data);
       } 
    }

    public function _row($pid){

    	if($pid==''){
			return false;    		
    	}
    	$data=$this->fetchRow("pid='$pid'");
    	return $data->toArray();
    }

    public function _update($data='')
    {
    	if($data==''){
    		return false;
    	}
    	$this->update($data,"pid='".$data['pid']."'");


    }

    public function _delete($pid){

            return $this->delete("pid='$pid'");

    }



}



