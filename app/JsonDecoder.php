<?php 

namespace App;

class JsonDecoder
{
  protected $json_file;
  
  public function __construct($file_location)
  {
    $this->json_file = file_get_contents($file_location);
  }
  
  public function decode()
  {
    $decoded = json_decode($this->json_file, true);
    asort($decoded);
    return $decoded;
  }
}