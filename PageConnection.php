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
        <section class="Section1PageConnection">
           <form action="connexion.php"class="FormCo" name="Connection" method="POST">
                <div>
                    <h1>Heureux de vous retrouvez !</h1>
                    <input class="MesInput"placeholder="Identifiant" type="text" name="email" id='email'>
                    <input class="MesInput" placeholder="Mots de passe" type="password" name="pass" id="pass">
                </div>
                <div class="divbuttonSub">
                    <button class="buttonConnection" type="submit">Connection</button>    
                </div>   
            </form>
        </section>
    </main>
<?php include('./inc/footer.inc.php'); ?>