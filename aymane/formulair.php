<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement.php" method="POST" >
                <div class="divinput">
                    <label for="nom">Nom :</label>
                    <input  class="MesinputsPI"type="text" name="nom" id="nom" value="<?php echo isset($_SESSION['compte-donnees']['nom']) ? $_SESSION['compte-donnees']['nom'] : ''; ?>">
                    <?php if(isset($_SESSION['compte-erreurs']['nom'])) { echo '<span class="erreur">' . $_SESSION['compte-erreurs']['nom'] . '</span>'; } ?><br>

                    <label for="mail">Email :</label>
                    <input  class="MesinputsPI" type="email" name="mail" id="mail" value="<?php echo isset($_SESSION['compte-donnees']['mail']) ? $_SESSION['compte-donnees']['mail'] : ''; ?>">
                    <?php if(isset($_SESSION['compte-erreurs']['mail'])) { echo '<span class="erreur">' . $_SESSION['compte-erreurs']['mail'] . '</span>'; } ?><br>

                    <label for="pass">Mot de passe :</label>
                    <input  class="MesinputsPI" type="password" name="pass" id="pass">
                    <?php if(isset($_SESSION['compte-erreurs']['pass'])) { echo '<span class="erreur">' . $_SESSION['compte-erreurs']['pass'] . '</span>'; } ?><br>
                    
                    
                    <label for="pass2">Vérification mot de passe</label>
                    <input type="password" class="form-control MesinputsPI" id="pass2" >
                    
                    <?php if(isset($_SESSION['compte-erreurs']['pass2'])) { echo '<span class="erreur">' . $_SESSION['compte-erreurs']['pass2'] . '</span>'; } ?><br> 
                                
                </div> 
                <div class="divinscription">
                    <input type="submit" value="S'inscrire" class="buttonInscription">
                </div>   
            </form>
</body>
</html>