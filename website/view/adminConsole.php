
<?php $title="admin";?>


<?php include "listener/checkConnect.php"?>

<?php include_once "header.php";
		$page_title="Welcome ".$_SESSION['USR']." !"; ?>

<?php include "leftIndex.php"?>

<div class="box">
	<h2>Admin console</h2>
	<!-- <img src="images/console.png" width="150" height="150" alt=""
		class="left" /> -->

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
				//echo $articleController->generateCombobox();
				foreach ($articleController->getCategories() as  $value) {
						echo('<option>'.$value['category_name']);
					}
					?>
			</datalist>
			<!--</select>-->
			<br /> Titre: <input type="text" name="title"></input>
			<br /> Votre article:<br />
			<textarea dir="ltr" tabindex="1" name="editor"
				style="display: block; width: 540px; height: 250px" cols="60"
				rows="10"></textarea>
			<input class="button" type="submit" tabindex="1" accesskey="r"
				value="Envoie" name="envoieCom">
			<script>
   			 CKEDITOR.replace( 'editor' );
			</script>
		</form>

		<form name="inscription" method="POST"
			action="listener/AdminLogout.php">
			<input type="submit" value="Log out">
		</form>
	</div>


</div>

<?php include "bottom.php"?>