<?php
class Regmodel extends CI_Model
{
	public function addUser($user){
		foreach(array_keys($user) as $i)
		$user[$i]=$this->dp->escape($user[$i]);
	    $values=implode(',','$user');
		$this->db->query("call registration({$values})");
		
	}
}
?>