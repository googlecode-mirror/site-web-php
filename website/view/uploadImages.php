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

		
<?php include "leftIndex.php"?>

<?php include "listener/checkConnect.php"?>

<div class="box">
	<h2>Admin console</h2>

<?php $articleController= new ArticleControls();?>
	<?php include "buttonAdmin.php"?>

	<form method="post" action="listener/upload.php"
		enctype="multipart/form-data">
		 <label
			for="file">Fichier (tous formats | max. 1 Mo) :</label><br /> <input
			type="hidden" name="MAX_FILE_SIZE" value="1048576" /> <input
			type="file" name="file" id="mon_fichier" /><br /> <label
			for="titre">Name (max. 50 char) :</label><br /> <input
			type="text" name="title" value="Name"  /><br />
		<input type="submit" name="submit" value="Envoyer" />
	</form>

<?php $articleController->printAllUpload(); ?>

</div>
<?php include "bottom.php"?>