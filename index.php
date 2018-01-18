<?php
	include('includes/haut.inc.php');
	include('includes/connexion.inc.php');

?>



<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Le fil</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
    </header>
                            
    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">              
                <form method="POST" action="article.php">
                    <div class="col-sm-10">  
                        <div class="form-group">
                            <input type ="hidden" name="id" value="">
                            <textarea id="message" name="message" class="form-control" placeholder="Message" style="width:100%; height:54px"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </div>                        
                </form>
            </div>
                 
            <div class="row">
                <div class="col-md-12">
<?php

				$messageMax= 4 ; //variable definissant le nombre de messages max par page à 4 
					$sql="SELECT * FROM messages ORDER BY date desc";
					$req = $pdo->prepare($sql);
					$req->execute();
					
					$array = $req->fetchALL();
					$nb_lignes = count($array);
					$nb_pages=ceil($nb_lignes/$messageMax);
					
					if(isset($_GET['page']))
					{
						$pagecourante=intval($_GET['page']);
						if($pagecourante>$nb_pages)
						{
							$pagecourante=$nb_pages;
						}
						}
						else
						{
						   $pagecourante=1;
						}
					$first=($pagecourante-1)*$messageMax;
					
					//Affichage des messages, plus récent en premier
					
					$sql="SELECT * FROM messages ORDER BY date desc LIMIT $first, $messageMax";
					$stnt=$pdo->query($sql);
					while($data=$stnt->fetch()){
?>    
                    <blockquote>
                     <p><?php echo $data['contenu']; ?></p>
                    <footer><?php echo date ('H:i:s - d/m/y', $data['date']); ?> </footer>
                        <a href="article.php?a=sup&id=<?=$data["id"]?>" class="btn btn-danger">Supprimer</a>
                        <a href="modif.php?a=mod&id=<?=$data["id"]?>" class="btn btn-primary">Modifier</a>
                    </blockquote>    
<?php
					}
					//Affichage de la pagination sous forme " Page : 1 2 3 ...."
					echo '<p> Page : ';
					for($i=1; $i<=$nb_pages; $i++)
					{
						if($i==$pagecourante)
						{
							echo $i;
						}
						else 
						{
							echo ' <a href="index.php?page='.$i.' ">'.$i.'</a></p>';
						}
					}

?>                    
                   
                </div>
            </div>
        </div>
    </section>	

 	
	
<?php	
/* $all_data=array();
		while ($data=fetch()){
			$all_data[]=$data;
		}
		assign ('all_data', $all_data);
		
		
	index.tpl

	{foreach $all_data}
		
			html
			
	{	/boucle}
	*/	
	
	
	include('includes/bas.inc.php');
?>