

<?php $title="admin"; ?>
<?php include "header.php";
		$page_title="Welcome ".$_SESSION['USR']." !"; ?>

		
<?php include "leftIndex.php"?>


<?php include "listener/checkConnect.php"?>

<div class="box">
	<h2>Admin console</h2>
	<!-- <img src="images/console.png" width="150" height="150" alt=""
		class="left" /> -->

	<?php $articleController= new ArticleControls();?>

	<?php include "buttonAdmin.php"?>
	<div class="box">
		<h3>Commentaires à valider:</h3>

		<?php 
		$allUncheckedComment= $articleController->getAllUncheckedComments();
		if($allUncheckedComment != null){
			?>
		<form METHOD="POST" action='listener/validComment.php'>
			<ul>
				<?php
				$articleId="";
				foreach ($allUncheckedComment as $comment){
				$article;
				if($articleId != $comment->news_id){
					$article=$articleController->getArticleById($comment->news_id);
					echo "<li><h2>$article->News_title<h2></li>";
				}
				echo "<li><b>".$comment->comment_title." by ".$comment->comment_user_name."</b><br>";
				echo  $comment->comment_content."<br>";
				echo ' validate? <input type="checkbox" name="valid_'.$comment->comment_id.'">';
			}
			?>
			</ul>
			<input class="button" type="submit" tabindex="1" accesskey="enter"
				value="Submit" name="validComments">
		</form>
		<?php 
		}

		?>

	</div>


</div>

<?php include "bottom.php"?>