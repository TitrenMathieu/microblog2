<?php 
include('includes/haut.inc.php');
include('includes/connexion.inc.php');
session_start();
$modifier=$_GET['id'];
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
                <?php echo"<form method='post' action='modif_verif.php?id=$modifier'>";
                
                    ?>
                    <div class="col-sm-10">  
                        <div class="form-group">
                            <?php 
                            $sqlmod= $pdo->query("SELECT contenu FROM messages WHERE id=$modifier");
                            while($donnees=$sqlmod->fetch()){
                                echo"<textarea id='message' name='message' class='form-control'>$donnees[0]</textarea>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg" name="submit">Envoyer</button>
                    </div>                        
            </div>
        </div>
    </section>

<?php include('includes/bas.inc.php'); 

?>


