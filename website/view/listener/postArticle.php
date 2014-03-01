<?php


include_once 'data/CategoryDAO.php';
include_once 'data/ArticleDAO.php';
include_once 'business/Article.php';

session_start();


$categoryDao = new CategoryDao();
$articleDao = new ArticleDao();
$categoryId = $categoryDao->getIdForName($_POST['category']);
var_dump($_POST['category']);
var_dump($categoryId);

$article = new Article();
$article->setName($_POST['title']);
$article->setContent($_POST['editor']);
$article->setCategory($categoryId);
$article->setAuthor($_SESSION['USR']);


$articleDao->addNewArticle($article);