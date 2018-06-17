<?php
function captchaform($cle)
{
    $html = "<div class='g-recaptcha' data-sitekey='$cle'></div>";
    
    return $html ;
}

function captcha($clesecret , $reponse){
    $html = "$url = https://www.google.com/recaptcha/api/siteverify?secret=$clesecret=$reponse";

    $html .= " $homepage = file_get_contents($url)";
    return $html ;
}

function importImage($image , $chemin ){
            $name = $image['name'];
            $tmp_name = $image['tmp_name'];
            
            if($name != "")
            {      
                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                $extension = pathinfo($name,PATHINFO_EXTENSION);

                if (in_array($extension,$extensions_valides) )
                {
                    move_uploaded_file($tmp_name,$chemin.$name);
                 }
            }
}


?>
