	<div id="banner">
				<div class="captions">
					<h2><?php echo $page_title?></h2>
				</div>
				<img src="images/banner.jpg" alt="" />
			</div>
			<div id="main">
<?php include "control/ArticleControls.php"?>
<div id="sidebar">
					<div class="box">
						<h3>
							Augue orci
						</h3>
						<div class="dateList">
						
							<ul class="linkedList dateList">
								<li class="first">
									<span class="date">Jul 23</span> <a href="#">Ante sed fringilla</a>
								</li>
								<li>
									<span class="date">Jul 18</span> <a href="#">Turpis dolor risus</a>
								</li>
								<li>
									<span class="date">Jul 7</span> <a href="#">Nunc venenatis iaculis</a>
								</li>
								<li>
									<span class="date">Jul 2</span> <a href="#">Lorem ipsum etiam</a>
								</li>
								<li>
									<span class="date">Jun 28</span> <a href="#">Sed phaslleus dolor</a>
								</li>
								<li class="last">
									<span class="date">Jun 24</span> <a href="#">Arcu phasellus</a>
								</li>
							</ul>
						</div>
					</div>
					
										<div class="box">
						<h3>
							Bienvenue chez les geeks !
						</h3>
							<?php 
								$object=new ArticleControls();
								$list=$object->getFiveLast();
								echo '<ul class="linkedList">';
								foreach($list as $article){
									
									echo '<li class="first"><a href="news.php?art_id='.$article->News_id.'">'.$article->News_title.'</a></li>';
								}
								
								echo "<li></li></ul>";
								
							
							?>
						
					</div>
				</div>
				<div id="content">