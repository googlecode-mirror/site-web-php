
<div id="banner">
	<div class="captions">
		<h2>
			<?php echo $page_title?>
		</h2>
	</div>
	<img src="images/banner.jpg" alt="" />
</div>
<div id="main">
	<?php include "control/ArticleControls.php";?>
	<?php $object=new ArticleControls();
			$navigation=new navigationControls();?>
	<div id="sidebar">
		<div class="box">
			<h3>Derniers articles</h3>
			<div class="dateList">
				<?php 

								$list=$object->getFiveLast();?>
				<ul class="linkedList dateList">
					<?php foreach($list as $article){ 
						echo '<li class="first"><span class="date">'.$ret=$object->dateReducted($article->News_date).'</span><a href="news.php?art_id='.$article->News_id.'">'.$article->News_title.'</a></li>';

						?>

					<?php } ?>
				</ul>
			</div>
		</div>

		<div class="box">
			<h3>Bienvenue chez les geeks !</h3>
			<?php 

			$list=$object->getFavorites();
			echo '<ul class="linkedList">';
			foreach($list as $favorite){

									echo '<li class="first"><a href="'.$favorite['favorites_url'].'">'.$favorite['favorites_title'].'</a></li>';
								}

								echo "<li></li></ul>";

									
								?>

		</div>
		<div>
			<?php if($navigation->isAdmin()){ ?>
			<a href="adminConsole.php"><img src="images/console.png" width="30"
				height="30" alt="" class="left" />Admin Console</a>
			<?php }?>
		</div>
	</div>
	<div id="content">