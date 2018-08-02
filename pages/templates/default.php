<!DOCTYPE html>
<html>
    <head>
        <title>FashnGeek</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" type="public/image/png" href="images/.png">
        <link rel="stylesheet" href="public/css/Ec.css">
        <link rel="stylesheet" href="public/css/diapo.css">
        <link rel="stylesheet" href="public/css/retour.css">
        <link rel="stylesheet" href="public/css/haut.css">
        <link rel="stylesheet" href="public/css/menu.css">		
        <link rel="stylesheet" href="public/css/vente.css">
        <link rel="stylesheet" href="public/css/overlay.css">
        <link rel="stylesheet" href="public/css/css_connexion_inscription/formul_connexion.css">
        <link rel="stylesheet" href="public/css/css_connexion_inscription/formul _inscription.css">
        <link rel="stylesheet" href="public/css/css_connexion_inscription/bouton_inscrip_connex.css">
        <link rel="stylesheet" href="public/css/inscription&co.css">
        <link rel="stylesheet" href="public/css/deconnexion.css">
        <link rel="stylesheet" href="public/css/bouton_profil.css">
        <link rel="stylesheet" href="public/css/bouton_panier.css">
    </head>
    <body >
        <!-- Bandeau informations -->
        <?php
        if (isset($bandeau)) {
            ?>
            <div class="bandeau">
                <div class="error">
                    <center><?= $bandeau ?></center>
                </div>
            </div>
            <?php
        }
        ?>
        <!--"div id pubS" et la premier page que le visiteur verras -->
        <div id="pubS">

            <div class="pub">                
                <img class="geekS" src="public/images/geek/geekS.jpg">
            </div>
            <div class="pub2">               
                <img class="geekSS" src="public/images/geek/geekS2.jpg">
            </div>

            <!--"div accueil" (est la div central) est la pour pour designer le "h1 class haut" et "p classe haut" 
            et donner un petit style mis en page de l'accueil -->
            <div class="accueil">
            </div>

            <!--"div class pres" est la pour la position du bouton et du h1 et p-->
            <div class="pres">
                <h1 class="haut">fashngeek</h1>
                <p class="haut">chacun son style</p>

                <!-- formulaire de connexion -->
                <div id="overlay">

                    <div id="connexion">

                        <div class="inscription" align="center">

                            <div class="bouton_quitter">
                                <ul class="quitter">
                                    <li class="quitter" align="center"><A HREF="#1" onclick="connecter_off()"><p class="quitter1">x</p></A></li>
                                </ul>
                            </div>
                            <h2 class="titre2">Connexion</h2>
                            <div class="col-12">

                                <form class="formu" method="POST" action="?a=connexion">

                                    <table class="description"align="center">
                                        <tr>

                                            <td align="right">
                                            </td>
                                            <td>
                                                <label class="texte"for="Mail">Identifiant de connexion :</label><br/>
                                                <input required="required" class="texte" placeholder="Mail ou pseudo" id="mail" name="username"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td align="right">
                                            </td>
                                            <td>
                                                <label class="texte"for="mdp">Mot de passe :</label><br/>
                                                <input required="required" class="texte" type="password" placeholder="Mot de passe" id="mdp" name="password"/>
                                            </td>
                                        </tr>

                                    </table>
                                    <hr/>
                                    <br/>
                                    <div class="bouton_inscrip">
                                        <ul class="inscrip">
                                            <li class="inscrip" align="center"><input class="inscrist" type="submit" name="formconnexion" value="Se connecter"/></li>
                                        </ul>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- formulaire de inscription -->
                <div id="overlay2">

                    <div id="connexion">

                        <div class="inscription" align="center">

                            <div class="bouton_quitter">
                                <ul class="quitter">
                                    <li class="quitter" align="center"><A HREF="#2" onclick="inscription_off()"><p class="quitter1">x</p></A></li>
                                </ul>
                            </div>

                            <h2 class="titre2" align="center">Inscription</h2>
                            <div class="col-12">
                                <form class="formu2" method="POST" action="?a=inscription">
                                        <!--<tr>
                                                <td align="right">
                                                        </td>
                                                                <td>
                                                                        <div class="civilite">
                                                                                <label for="civilite">Civilite : </label><br/>
                                                                                <input type="radio" name="civilite" value="" /><label for="pseudo">M.</label>
                                                                                <input type="radio" name="civilite" value="" /><label for="pseudo">Mlle</label>
                                                                                <input type="radio" name="civilite" value="" /><label for="pseudo">Mme</label>
                                                                        </div>
                                                                </td>
                                                        </tr>-->
                                    <div class="scroll">
                                        <table class="description3" align="center">
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="pseudo">Civilite :</label><br/>
                                                    <INPUT type= "radio" name="genre" value="1" checked> Mr.
                                                    <INPUT type= "radio" name="genre" value="2"> Mme.
                                                    <INPUT type= "radio" name="genre" value="3"> Mlle.
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="pseudo">Nom :</label><br/>
                                                    <input required="required" class="texte2" type="text" placeholder="Nom" id="pseudo" name="nom" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="pseudo2">Prenom :</label><br/>
                                                    <input required="required" class="texte2" type="text" placeholder="Prenom" id="pseudo2" name="prenom" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="pays">Pays :</label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Pays" id="pays" name="pays" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="adresse">Adresse :</label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Adresse" id="adresse" name="adresse" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2" for="code">Code postal : </label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Code postal" id="codepostal" name="codepostal" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="ville">Ville :</label><br/>
                                                    <input required="required" class="texte2" type="texte" placeholder="Ville" id="ville"  name="ville" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="date">Date de naissance :</label><br/>
                                                    <input required="required" class="texte2" type="date" name="date">
                                                </td>
                                            </tr>
                                        </table><br/><br/><br/>

                                        <table class="description4"align="center">
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="Mail">Identifiant utilisateur :</label><br/>
                                                    <input required="required" class="texte2" type="text" placeholder="Pseudonyme" id="pseudo" name="pseudo" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="Mail">Adresse email :</label><br/>
                                                    <input required="required" class="texte2" type="email" placeholder="Mail" id="mail" name="mail" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="mail2">Confirmez votre adresse email :</label><br/>
                                                    <input required="required" class="texte2" type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="mdp">Mot de passe :</label><br/>
                                                    <input required="required" class="texte2" type="password" placeholder="Mot de passe" id="mdp" name="mdp"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right">
                                                </td>
                                                <td>
                                                    <label class="texte2"for="mdp2">Confirmez votre mot de passe :</label><br/>
                                                    <input  required="required" class="texte2" type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2"/>
                                                </td>	
                                            </tr>
                                        </table>
                                    </div>
                                    <hr/>
                                    <div class="bouton_inscrip">
                                        <ul class="inscrip">
                                            <li class="inscrip" align="center"><input class="inscrist" type="submit" name="forminscription" value="Je m'inscris"/></li>
                                        </ul>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- bouton pour aller en bas-->
                <div class="bouton_haut">
                    <ul class="haut">
                        <li class="haut" align="center"><A HREF="#menu"><input class="haut" type="submit" value="shop now"/></A></li>
                    </ul>
                </div>

                <!-- fin de la div class pres -->
            </div>

            <!-- fin de la div class pubS -->
        </div>

        <!--"div id menu" est le menu ou ce trouve la connexion, 
        l'inscription et la barre de recherche -->
        <div id="menu" align="center">
            <p class="titre">Fashn.Geek</p>
            <div class="barre_de_recherche">
                <form class="recherche">
                    <input type="submit" value=""/>
                    <input type="search" placeholder="Recherche un article"/>
                </form>
            </div>
            <?php
            if (!empty($_SESSION['user'])) {
                ?>
                <div class="general_lienS" >
                    <div class="lienS" align="left">
                        <ul class="lien2">
                            <li class="lien2"><A HREF="?a=deconnexion"><p>DECONNEXION</p></A></li>
                        </ul>
                    </div>
                    <div class="lien_profilS" align="right">
                        <ul class="lien_profil">
                            <li class="lien_profil"><A HREF="?p=profil"><img class="com2" src="public/images/icon/profil.png"></A></li>
                        </ul>
                    </div>
                    <div class="panier">
                        <ul class="panier1">
                            <li class="panier1"><A HREF="pages/panier.php"><img class="com2" src="public/images/icon/commerce.png"></A></li>
                            <div class="dropdown-content">
                                <a href="#">Article 0</a>
                            </div>
                        </ul>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="general_lien" >
                    <div class="lien" align="right">
                        <ul class="lien1">
                            <li class="lien1 padding:20px"><A HREF="#1" onclick="inscription_on()"><p>S'INSCRIRE</p></A></li>
                            <li class="lien1 padding:20px"><A HREF="#2" onclick="connecter_on()"><p>CONNEXION</p></A></li>
                        </ul>
                    </div>
                    <div class="panierS"align="left">
                        <ul class="panier2">
                            <li class="panier2"><A HREF="4-article/article.php"><img class="com2" src="public/images/icon/commerce.png"></A></li>
                            <div class="dropdown-content">
                                <a href="#">Article 0</a>
                            </div>
                        </ul>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <!--"div class diapo1" est une div general pour positionner le diapo,
        le menu de categorie et les articles -->
        <div class="diapo1">
            <div class="diapoSS" align="right">
                <img class="diapoS" src="public/images/geek/geek1.jpg">
                <img class="diapoS" src="public/images/geek/geek2.jpg">
                <img class="diapoS" src="public/images/geek/geek3.jpg">
                <img class="diapoS" src="public/images/geek/geek4.png">
            </div>
            <div class="categorie">
                <ul class="menu1">
                    <li class="menu1"><A HREF=""><p>NOUVEAUTES</p></A></li>
                    <li class="menu1"><A HREF="?p=femme"><p>FEMME</p></A></li>
                    <li class="menu1"><A HREF="?p=homme"><p>HOMME</p></A></li>
                    <li class="menu1"><A HREF="?p=enfant"><p>ENFANT</p></A></li>
                </ul>
            </div>
            <div class="position_categorie">
                <?= $content; ?>
            </div>			
        </div>

        <!--"div id bouton_retour" est le bouton pour retourner en haut de page-->
        <div class="bouton_retour">
            <ul class="retour">
                <li class="retour" align="center"><A HREF="#pubS"><p class="retour1">Retour en haut</p></A></li>
            </ul>
        </div>

        <div class="descri">
            <div class="descriS">
                <ul class="aide">
                    <li class="aide2">
                        <p>
                            NOS GARANTIES <br/>
                            Garantie Authenticité<br/>
                            Satisfait ou Remboursé<br/>
                            Protections Acheteurs & Vendeurs<br/>
                            Paiement sécurisé<br/>
                            Certificat de conformité<br/>
                        </p>
                    </li>
                    <li class="aide3">
                        <p>
                            VENDRE <br/>
                            Vendez sur FashnGeek<br/>
                            Comment vendre<br/>
                            Nos conseils photo<br/>
                            Guide des tailles<br/>
                            Notre commission<br/>
                        </p>
                    </li>
                    <li class="aide4">
                        <p>
                            BESOIN D'AIDE <br/>
                            Comment ça marche ?<br/>
                            Parrainez vos amis<br/>
                            Assistance<br/>
                        </p>
                    </li>
                    <li class="aide4">
                        <p>
                            À PROPOS <br/>
                            Qui sommes-nous ?<br/>
                            Nos clients nous aiment<br/>
                            Carrières<br/>
                            Presse<br/>
                        </p>
                    </li>
                </ul>
            </div>

            <hr/>
            <p class="bas" align="center">FashnGeek.com</p>
        </div>

    </body>

    <footer class="col-12">
        <p class="copi">© 2018-2018, FashnGeek, Inc. ou ses filiales.</p>
        <div class="diap2S">
            <A HREF="https://twitter.com/"><img class="diap2" src="public/images/icon/twi.png"/></A>
            <A HREF="https://github.com/benarts/forum"><img class="diap2" src="public/images/icon/git.png"/></A>
            <A HREF="https://www.facebook.com/"><img class="diap2" src="public/images/icon/fb2.png"/></A>
        </div>
    </footer>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("diapoS");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 5000);
        }
        function connecter_on() {
            document.getElementById("overlay").style.display = "block";
        }

        function connecter_off() {
            document.getElementById("overlay").style.display = "none";
        }

        function inscription_on() {
            document.getElementById("overlay2").style.display = "block";
        }

        function inscription_off() {
            document.getElementById("overlay2").style.display = "none";
        }

        function copiesearch() {

            document.forms["formu2"].elements["recherche"].value = "\\desserts"
            document.forms['formu2'].submit();

        }
    </script>

</html>