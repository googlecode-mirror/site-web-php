<?php include_once "control/ArticleControls.php"?>
<?php 
	$id = $_GET["art_id"];
	$object = new ArticleControls();
	$article=$object->getArticleById($id);
?>

<?php $title=$article->News_title;
		$keywords=$article->News_tag;
		$description=$article->News_sumup; ?>

<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>

<script src="http://yandex.st/highlightjs/8.0/highlight.min.js"></script>

<script>
$(document).ready(function(){
	$(':input[name="delete"]').click(function(){
		 $(function() {
			 $( "#dialog-confirm" ).removeClass("dialog-hide");
			 $( "#dialog-confirm" ).dialog({
			 resizable: true,
			 height:200,
			 width: 486,
			 modal: true,
			 buttons: {
					 "Delete all items": function() {
						$('#deleteForm').submit();
					 },
					 Cancel: function() {
						 $( this ).dialog( "close" );
					 }
				 }
			 });
		 });
  	});
	$('pre').each(function(i, e) {
		hljs.highlightBlock(e);
	});
});
</script>
<div id="dialog-confirm" class="dialog-hide" title="Empty the recycle bin?">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
		
<?php 
	include "leftIndex.php";
		$name = 'isAdmin';
		if (session_status() != PHP_SESSION_NONE
				&& (isset($_SESSION[$name]) && $_SESSION[$name] == true)) {	
			?>
	<script src="../script/ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="../script/jquery-ui/css/start/jquery-ui-1.10.4.custom.css">
	<script src="../script/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>

	<div class="box">
		<h3>Poster une nouvelle news:</h3>
		<form id="updateForm" METHOD="POST" action="listener/updateArticle.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
			<br /> Titre: <input type="text" name="title" value="<?php echo $article->News_title; ?>"/>
			<br /> Tags: <input type="text" name="tags" value="<?php echo $article->News_tag; ?>"/>
			<br /> Votre article:<br />
			<textarea dir="ltr" tabindex="1" name="editor"
				style="display: block; width: 540px; height: 250px" 
				cols="60"rows="10" ><?php echo $article->News_content;?></textarea>
			<br /> R&eacute;sum&eacute; :<br />
			<textarea dir="ltr" tabindex="1" name="sumup_editor"
				style="display: block; width: 540px; height: 130px" cols="60"
				rows="10"><?php echo $article->News_sumup; ?></textarea>
			<script>
	   			 CKEDITOR.replace( 'editor' );
	   			 CKEDITOR.replace( 'sumup_editor' );
				</script>
		</form> 
		<form id="deleteForm" METHOD="POST" action="listener/deleteArticle.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
		</form>
		<input class="button" type="submit" tabindex="1" accesskey="r"
				form="updateForm" value="Envoie" name="save">
		<input class="button" tabindex="1"  type="submit" value="Delete" name="delete">
	</div>

<?php } else {?>
		<div class="box">
			<h2>
				<?php echo $article->News_title; ?>
			</h2>
			<div class="news">
				<?php echo $article->News_content;?>
			</div>
			<br />
		</div>
		<div class="box">
			<h3>Commentaires</h3>
			<?php $object->printComments($id);?>
		</div>
	
		<div class="box">
			<h3>Poster un commentaire:</h3>
			<form METHOD="POST" action="listener/addComment.php">
				<input type="hidden" name="id" value="<?php echo $id; ?>" /> 
				<input type="hidden" name="ip" value="<?php echo $object->get_ip(); ?>" />
				Nom: <input type="text" name="name"></input>*<br /> 
				Titre: <input type="text" name="title"></input><br /> 
				Votre commentaire:<br />
				<textarea dir="ltr" tabindex="1"
					style="display: block; width: 540px; height: 250px" cols="60"
					rows="10" name="content"></textarea>
				<input class="button" type="submit" tabindex="1" accesskey="r"
					value="Envoie" name="envoieCom">
			</form>
		</div>
	<?php }
 include "bottom.php"?>