<?php

class IndexController extends Controller {
   
    public function display() {
        $films = Film::getList();
    
        $template = $this->twig->loadTemplate('/Index/display.html.twig');
        echo $template->render(array(
            'films'  => $films
        ));
    }
}
