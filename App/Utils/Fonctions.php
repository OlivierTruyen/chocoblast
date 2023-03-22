<?php

    namespace App\Utils;

    class Fonctions{
        //Nettoyage des entrées de formulaire
        public static function CleanInput($value){
            return htmlspecialchars((strip_tags(trim($value))));
        }
    }





?>