<div class="vente">
    <div class="venteS">  
        <?php   foreach (\app\table\articles::getArticles() as $article) { //appel de ma methode queryFetchAllClass qui fetch en objet avec la table table/article ?>

            <?= $article->article; ?>
        
        <?php    }   ?>
    </div>
</div>