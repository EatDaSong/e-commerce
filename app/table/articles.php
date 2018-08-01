<?php

namespace app\table;

use \app\data;

class articles {
    
    public function __get($key) {
        $method = 'get' . ucfirst($key); // Permet d'appeler les methode sans donner leur nom en entier, permet d'écrire $article->article au lieu de $article->getArticle, cette ligne ajoute un get avant la clef
        $this->$key = $this->$method(); // Permet de ne pas relancer la methode à chaque fois.
        return $this->$key;
    }
    
    public static function getArticles($categorie = '0') {
        if($categorie == 0)    {
            $req = 'SELECT * FROM articles';
        }   else    {
            $req = 'SELECT * FROM articles WHERE categorie = '. $categorie;
        }
        return data::getDB()->queryFetchAllClass($req, __CLASS__);
    }
    
    private function getUrl() { //Construit l'url depuis le queryFetchAllClass
        
        return 'index.php?p=show_article&id=' . $this->id;
        
    }
    
    private function getImg() {    //Construit l'IMG depuis le queryFetchAllClass
        
        return '<div class="container"><img class="vente1" src="public/files/' . $this->image_principale . '"/><div class="overlay"><div class="text">' . $this->prix_htc*1.196 . '€</div></div></div>';
        
    }
    
    public function getArticle() { //Construit l'article à afficher en appelant les methodes URL() et IMG()
        
        return '<a href="' . $this->getUrl() . '">' . $this->getImg() . '</a>';
        
    }
    
}
