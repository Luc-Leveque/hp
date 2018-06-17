<?PHP
$nbrenotes = (isset($_POST['nbrenotes'])) ? $_POST['nbrenotes'] : 0;
?>
 
<html><body>
<p align=center><form action="calculer.php" method="post">
Nombre de notes : <input type="text" name="nbrenotes" /><br />
<input type="submit" value="Envoyer !" />
</form><br /><br />
<?php
if($nbrenotes!=0)
 {
   $nbredenotes = 1;
   echo "<form action='calculer.php' method='post'><br />";
   while ($nbredenotes <= $_POST['nbrenotes'])
       {
          echo "Note : <input type='text' name='note[]' style='width:60px;'/>
          Coeff : <input type='text' name='coeff[]' maxlength='2' style='width:50px; margin-left:20px;' /><br />";
          $nbredenotes++;
       }
   echo "<input type='submit' value='Envoyer !' />";
 }
 
$note = (isset($_POST['note'])) ? $_POST['note'] : '';
$coeff = (isset($_POST['coeff'])) ? $_POST['coeff'] : '';
$notetot=0;
$coefftot=0;
$Nbr=sizeof($note);
if($Nbr==1 && $note=="") $Nbr=0;
if($Nbr!=0 && $note!="")
  {
   for ($a=0;$a<$Nbr;$a++)
    {
      echo ("Note ".$note[$a]." Coeff ".$coeff[$a]."<br />");
      $coefftot=$coefftot+$coeff[$a];
      $notetot=$notetot+($note[$a] * $coeff[$a]);
    }
     $moyenne = $notetot / $coefftot;
     echo "La moyenne est de ".$moyenne;
 
  }
?>
</p>
</body></html>