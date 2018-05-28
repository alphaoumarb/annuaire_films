<?php

class Router {
   public static function analyze( $query ) {//route vers la page erreur
      $result = array(
         "controller" => "Error",
         "action" => "error404",
         "params" => array()
      );

      if( $query === "" || $query === "/" ) {//route vers la page d'accueil
         $result["controller"] = "Index";
         $result["action"] = "display";

      } else {
         $parts = explode("/", $query);
         if($parts[0] == "film" && count($parts) == 2) {//route vers fiche film
            $result["controller"] = "Film";
            $result["action"] = "display";
            $result["params"]["slug"] = $parts[1];            
         }
      }
      return $result;

   }

}
