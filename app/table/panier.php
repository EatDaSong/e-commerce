<?php

namespace app;

class panier {
    
 //   private 'nbr_by_id';
 //   private 'nbr_article';
 //   private 'prix_total';
 //   private ''

    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
    }

    public function add($article_id) {
        if (isset($_SESSION['panier'][$article_id])) {
            $_SESSION['panier'][$article_id] ++;
            var_dump($_SESSION);
        } else
            $_SESSION['panier'][$article_id] = 1;
    }

    public function del($article_id) {
        if (isset($_SESSION['panier'][$article_id])) {
            $_SESSION['panier'][$article_id] --;
            var_dump($_SESSION);
        } else
            die('L\'article n\'existe pas dans le panier');
    }

    private function totalPanier($id_article) {
        $total = 0;
        foreach ($_SESSION['panier'] as $article_id => $article) {
            
        }
    }

}