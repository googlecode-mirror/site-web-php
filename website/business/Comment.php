<?php

class Comment{
	
	private $comment_id;
	private $comment_user_name;
	private $comment_ip;
	private $comment_title;
	private $comment_content;
	private $news_id;
	
	public function getComment_id(){ return $this->comment_id; }
	public function setComment_id($pComment_id){ $this->comment_id=$pComment_id; }
	
	public function getUser_name(){ return $this->user_name; }
	public function setUser_name($pUser_name){ $this->user_name=$pUser_name; }
	
	public function getTitle(){ return $this->title; }
	public function setTitle($ptitle){ $this->title=$ptitle; }
	
	public function getContent(){ return $this->content; }
	public function setContent($pContent){ $this->content=$pContent; }
	
	public function getNews_id(){ return $this->news_id; }
	public function setNews_id($pNews_id){ $this->news_id=$pNews_id; }
	
	public function getIp(){ return $this->comment_ip;}
	public function setIp($pIp){ $this->comment_ip=$pIp; }
}