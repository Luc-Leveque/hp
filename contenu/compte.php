<?php 

$id = (int)$_GET['id']; 
$req = "SELECT * FROM user  where id_u=$id ";
    $requete = $bdd->query($req);

    while($data = $requete->fetch())
    {
?>
<form class="form-horizontal">
<fieldset>

<div class="row">
   <div class="col-md-3 col-lg-2 col-xs-offset-1 jolie">
        <h1> Compte :</h1> 
   </div>   
</div>
<div >
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="first_name">Prenom</label>  
      <div class="col-md-4">
      <input id="first_name" name="first_name" type="text"  class="form-control input-md" value="<?php echo $data['nom']  ?>"> 
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="last_name">Nom</label>  
      <div class="col-md-4">
      <input id="last_name" name="last_name" type="text"  class="form-control input-md"  value="<?php echo $data['prenom']  ?>">
      </div>
    </div>

    <!-- Prepended text-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email</label>
      <div class="col-md-8">
        <div class="input-group">
          <input id="email" name="email" class="form-control" placeholder="email utilisateur" type="text"  value="<?php echo $data['email']  ?>">
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="memberID">Mdp</label>  
        <div class="col-md-2">
          <input id="memberID" name="memberID" type="text" placeholder="Mdp" class="form-control input-md" > 
        </div>
    </div>

    <div class="form-group">
       <div class="col-md-1 col-md-offset-4">
        <a href="<?php echo "index.php?page=modifcompte&id=".$_SESSION['id_u']; ?>">Modifier</a>
        </div>
    </div>
</div>
<?php } ?>