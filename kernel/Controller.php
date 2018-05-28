<?php
require_once 'vendor/autoload.php';

class Controller {
    protected $route;
   
    public $loader;
    public $twig;

    public function __construct( $route ) {
        $this->route = $route;
      
        $this->loader = new Twig_Loader_Filesystem('view');
        $this->twig = new Twig_Environment($this->loader, array(
            'cache' => false,
        ));
    }
}
