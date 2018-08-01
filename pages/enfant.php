<div class="vente">
    <div class="venteS">  
        <?php   foreach (\app\table\articles::getArticles('3') as $article) { //appel de ma methode queryFetchAllClass qui fetch en objet avec la table table/article ?>

            <?= $article->getArticle(); ?>

        <?php    }   ?>
    </div>
</div>