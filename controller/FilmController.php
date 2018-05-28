<?php

class FilmController extends Controller {
    public function display() {
        $slug = $this->route["params"]["slug"];
        $film = Film::getFromSlug($slug);
        
        $template = $this->twig->loadTemplate('/Film/display.html.twig');
        echo $template->render(array(
            'film'  => $film
        ));
    }
}
