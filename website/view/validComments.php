

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

		<?php $allUncheckedComment= $articleController->getAllUncheckedComments(); ?>
		<form METHOD="POST" action='listener/validComment.php'>
			<?php $articleController->printUnvalidComment($allUncheckedComment); ?>
		</form>
	</div>


</div>

<?php include "bottom.php"?>