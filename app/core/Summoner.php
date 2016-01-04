<?php

class Summoner {

  private $db;

  private $id;
  private $name;
  private $profile_icon_id;
  private $summoner_level;

  public function __construct() {
    $this->db = new Database();
    $this->db->connect();
  }

  public function get_summoner_info($summoner, $region) {
    $url = BASE_URL . '/api/lol/' . $region .'/v1.4/summoner/by-name/' . $summoner . '?api_key=' . API_KEY;
    $request = file_get_contents($url);

    json_decode($request);
  }

}
