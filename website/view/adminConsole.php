
<?php $title="admin";?>


<?php include "listener/checkConnect.php"?>

<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>

<?php include "leftIndex.php"?>

<div class="box">
	<h2>Admin console</h2>
	<img src="images/console.png" width="150" height="150" alt=""
		class="left" />
	<p>
	
	
	<ul>
		<li>link to new article form</li>
		<li>tab for new comment</li>
	</ul>
	<div class="box">
		<h3>Poster une nouvelle news:</h3>
		<form METHOD="POST" >
			Categorie:<!--  <select id="categorie">  -->
				<?php 
					$articleController= new ArticleControls();
					//echo $articleController->generateCombobox();
					foreach ($articleController->getCategories() as  $value) {

						echo('option value="'.$value->category_id.'"'.$value->category_name.'/option');
					}
				?>
			<!--</select>-->
			<br/>
			Titre: <input type="text" name="title"></input><br /> Votre
			commentaire:<br />
			<textarea dir="ltr" tabindex="1"
				style="display: block; width: 540px; height: 250px" cols="60"
				rows="10" name="content"></textarea>
			<input class="button" type="submit" tabindex="1" accesskey="r"
				value="Envoie" name="envoieCom">
		</form>
		<p>
			<?php 
			echo($_SESSION['USR']);
			?>
		</p>
	</div>

	</p>
</div>

<?php include "bottom.php"?>