<?php

class Film extends Model {
   public $id_films, $titre, $annee, $synopsis, $images, $genre, $realisateur;
    public static function getGenderFromFilm($id_film) {
$db = Database::getInstance();
$sql = "SELECT * FROM genres as g
INNER JOIN films_as_genres as h
WHERE g.id_genres = h.id_genres
AND h.id_films = :id_films";
$stmt = $db->prepare($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->bindValue(':id_films', $id_film, PDO::PARAM_INT);
$stmt->execute();
return $stmt->fetchAll();

    }

public static function getRealFromFilm($id_film) {
    $db = Database::getInstance();
    $sql = "SELECT * FROM realisateurs as r
    INNER JOIN films_as_realisateurs as h
    WHERE r.id_realisateurs = h.id_realisateurs
    AND h.id_films = :id_films";
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->bindValue(':id_films', $id_film, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
    }

   public static function getFromSlug( $slug ) {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films WHERE slug = :slug";
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
      $stmt->execute(array(":slug" => $slug));
      return $stmt->fetch();
   }



   public static function getList() {
      $db = Database::getInstance();
      $sql = "SELECT * FROM films order by rand() limit 3";
      $stmt = $db->query($sql);
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll();

   }


   public static function getAllFilms() {
    $db = Database::getInstance();
    $sql = "SELECT * FROM films order by rand()";
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();

 }


}








