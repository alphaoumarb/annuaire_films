<?php

class View {
   protected $_route;
   protected $data = array();

   public function __construct( $route ) {
      $this->_route = $route;
   }

   public function __set($key, $value) {
      $this->data[$key] = $value;
   }
   
   public function __get($key) {
      return $this->data[$key];
   }


}

