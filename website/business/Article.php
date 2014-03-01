<?php

class Article{
	private $id;
	private $name;
	private $category;
	private $content;
	private $author;
	private $date;
	private $tags;
	
	public function getId(){ return $this->id; }
	public function setId($pId){ $this->id=$pId; }
	
	public function getName(){ return $this->name; }
	public function setName($pName){ $this->name=$pName; }
	
	public function getCategory(){ return $this->category; }
	public function setCategory($pCategory){ $this->category=$pCategory; }
	
	public function getContent(){ return $this->content; }
	public function setContent($pContent){ $this->content=$pContent; }
	
	public function getAuthor(){ return $this->author; }
	public function setAuthor($pAuthor){ $this->author=$pAuthor; }
	
	public function getDate(){ return $this->date; }
	public function setDate($pDate){ $this->date=$pDate; }
	
	public function getTags(){ return $this->tags; }
	public function setTags($pTags){ $this->tags=$pTags; }
	
	public function toString(){
		return 'name ->'.$this->name.' || content -> '.$this->content;
	}
	
}
