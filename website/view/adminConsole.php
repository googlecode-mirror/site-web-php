<?php 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
$title="admin";
$keywords = " ";
$description = " ";
$page_title="Welcome ".$_SESSION['USR']." !";
include "header.php";
?>
<script src="../ckeditor/ckeditor.js"></script>

<?php include "leftIndex.php"?>

<?php include "listener/checkConnect.php"?>


<div class="box">
	<h2>Admin console</h2>

	<?php $articleController= new ArticleControls();?>

	<?php include "buttonAdmin.php"?>

	<div class="box">
		<h3>Poster une nouvelle news:</h3>
		<form METHOD="POST" action="listener/postArticle.php">
			Categorie:
			<!--  <select id="categorie">  -->
			<input type=text list=categories name="category">
			<datalist id=categories>
				<?php 
				foreach ($articleController->getCategories() as  $value) {
						echo('<option>'.$value['category_name']);
					}
					?>
			</datalist>
			<!--</select>-->
			<br /> Titre: <input type="text" name="title"></input> 
			<br /> Tags: <input type="text" name="tags"></input> 
			<br /> Votre article:<br />
			<textarea dir="ltr" tabindex="1" name="editor"
				style="display: block; width: 540px; height: 250px" cols="60"
				rows="10"></textarea>
			<br /> R&eacute;sum&eacute; :<br />
			<textarea dir="ltr" tabindex="1" name="sumup_editor"
				style="display: block; width: 540px; height: 130px" cols="60"
				rows="10"></textarea>
			<input class="button" type="submit" tabindex="1" accesskey="r"
				value="Envoie" name="envoieCom">
			<script>
   			 CKEDITOR.replace( 'editor' );
   			 CKEDITOR.replace( 'sumup_editor' );
			</script>
		</form>
	</div>


</div>

<?php include "bottom.php"?>