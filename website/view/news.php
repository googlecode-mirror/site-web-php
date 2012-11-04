
<?php $title="Articles";
		$keywords="Computer science, Architecture, Java, Linux";
		$description="News and Discutions about Computer science" ?>
<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>

		
<?php include "leftIndex.php"?>
<?php include "../control/tryconnect.php"?>
<?php 
	$id = $_GET["art_id"];
	$object = new tryconnect();
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

<?php include "bottom.php"?>