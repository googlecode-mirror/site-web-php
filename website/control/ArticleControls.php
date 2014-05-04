<?php


include_once  "data/ArticleDAO.php";
include_once "data/CommentDAO.php";
include_once "data/CategoryDAO.php";

class ArticleControls{
	
	private $aArticleDAO;
	private $aCommentDAO;
	private $aCategoryDAO;
	private $aArticle;
	private $aListArticle;
	private $aListComment;
	private $aListCategory;
	
	public function __construct(){
		$this->aArticleDAO=new ArticleDAO();
		$this->aCommentDAO=new CommentDAO();
		$this->aCategoryDAO=new CategoryDAO();
	}
	
	public function getCategories(){
		return $aListCategory=$this->aCategoryDAO->getAllFetchArray();
		
	}
	
	public function getAllUncheckedComments(){
		return $this->aCommentDAO->getAllUnvalid();
	}
	
	public function printUnvalidComment($allUncheckedComment){
		$articleId="";
		if($allUncheckedComment != null){
			echo "<ul>";
			foreach ($allUncheckedComment as $comment){
				$article;
				if($articleId != $comment->news_id){
					$article=$this->getArticleById($comment->news_id);
					echo "<li><h2>$article->News_title<h2></li>";
				}
				echo "<li><b>".$comment->comment_title." by ".$comment->comment_user_name."</b><br>";
				echo  $comment->comment_content."<br>";
				echo ' validate? <input type="checkbox" name="valid_'.$comment->comment_id.'">';
			}
			echo '</ul>
				<input class="button" type="submit" tabindex="1" accesskey="enter" value="Submit" name="validComments">';
		}else{
			echo "Every comments is now valid !";
		}
	}
	
	public function getArticle(){
		return $this->aArticle;
	}
	
	public function print_Article($var){
		return $this->aArticleDAO->getByCategory($var);
	}
	
	public function getArticlesMatchingSearch($search){
		$htmlSearch =htmlentities($search);
		return $this->aArticleDAO->getBySearch($htmlSearch);
	}
	
	public function getArticleById($id) {
		return $this->aArticleDAO->getById($id);
	}
	
	public function getListComment($new){
		return $this->aCommentDAO->getByNews($new);
	}
	
	public function addComment($comment){
		$htmlComment =htmlentities($comment);
		$insert=$this->aCommentDAO->addNewComment( $comment);
		if($insert == 1){
			return true;
		}else return false;
	}
	
	
	public function addMail($article){
		$htmlemail =htmlentities($article);
		$insert=$this->aArticleDAO->addNewArticle($htmlemail);
		if($insert == 1){
			return true;
		}else return false;	
	}
	
	public function getFiveLast(){
		return $this->aArticleDAO->getFiveLast();
	}
	
	public function printComments($id){
		$listComment=$this->getListComment($id);
		if($listComment != false){
			foreach($listComment as $comment){
				echo "<div class='comment'><h4>".$comment->comment_user_name."</h4>"
						.$comment->comment_content."</div>";
			}
		}else{
			echo "il n'y a pas de commentaires actuellement";
		}
	}

	public function getFavorites(){
		return $this->aArticleDAO->getFavorites();
	}
	
	public function get_ip()
	{
	    if ( isset ( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )
	    {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    elseif ( isset ( $_SERVER['HTTP_CLIENT_IP'] ) )
	    {
	        $ip  = $_SERVER['HTTP_CLIENT_IP'];
	    }
	    else
	    {
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}
	
	public function  dateReducted($pDate){
		preg_match('/(?P<date>[^.]+) (?P<hour>[^.]+)/', $pDate, $regs);
		$date=$regs['date'];
		preg_match('/(?P<year>[^.]+)-(?P<month>[^.]+)-(?P<day>[^.]+)/',//y a pas idée de se faire du mal comme ca
		$date , $regs);
		
		$retour=$regs['day']." ";
		switch ($regs['month']){
			case 1:
				$retour=$retour."Jan";
				break;
			case 2:
				$retour=$retour."Fev";
				break;
			case 3:
				$retour=$retour."Mar";
				break;
			case 4:
				$retour=$retour."Avr";
				break;
			case 5:
				$retour=$retour."Mai";
				break;
			case 6:
				$retour=$retour."Jun";
				break;
			case 7:
				$retour=$retour."Jul";
				break;
			case 8:
				$retour=$retour."Aou";
				break;
			case 9:
				$retour=$retour."Sep";
				break;
			case 10:
				$retour=$retour."Oct";
				break;
			case 11:
				$retour=$retour."Nov";
				break;
			case 12:
				$retour=$retour."Dec";
				break;
		}
		return $retour;
	}
	
	public function generateCombobox(){
		$ret="";
		foreach ($this->getCategories() as  $value) {
    		$ret=$ret.'<option value="'.$value->category_id.'">'.$value->category_name.'</option>';
		}
		return $ret;
	}
	
	public function submitNewArticle(Article $article){
		//$this->formatContent($article);
		return $this->aArticleDAO->addNewArticle($article);
	}
	
	public function alterArticle(Article $article){
		$this->formatContent($article);
		return $this->aArticleDAO->update($article);
	}
	
	public function deleteArticle($id){
		return $this->aArticleDAO->delete($id);
	}
	
	public function validComments($articleID){
		$insert=$this->aCommentDAO->validComments($articleID);
		return $insert;
	}
	
	private function formatContent(Article $article){
		$var=$article->getContent();
		$var = str_replace("\n", "<br/>", $var);
		$article->setContent($var);
	}
	
	 public function removeAllUncheckedComments(){
	 	$this->aCommentDAO->removeAllUnvalid();
	 }
	 
	 public static function deleteImg(){
	 	if (array_key_exists('imageName', $_POST)) {
		 	$imageName="../uploads/".$_POST['imageName'];
		 	if (file_exists($imageName)) {
		 		unlink($imageName);
		 		echo 'File '.$imageName.' has been deleted';
		 	} else {
		 		echo 'Could not delete '.$imageName.', file does not exist';
		 	}
	 	}
	 }
	 
	 public function printAllUpload(){
	 	$root ="../view/uploads";
	 	$Myrep = opendir($root) or die('Erreur : répertoire non trouvé : '.$rep);
	 	echo '<ul>';

	 	while($Entry = @readdir($Myrep)) {
	 		if(!(is_dir($root.$Entry)&& $Entry != '.' && $Entry != '..')) {
	 			$extension=strtolower(strrchr($Entry,'.'));
	 			if (in_array ($extension, array ('.gif','.jpg','.jpeg','.png'))){
	 				echo '<li>
	 						<form METHOD="post" action="listener/deleteImage.php" >
		 						<table>
		 							<tr><td>./uploads/'.$Entry.'</td>
		 								<td><input type="hidden" name="imageName" value="'.$Entry.'"/></tr>
		 							<tr><td><img src="./uploads/'.$Entry.'" style="height:100px;"></td>
		 								<td><input type="submit" name="Submit" value="Delete?" /></td></tr>
		 						</table>
	 						</form>
	 					</li>';
	 			}
	 		}
	 	}
	 	echo '</ul>';
	 	closedir($Myrep);
	 }
}
?>