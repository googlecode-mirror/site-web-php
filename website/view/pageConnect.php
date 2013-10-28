
<?php $title="Connection";
		$keywords="Computer science, Architecture, Java, Linux";
		$description="Website of computer sciences news and articles" ?>
<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>


<?php include "leftIndex.php"?>

<?php 
			include_once "control/ArticleControls.php";
			$firstArticle=new ArticleControls();
			$firstArticle->print_Article();
		?>
										<div class="box">
						<h2>
							<?php  echo $firstArticle->getArticle()->News_title;?>
						</h2>
						<img src="images/pic01.jpg" width="150" height="150" alt="" class="left" />
						<p>
						<?php  echo $firstArticle->getArticle()->News_content ;?>
							
	
									</p>
					</div>

		
<?php include "bottom.php"?>