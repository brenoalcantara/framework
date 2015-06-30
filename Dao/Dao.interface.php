<?php 

interface Dao {
	public function insert($object);
	public function update($object, $id);
	public function delete($object, $id);
	public function query($params);
}