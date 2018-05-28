<?php

class Kernel {
   public static function autoload($class) {
      if(file_exists(ROOT."/kernel/$class.php"))
         require_once(ROOT."/kernel/$class.php");
      else if(file_exists(ROOT."/controller/$class.php"))
         require_once(ROOT."/controller/$class.php");
      else if(file_exists(ROOT."/model/$class.php"))
         require_once(ROOT."/model/$class.php");
   }


   public static function run() {
      // Autoload
      spl_autoload_register(array("Kernel", "autoload"));

      // Analyser la requete
      $query = isset($_GET["query"]) ? $_GET["query"] : "";
      $route = Router::analyze( $query );

      // Instancier le controleur et
      // executer l'action
      $class = $route["controller"]."Controller";
      if(class_exists($class)) {
         $controller = new $class ($route);
         $method = array($controller, $route["action"]);
         if( is_callable( $method ))
            call_user_func($method);
      }

      // Gestion des erreurs

   }
   
}
