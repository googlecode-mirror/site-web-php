<?php

include_once 'data/CategoryDAO.php';

class navigationControls{
	
	private  $cat;
	
	public function __construct(){
		$this->cat=new CategoryDAO();
	}
	
	public function getLinkCategory($name){
		$category= $this->cat->getByName($name);
		$category_id=$category->category_id;
		return "category.php?cat_id=".$category_id."";
	}
	
	
}