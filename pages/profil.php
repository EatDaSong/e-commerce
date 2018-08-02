<div class="position1" align="center">
    <div class="diapo">
        <img class="cadre" src="public/images/fond/profil.jpg">	
    </div>
</div>

<div class="profil" align="center">
    <div class="profil1">
        <h2 class="titre2">donnees confidentiel</h2>
        <span class="position4" align="center">
            <p class="detaill1">CIVILITE : 
                <?php
                if ($utilisateur->getSexe() == 1) {
                    echo "Monsieur";
                } elseif ($utilisateur->getSexe() == 2) {
                    echo "Madame";
                } elseif ($utilisateur->getSexe() == 3) {
                    echo "Mademoiselle";
                }
                ?>
            </p>
            <p class="detaill1">NOM : <?= $utilisateur->getPrenom() ?></p>
            <p class="detaill1">PRENOM : <?= $utilisateur->getNom() ?></p>
            <p class="detaill1">DATE DE NAISSANCE : <?= $utilisateur->getDateDeNaissance() ?></p>
            <p class="detaill1">PAYS : <?= $utilisateur->getPays() ?></p>
            <p class="detaill1">ADRESSE : <?= $utilisateur->getAdresse() ?></p>
            <p class="detaill1">CODE POSTAL : <?= $utilisateur->getCodePostal() ?></p>
            <p class="detaill1">VILLE : <?= $utilisateur->getVille() ?></p>
            <span>
                </div>

                <div class="bouton_changer">
                    <ul class="changer">
                        <li class="changer" align="center"><A href="#2" onclick="inscription_on()" ><p class="changer1">Changer mon profil</p></A></li>
                    </ul>
                </div>

                <div id="overlay2">
                    <div id="connexion">

                        <div class="bouton_quitter">
                            <ul class="quitter">
                                <li class="quitter" align="center"><A HREF="#2" onclick="inscription_off()"><p class="quitter1">x</p></A></li>
                            </ul>
                        </div>

                        <div class="inscription" align="center">

                            <h2 class="titreS" align="center">modifier profil</h2>

                            <div class="col-12">

                                <form class="formu2" method="POST" action="?p=profil&a=editprofil">
                                    <div class="scroll">
                                        <table class="description3" align="center">
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="pseudo">Nom :</label><br/>
                                                    <input required="required" class="texte2" type="text" placeholder="Nom" id="pseudo" name="nom" value="<?= $utilisateur->getNom() ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="pseudo2">Prenom :</label><br/>
                                                    <input required="required" class="texte2" type="text" placeholder="Prenom" id="pseudo2" name="prenom" value="<?= $utilisateur->getPrenom() ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="pays">Pays :</label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Pays" id="pays" name="pays" value="<?= $utilisateur->getPays(); ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="adresse">Adresse :</label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Adresse" id="adresse" name="adresse" value="<?= $utilisateur->getAdresse() ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="code">Code postal : </label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Code postal" id="codepostal" name="codepostal" value="<?= $utilisateur->getCodePostal() ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="ville">Ville :</label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Ville" id="ville"  name="ville" value="<?= $utilisateur->getVille() ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="Mail">Identifiant utilisateur :</label><br/>
                                                    <input required="required" class="texte2" type="text" placeholder="Pseudonyme" id="pseudo" name="pseudo" value="<?= $utilisateur->getPseudo() ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="Mail">Adresse email :</label><br/>
                                                    <input required="required" class="texte2" type="email" placeholder="Mail" id="mail" name="mail" value="<?= $utilisateur->getEmail() ?>" />
                                                </td>
                                            </tr>
                                        </table><br/><br/><br/>

                                        <table class="description4"align="center">
                                            <center class="texte2"><h2>MODIFIEZ VOTRE MOT DE PASSE</h2></center><br>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="mdp">Mot de passe :</label><br/>
                                                    <input class="texte2" type="password" placeholder="Mot de passe" id="mdp" name="mdp"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="mdp2">Confirmez votre mot de passe :</label><br/>
                                                    <input class="texte2" type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2"/>
                                                </td>	
                                            </tr>
                                        </table>
                                    </div>

                                    <hr/>

                                    <div class="bouton_inscrip">
                                        <ul class="inscrip">
                                            <li class="inscrip" align="center"><input class="inscrist" type="submit" name="forminscription" value="valider"/></li>
                                        </ul>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="profil2">
                    <h2 class="titre4">Mon profil</h2>
                    <img class="photo_de_profil" src="<?php if(!empty($utilisateur->getAvatar())) { echo $utilisateur->getAvatar(); } else { echo "public/avatar_client/profil.png"; } ?>"/>		
                    <span class="position4" align="center">
                        <p class="detaill1">NOM UTILISATEUR : <b><?= $utilisateur->getPseudo() ?></b></p>
                        <p class="detaill1">ADRESSE EMAIL : <?= $utilisateur->getEmail() ?></p>
                        <?php if(isset($notif))   {
                            echo $notif;
                        }
                        ?>
                        <span>
                            </div>
                            </div>

                            <div class="article">
                                <h2 class="titre3" align="center">vos articles</h2>
                                <div class="article1">
                                    <div id="barreClub">
                                        <ul class="vente">
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                            <li class="vente"><A HREF=""><p></p></A></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bouton_valider">
                                <ul class="valider">
                                    <li class="valider" align="center"><A href="../page_article/article.php"><p class="valider1">Valider vos articles</p></A></li>
                                </ul>
                            </div>
