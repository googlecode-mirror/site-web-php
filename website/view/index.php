
<?php $title="index";
		$keywords="Computer science, Architecture, Java, Linux";
		$description="Website of computer sciences news and articles" ?>
<?php include "header.php";
		$page_title="C là qu'on parle aussi bien des Pythons que des Perl"; ?>
		
<?php include_once 'data/CategoryDAO.php';?>
		
<?php include "leftIndex.php"?>
				
					<div class="box">
						<h2>
							En cours de réalisation..
						</h2>
						<img src="images/pic01.jpg" width="150" height="150" alt="" class="left" />
						<p>
							<?php include_once "control/ArticleControls.php";
							$controller= new ArticleControls();
							
							echo $controller->get_ip();?>
							<?php $dao=new CategoryDAO();
								$cat = $dao->getByName('news');
								var_dump($cat);?>
						</p>
					</div>

<?php include "bottom.php"?>