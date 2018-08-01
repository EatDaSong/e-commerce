<?php

namespace app;

/**
 * Description of form
 * 
 * Class de création et géstion de formulaires
 * 
 * @author Stéphane LAVIGNE
 */

class form {
    
    private $method;
    private $cible;
    public $surround = 'p';
    
    public function __construct($method,$cible){
        $this->method = $method;
        $this->cible = $cible;
    }
    
    public function begin_form($class = ''){ //Début formulaire
        return '<form class="' . $class . '" method="'.$this->method.'" action="'.$this->cible.'">';
    }
    
    public function end_form() { //Fin formulaire
        return '</form>';
    }
    
    private function surround($html){  //Met des tag défini plus tôt
        return '<'.$this->surround.'>'.$html.'</'.$this->surround.'>';
    }
    
    public function input($name, $type, $placeholder = '', $class = ''){ //Création d'un input
        return $this->surround('<input class="' . $class . '" type="' . $type . '" name="' . $name . '" placeholder="' . $placeholder . '">');
    }
    
    public function submit($msg, $class = ''){ //Création d'un submit
        return $this->surround('<button class="' . $class . '" type="submit">'.$msg.'</button>');
    }
    
    public function hidden($name, $value){ //Création d'un hidden
        return $this->surround('<input type="hidden" name="'.$name.'" value="'.value.'">');
    }
    
    public function file_input($name)    {
        return $this->surround('<input type="file" name="'.$name.'">)');
    }
    
}