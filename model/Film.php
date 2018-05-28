<?php

class Film extends Model {
   public $id_films, $titre, $annee, $synopsis, $images;

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

}



