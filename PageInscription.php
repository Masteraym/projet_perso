<?php include('./inc/header.inc.php'); ?>
<main>
        <div class="NavExtention">
            <ul class="liste">
                <a class ="ListeElementExtention" href="PageService.php"><li>Service</li></a>
                <a class ="ListeElementExtention" href="PageContact.php"><li>Contact</li></a>
                <a class ="ListeElementExtention" href="PageConnection.php"><li>Connection</li></a>
                <a class ="ListeElementExtention" href="PageInscription.php"><li>Inscription</li></a>
            </ul>
        </div>
        <section class="Section1PageInscription">
           <form class="FormIn" action="traitement2.php" name="inscription" method="POST" >
            <div class="divinput">
                <h1>Formulaire d'inscription</h1>
                <input placeholder="Prénom" class="MesinputsPI" pattern='/^[A-Za-z]{3,}+$/'type="text" name="prenom" id="prenom <?php if(isset($prenomMsgErreur) && !empty($prenomMsgErreur)) echo 'is-invalid'; ?> " aria-describedby="prenomFeedback"  >
                                    <?php if(isset($prenomMsgErreur)){      ?>

                                    <div class="invalid-feedback" id="prenomFeedback"> 
                                        <?php echo  $prenomMsgErreur; ?>
                                    </div> <?php } ?>
                <input placeholder="Nom de famille" class="MesinputsPI" pattern='/^[A-Za-z]{3,}+$/'type="text" name="nom" id="nom <?php if(isset($nomMsgErreur) && !empty($nomMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="nomFeedback" >
                                    <?php if(isset($nomMsgErreur)){  ?>
                                    <div class="invalid-feedback" id="nomFeedback">
                                    <?php echo  $nomMsgErreur; ?> 
                                    </div> <?php } ?>
                <input placeholder="Numéro de téléphonne" class="MesinputsPI" type="tel" name="tel"id="tel <?php if(isset($telMsgErreur) && !empty($telMsgErreur)) echo 'is-invalid'; ?> " aria-describedby="telFeedback"  >
                                    <?php if(isset($telMsgErreur)){      ?>

                                    <div class="invalid-feedback" id="telFeedback"> 
                                        <?php echo  $telMsgErreur; ?>
                                    </div> <?php } ?>
                <input placeholder="Votre Email" class="MesinputsPI"type="email" name="email" id="email <?php if(isset($emailMsgErreur) && !empty($emailMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="emailFeedback"  >
                                        <?php if(isset($emailMsgErreur)){      ?>

                                    <div class="invalid-feedback" id="emailFeedback"> 
                                        <?php echo  $emailMsgErreur; ?>
                                    </div>  <?php } ?>
                <input placeholder="Mots de passe" class="MesinputsPI"type="password" name="pass" id="pass <?php if(isset($passMsgErreur) && !empty($passMsgErreur)) echo 'is-invalid'; ?>" aria-describedby="passFeedback"  >
                                        <?php if(isset($passMsgErreur)){      ?>
                                            <!-- pattern='/^[A-Za-z0-9_$]{8,}/' -->

                                    <div class="invalid-feedback" id="passFeedback"> 
                                        <?php echo  $passMsgErreur; ?>
                                    </div>  <?php }  ?>
            </div>
            <div class="divinscription">
                <button class="buttonInscription" type="submit">Inscrit toi</button>
            </div>
           </form>
        </section>
    </main>
<?php include('./inc/footer.inc.php'); ?>