
<?php $title="Articles";
		$keywords="Computer science, Architecture, Java, Linux";
		$description="News and Discutions about Computer science" ?>
<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>

		
<?php include "leftIndex.php"?>
<?php include "../control/tryconnect.php"?>
				
					<div class="box">
						<h2>
							Liste des articles
						</h2>
						<img src="images/News.jpg" width="150" height="150" alt="" class="left" />
						<p>
							<?php 
								$object=new tryconnect();
								$list=$object->print_Article(2);
								echo "<ul>";
								foreach($list as $article){
									var_dump($article);
									echo '<li><a href="news.php?art_id='.$article->News_id.'">'.$article->News_title.'</a></li>';
								}
								
								echo "<li></li></ul>";
							?>
						</p>
					</div>

<?php include "bottom.php"?>