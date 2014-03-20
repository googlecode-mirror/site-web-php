<?php

include_once 'data/CategoryDAO.php';
include_once 'data/AdminDAO.php';

class navigationControls{

	private  $cat;
	private $allCat;

	public function __construct(){
		$this->cat=new CategoryDAO();
	}

	public function getLinkCategory($name){
		$category= $this->cat->getByName($name);
		$category_id=$category['category_id'];
		//$category_id= $category->category_id;
		return "category.php?cat_id=".$category_id."";
	}

	public function getLinkCategoryWithObject($category){
		$category_id=$category['category_id'];
		//$category_id= $category->category_id;
		$ret="category.php?cat_id=".$category_id;
// 		echo  $ret;
		return $ret;
	}


	public function getAllCat(){
		return $this->allCat;
	}

	public function generateMenu(){
		$this->allCat=$this->cat->getAllFetchArray();
		$isFirst= true;
		foreach ($this->allCat as  $category) {
			$url=$this->getLinkCategoryWithObject($category);
			if($isFirst){
				$link='<li class="first"><a href="'.$url.'">'.$category['category_name'].'</a></li>';
				$isFirst=false;
			}else{
				$link=$link.'<li><a href="'.$url.'">'.$category['category_name'].'</a></li>';
			}
		}
		return $link;
	}
	
	public function isAdmin(){
		$admin = new AdminDAO();
		if($_SESSION['isAdmin']){
			return true;
		}else{
			return false;
		}
	}

}