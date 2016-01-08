<?php

class Summoner {

  private $db;
  private $summoner;
  private $id;
  private $name;
  private $profile_icon_id;
  private $revision_date;
  private $summoner_level;

  public function __construct($summoner) {
    $this->db = new Database();
    $this->db->connect();

    $this->summoner = $summoner;
    $this->get_info($this->summoner);
  }

  public function get_info($summoner) {
    $summoner_name = str_replace(' ', '%20', $summoner);

    if (!empty($summoner_name)) {
      $url = BASE_URL . '/api/lol/euw/v1.4/summoner/by-name/' . $summoner_name . '?api_key=' .  API_KEY;
      $request = file_get_contents($url);
      $data = json_decode($request, true);

      foreach ($data as $value) {
        $this->id = $value['id'];
        $this->name = $value['name'];
        $this->profile_icon_id = $value['profileIconId'];
        $this->revision_date = $value['revisionDate'];
        $this->summoner_level = $value['summonerLevel'];
      }

      return true;
    }

    return false;
  }

  public function get_summoner_id() {
    return $this->id;
  }

  public function get_summoner_name() {
    return $this->name;
  }

  public function get_profile_icon_id() {
    return $this->profile_icon_id;
  }

  public function get_revision_date() {
    return $this->revision_date;
  }

  public function get_summoner_level() {
    return $this->summoner_level;
  }

}
