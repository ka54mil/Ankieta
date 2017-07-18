<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;

class TableModifyBehavior extends Behavior
{
	public function _save($data){
		$entity = $this->_table->patchEntity($this->_table->newEntity(), $data);
        if ($this->_table->save($entity)) {
            return $entity; 
        } 
        return false;
	}
}