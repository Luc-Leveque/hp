<?php
$id_u = $_SESSION['id_u'] ; 

                   $req5="Select * from devoir d , noter n where d.id_d=n.id_d and id_u=$id ";
                   $requete5 = $bdd->query($req5);
                    while ($data5 = $requete5->fetch()){
                        echo " <input class='hidden' type='text' name='id_m[]' value=".$data['id_m'].">";                  
                        echo " <input class='hidden' type='text' name='coeff[]' value=".$data['coeff'].">";
                        echo " <input class='hidden' type='text' name='note[]' value=".$data['note'].">";
                        echo " <input class='hidden' type='text' name='id_d[]' value=".$data['n.id_d'].">";
                    }

				foreach ($id_m as $k => $v ){
                    foreach($id_d as $k => $n)
                        $somme = $coeff[$k] +$somme ;
                        $somme2 = $somme2 + ($coeff[$k] * $note[$k]) 
                    
                   // $req2="Select * from commenter where id_u=$id_u[$k] and id_s=$id_s and id_m=$id2 ";
                   // $requete2 = $bdd->query($req2);
                   // $data2 = $requete2->fetch();
                   // if(isset($data['moyenne'])){
                   //     $m = $data['moyenne'];   
                   // }
                   // else{
                    $m="";
                   // }
                    
                    $req5="Select * from noter n ,devoir d where d.id_d=n.id_d and id_u=$id_u[$k] and id_s=$id_s and id_m=$id2 ";
                    $requete5 = $bdd->query($req5);
                    while ($data5 = $requete5->fetch()){
                        $m .= (($data5['note']*$data5['coeff'])/$data5['coeff']) + ;
                    }
              
                    
                    $req3 = $bdd->prepare("UPDATE commenter SET moyenne = :app Where id_u=:id_u and id_s=:id_s and id_m=:id_m ;");
                    $req3->execute(array(
							':moyenne' =>"$m",
                            ':id_u' => $id_u[$k],
                            ':id_s' => $id_s,
                            ':id_m' => $id2
                            
                    ));
            }	?>