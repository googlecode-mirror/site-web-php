
<?php $title="Articles";
		$keywords="Computer science, Architecture, Java, Linux";
		$description="News and Discutions about Computer science" ?>
<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>

		
<?php include "leftIndex.php"?>
<?php include "control/ArticleControls.php"?>
<?php 
	$id = $_GET["art_id"];
	$object = new ArticleControls();
	$article=$object->getArticleById($id);
?>
					<div class="box">
						<h2>
							<?php echo $article->News_title; ?>
						</h2>
						<img src="images/News.jpg" width="150" height="150" alt="" class="left" />
						<p>
							<?php echo $article->News_content; ?>
						</p>
					</div>
					<div class="box">
					<h3>Commentaires</h3>
					<?php $listComment=$object->getListComment($id);
						if($listComment != false){
							foreach($listComment as $comment){
								echo "<div class='comment'><h4>".$comment->comment_user_name."</h4>"
										.$comment->comment_content."</div>";
							}
						}else{
							?>
							il n'y a pas de commentaires actuellement
							<?php
						}
					
					?>
					</div>

					<div class="box">
					<h3>Poster un commentaire:</h3>
					<form METHOD="POST" action="listener/addComment.php">
						<input type="hidden" name="id" value="<?php echo $id; ?>" />
						<input type="hidden" name="ip" value="<?php echo $object->get_ip(); ?>" />
						Nom:	<input type="text" name="name"></input>*<br/>
						Titre:	<input type="text" name="title"></input><br/>
						Votre commentaire:<br/>
						<textarea  dir="ltr" tabindex="1" style="display:block; width:540px;
						 height:250px" cols="60" rows="10" name="content"></textarea>
						<input class="button" type="submit" tabindex="1" accesskey="r" value="Envoie" name="envoieCom">
					</form>
					</div>
<?php include "bottom.php"?>