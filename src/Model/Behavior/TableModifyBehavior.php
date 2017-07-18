<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;

class TableModifyBehavior extends Behavior
{
	public function _add($data){
		return $this->_save($this->_table->newEntity(), $data);
	}

	public function _delete($id){

		$entity = $this->_table->get($id);
        return $this->_table->delete($entity);
	}

	public function _save($entity, $data){
		$entity = $this->_table->patchEntity($entity, $data);
        if ($this->_table->save($entity)) {
            return $entity; 
        } 
        debug($entity);
        return false;
	}
}