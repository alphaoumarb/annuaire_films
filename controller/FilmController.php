<?php

class FilmController extends Controller {
    public function display() {
        $slug = $this->route["params"]["slug"];
        $film = Film::getFromSlug($slug);
        $genres = Film::getGenderFromFilm($film['id_films']);
        $realisateurs = Film::getRealFromFilm($film['id_films']);

        $template = $this->twig->loadTemplate('/Film/display.html.twig');
        echo $template->render(array(
            'film'  => $film,
            'genres' => $genres,
            'realisateurs'=> $realisateurs
        ));
    }
}
