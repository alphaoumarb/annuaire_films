<?php

class IndexController extends Controller {
   
    public function display() {
        $films = Film::getList();
        $allfilms =  Film::getAllFilms();
    
        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            'films'  => $films,
            'allfilms' => $allfilms
        ));
    }
}
