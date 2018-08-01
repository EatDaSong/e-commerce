<?php 
require '../_header.php';
?>
<html>
    <head>
		<title>Article</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="icon" type="image/png" href="../images/icon.png">
		<link rel="stylesheet" href="../4-article/css/formul.css"> 
		<link rel="stylesheet" href="../4-article/css/achat.css">
		<link rel="stylesheet" href="../4-article/css/etape.css">
		<link rel="stylesheet" href="../4-article/css/retour.css">
		<link rel="stylesheet" href="../4-article/css/inscription&co.css">
    </head>
	<body >
	
		<div class="position1" align="center">
			<div class="diapo">
				<img class="cadre" src="../images/diapo/fondS.jpg">	
			</div>
			<div class="container3">
				<img class="text1" src="../images/diapo/logo.png">
				<span class="text2">GeeK</span>
			</div>
		</div>
		
		<div class="menu"  align="center">
		
			<div class="titre">
				<ul class="titreS">
					<li class="titreS"><p>PANIER/</p></li>
					<li class="titreS"><p>ADRESSES ET LIVRAISON/</p></li>
					<li class="titreS"><p>MODE DE PAIIMENT/</p></li>
					<li class="titreS"><p>CONFIRMATION ET REGLEMENT/</p></li>
				</ul>
			</div>
			
		</div>
		
		<div class="diapo1">
			<div id="barreClub">
				<ul class="vente">

					<?php foreach($_SESSION['panier'] as $article => $nombre) :  ?>
						<?php $info_article = $DB->query('SELECT * FROM article WHERE id_article = ?', array($article)); ?>
					<li class="vente"><A HREF=""><p><?= $info_article[0]->name ?><img src="../images/<?=$article?>.jpg"> <?=$info_article[0]->prix; ?></p>
						<h6><?php $_SESSION['panier'][$article->id_article] ?></h6></A></li>

				<?php endforeach ?>


					<!-- <li class="vente"><A HREF=""><p></p></A></li>
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
					<li class="vente"><A HREF=""><p></p></A></li> -->
				</ul>
			</div>
		</div>
		<div class="bouton_retour">
			<ul class="retour">
				<li class="retour" align="center"><A HREF="../index.php"><p class="retour1">Continuer mes achats</p></A></li>
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
			<A HREF="https://twitter.com/"><img class="diap2" src="../images/twi.png"/></A>
			<A HREF="https://github.com/benarts/forum"><img class="diap2" src="../images/git.png"/></A>
			<A HREF="https://www.facebook.com/"><img class="diap2" src="../images/fb2.png"/></A>
		</div>
	</footer>
</html>