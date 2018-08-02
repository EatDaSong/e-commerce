<?php
if (isset($bandeau)) {
    ?>
    <div class="bandeauprofil">
        <div class="error">
            <center><?= $bandeau ?></center>
        </div>
    </div>
    <?php
}
?>
<html>
    <head>
        <title>Profil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" type="image/png" href="public/images/icon.png">
        <link rel="stylesheet" href="public/css/css_profil/formul.css">
        <link rel="stylesheet" href="public/css/css_profil/retour.css"> 
        <link rel="stylesheet" href="public/css/css_profil/valider_article.css"> 
        <link rel="stylesheet" href="public/css/css_profil/article.css"> 		
        <link rel="stylesheet" href="public/css/css_profil/diapo.css">
        <link rel="stylesheet" href="public/css/css_connexion_inscription/formul _inscription.css">
        <link rel="stylesheet" href="public/css/css_connexion_inscription/bouton_inscrip_connex.css">
        <link rel="stylesheet" href="public/css/css_profil/overlay.css">
        <link rel="stylesheet" href="public/css/css_profil/changer_de_profil.css">
        <link rel="stylesheet" href="public/css/css_profil/inscription&co.css">
    </head>
    <body >

        <div class="menu"  align="center">
            <div class="titre">
                <p class="titre">Fashn.Geek</p>
                <div class="lien">
                    <ul class="lien1">
                        <li class="lien1"><A HREF="index.php"><p>ACCUEIL</p></A></li>
                        <li class="lien1" ><A HREF=""><p>SE DECONNECTER</p></A></li>
                    </ul>
                </div>
                <div class="nom">
                    <p class="nom"><img class="com1" src="public/images/profil.png"></p>
                </div>
                <?php 
                if($utilisateur->isAdmin()) {
                ?>
                    <div class="admin">
                        <ul class="admin1">
                            <li class="admin1"><A HREF="page_admin/admin.php"><p>Accéder à la page admin >></p></A></li>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>


<?= $content ?>	

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
                                            <A HREF="https://twitter.com/"><img class="diap2" src="../../../public/images/twi.png"/></A>
                                            <A HREF="https://github.com/benarts/forum"><img class="diap2" src="../../../public/images/git.png"/></A>
                                            <A HREF="https://www.facebook.com/"><img class="diap2" src="../../../public/images/fb2.png"/></A>
                                        </div>
                                    </footer>
                                    <script>
                                        function inscription_on() {
                                            document.getElementById("overlay2").style.display = "block";
                                        }

                                        function inscription_off() {
                                            document.getElementById("overlay2").style.display = "none";
                                        }
                                    </script>
                                    </html>