<?php

class Category{
	private $id;
	private $name;
	private $description;
	
	public function getId(){ return $this->id; }
	public function setId($pId){ $this->id=$pId; }
	
	public function getName(){ return $this->name; }
	public function setName($pName){ $this->name=$pName; }
	
	public function getDescription(){ return $this->description; }
	public function setDescription($pDescription){ $this->description=$pDescription; }

}