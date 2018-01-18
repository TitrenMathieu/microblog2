<?php
    include('includes/haut.inc.php');
    include('includes/connexion.inc.php');

//
if(isset($_POST['email'])){
    
    $sql="SELECT email,mdp FROM utilisateurs WHERE email = :email AND mdp = :mdp";
    $prep= $pdo->prepare($sql);
    $prep->bindValue(':email',$_POST['email']);
    $prep->bindValue(':mdp',$_POST['mdp']);
    $prep->execute();
    $prep->rowCount();

    $sid= md5($_POST['email'].time());
    $sql2="UPDATE utilisateurs SET sid = :sid WHERE email = :email";
    $prep2= $pdo->prepare($sql2);    
    $prep2->bindValue(':sid',$sid);
    $prep2->bindValue(':email',$_POST['email']);
    $prep2->execute();
    $prep2->rowCount();    
	$cookie = setcookie('sid',$sid,time()+15*60);
    header("Location:index.php");
    
}
else{
?>

<section>
<form class="form-horizontal" method="POST" action="connexion.php" style="padding-top:90px">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="mdp" placeholder="Password" name="mdp">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>   
</section>	

<?php

	include('includes/bas.inc.php');
}
?>

