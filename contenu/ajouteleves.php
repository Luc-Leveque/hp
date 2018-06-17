                <?php
                
                    if(isset($_POST["submit"])){
                        extract($_POST); 
                        $lvl = 1 ; 
                        foreach($nom_e as $k => $v)
                        {
                            if($v != "")
                            {
                                if( !empty($nom_e[$k]) &&  preg_match("#^([A-Za-z]{1,})$#",$nom_e[$k])){
                                    if( !empty($prenom_e[$k]) &&  preg_match("#^([A-Za-z]{1,})$#",$prenom_e[$k])){
                                        if( !empty(sha1($mdp_e[$k])) &&  preg_match("#^[A-Za-z0-9]{1,}$#",sha1($mdp_e[$k]))){
                                $req7 = $bdd->prepare("INSERT INTO user(nom, prenom,id_c , mdp , lvl) VALUES(?, ?, ?,? ,?)");
                                $req7= $req7->execute(array($nom_e[$k], $prenom_e[$k], $classe[$k] ,sha1($mdp_e[$k]) , $lvl));

                                $id_u = $bdd->lastInsertId();
                            foreach($matiere as $t=>$m)
                            {
                                foreach($semestre as $n => $s){
                                    $req10 = $bdd->prepare("INSERT INTO commenter(id_m,id_u,id_s) VALUES(:id_m,:id_u,:id_s)");
                                    $req10 = $req10->execute(array(
                                    ':id_m' => $m,
                                    ':id_u' => $id_u,
                                    ':id_s' => $s
                                    ));
                                    
                                    
                                }
                            }
                $reussite = '<div class="alert alert-success">L utilisateur a était ajouter à la base de données  </div> ';
                }
                else
                {$erreur = '<div class="alert alert-warning"> <strong>Warning!</strong>Veullez saisir un Mdp</div>' ;
                }
            }
            else
            {$erreur = '<div class="alert alert-warning"> <strong>Warning!</strong>Veullez saisir un prenom dans le bon format</div>' ;
            }
        }
        else
        {$erreur = '<div class="alert alert-warning"> <strong>Warning!</strong>Veullez saisir un Nom dans le bon format</div>' ;
        }
                            }
                        }
                        
}
?>
   <div class="contenaire">
    <div class="row">
       <div class="col-xs-10 col-xs-offset-1">
           <?php if(isset($erreur) && !empty($erreur) ) {echo $erreur ; }?>
           
           <?php if(isset($reussite) && !empty($reussite) ) {echo $reussite ; } ?>
            <form method="post">
                 <div>
                    <span class="btn btn-default "><h5> Classe :</h5></span>
                    <select class="btn btn-default " name="classe">
                       <?php   
                        $req = "Select * from classes ";
                        $requete = $bdd->query($req);

                        while($data = $requete->fetch())
                        {	
                           echo " <option value=".$data['id_c'].">".$data['nom_c']."</option></br>";
                        }
                        ?>
                    </select>

                    Nom élève: <input type="text" name="nom_e[]">
                    Prénom élève: <input type="text" name="prenom_e[]">
                    Mdp élève: <input type="text" name="mdp_e[]">
                    
                    <?php   $req2 = "Select * from semestre ";
                    $requete2 = $bdd->query($req2);

                    while($data2 = $requete2->fetch())
                    {	
                        echo " <input class='hidden' name='semestre[]' value=".$data2['id_s'].">";
                    }
                    ?>
                    
                    <?php   $req3 = "Select * from matiere ";
                    $requete3 = $bdd->query($req3);

                    while($data3 = $requete3->fetch())
                    {	
                        echo " <input class='hidden' name='matiere[]' value=".$data3['id_m'].">";
                    }
                    ?>
                    
                    <button class="btn btn-success select_class" type="submit" name="submit"><span class="glyphicon glyphicon-plus"></span> Ajouter un élève</button>
                 </div>
                 
                 
                 <!--Formulaire caché-->
                 
                  <div class="hidden" id="duplicate">
                   <span class="btn btn-default"><h5> Classe :</h5></span>
                    <select class="btn btn-default" name="classe[]">
                            <?php   $req = "Select * from classes ";
                            $requete = $bdd->query($req);

                            while($data = $requete->fetch())
                            {	
                               echo " <option value=".$data['id_c'].">".$data['nom_c']."</option></br>";
                            }
                        ?>
                    </select>

                    Nom élève: <input type="text" name="nom_e[]">
                    Prénom élève: <input type="text" name="prenom_e[]">
                    Mdp élève: <input type="text" name="mdp_e[]">
                    <?php   $req2 = "Select * from semestre ";
                    $requete2 = $bdd->query($req2);

                    while($data2 = $requete2->fetch())
                    {	
                        echo " <input class='hidden' name='semestre[]' value=".$data2['id_s'].">";
                    }
                    ?>
                    
                    <?php   $req3 = "Select * from matiere ";
                    $requete3 = $bdd->query($req3);

                    while($data3 = $requete3->fetch())
                    {	
                        echo " <input class='hidden' name='matiere[]' value=".$data3['id_m'].">";
                    }
                    ?>
                    
                    <button class="btn btn-success select_class" type="submit" name="submit"><span class="glyphicon glyphicon-plus"></span> Ajouter un élève</button>
                    
                   </div>
                </form>
              <button class="btn btn-success select_class" type="submit" name="submit" id="duplicatebtn"><span class="glyphicon glyphicon-plus"></span> Ajouter un autre élève</button>
                <script
                  src="https://code.jquery.com/jquery-3.1.1.min.js"
                  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                  crossorigin="anonymous"></script>
                <script>
                    (function ($){
                        $('#duplicatebtn').click(function (e) {
                            e.preventDefault();
                            var clone = $('#duplicate').clone().attr('id','').removeClass('hidden');
                            $('#duplicate').before(clone);
                        })
                    })(jQuery);
                </script>
                   </div>
        
    </div>
</div>