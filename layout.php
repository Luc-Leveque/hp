<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hyperplanning_HPAL_Paris</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <?php if(isset($_SESSION['id_u']))
{
    ?>
        <?php if(isset($_SESSION['lvl']) && $_SESSION['lvl']==1){
        
     ?>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">hyperplanning_HPAL_Paris</a> </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo BASE_URL; ?>/messagerie">Mesagerie </a></li>
                            <li><a href="<?php echo BASE_URL; ?>/listeprof">Liste Intervenant</a></li>
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Resultat <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href='<?php echo "index.php?page=Relever_de_note&id=".$_SESSION['id_u']; ?>'>Relevée de note</a></li>
                                    <li><a href='<?php echo "index.php?page=bulletin&id=".$_SESSION['id_u']; ?>'>Bulletin</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo "index.php?page=compte&id=".$_SESSION['id_u']; ?>'"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                            <li><a href="index?page=logout"><span class="glyphicon glyphicon-log-in"></span> Login/Logout</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
            <?php } ?>
                <?php if(isset($_SESSION['lvl']) && $_SESSION['lvl']==2){
        
     ?>
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">hyperplanning_HPAL_Paris</a> </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo BASE_URL; ?>/messagerie">Messagerie </a></li>
                                    <li><a href="<?php echo BASE_URL; ?>/noter">Noter</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>/listeclasse">Liste classe </a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="<?php echo "index.php?page=compte&id=".$_SESSION['id_u']; ?>'"><span class="glyphicon glyphicon-user"></span> Mon compte</a></li>
                                    <li><a href="index?page=logout"><span class="glyphicon glyphicon-log-in"></span> Login/Logout</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                    </nav>
                    <?php } ?>
                        <?php if( isset($_SESSION['lvl']) && $_SESSION['lvl']==0){
        
     ?>
                            <nav class="navbar navbar-inverse">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">hyperplanning_HPAL_Paris</a> </div>
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li><a href="<?php echo BASE_URL; ?>/listeprof">Liste Proffesseur</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>/listeeleve">Liste Eleve</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>/listeclasse">Liste classe </a></li>
                                            <li><a href="<?php echo BASE_URL; ?>/ajoutprof">Ajouter un enseignant </a></li>
                                            <li><a href="<?php echo BASE_URL; ?>/ajouteleves">Ajouter un eleve</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>/semestre">Gerer le semestre</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>/noter">Noter</a></li>
                                        </ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="index?page=logout"><span class="glyphicon glyphicon-log-in"></span> Login/Logout</a></li>
                                        </ul>
                                    </div>
                                    <!-- /.navbar-collapse -->
                                </div>
                            </nav>
                            <?php } ?>
                                <?php } ?>
                                    <?php
        
        echo $content ; 
    ?>
</body>

</html>