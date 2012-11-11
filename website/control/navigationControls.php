<?php

include_once 'data/CategoryDAO.php';

class navigationControls{
	
	public function getLinkCategory($name){
		return "category.php?cat_id='.$category->category_id.'";
	}
	
	
}