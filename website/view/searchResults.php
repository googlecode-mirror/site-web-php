<?php 	$title="Recherche";
		$keywords="Computer science, Architecture, Java, Linux";
		$description="News and Discutions about Computer science";
		include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; 
		include "leftIndex.php";
 		include_once "control/ArticleControls.php"; ?>

<div class="box">
	<h2>Resultats</h2>
	<p>
		<?php 
		$criteria = $_GET["search"];
		$object=new ArticleControls();
		$list=$object->getArticlesMatchingSearch($criteria);
		if($list){
				echo "<ul>";
				foreach($list as $article){
					echo '<li><a href="news.php?art_id='.$article->News_id.'">'.$article->News_title.'</a></li><br/>';
					echo'<p>'.$article->News_sumup.'</p><br/>';
				}
				echo "<li></li></ul>";
			}else{
			?>
	
	
	<h3>Pas d'article correspondant</h3>

	<?php } ?>

	</p>
</div>