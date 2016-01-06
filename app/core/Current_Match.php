<?php

class Current_Match extends Summoner {

  private $current_game_id, $current_game_map_id, $current_game_length,
    $platform_id, $encryption_key;

  public function get_current_match_info() {
    $summoner_id = $this->get_summoner_id();

    if ($summoner_id) {
      $url = BASE_URL . '/observer-mode/rest/consumer/getSpectatorGameInfo/EUW1/' . $summoner_id . API_KEY;
      $request = file_get_contents($url);
      $array = json_decode($request, true);

      if ($array) {
        foreach ($array as $data) {
          $this->current_game_id = $array['gameId'];
          $this->current_game_map_id = $array['mapId'];
          $this->current_game_length = $array['gameLength'];
          $this->platform_id = $array['platformId'];
          $this->encryption_key = $array['observers']['encryptionKey'];
        }

        return true;
      }
    }

    return false;
  }

  public function get_current_game_id() {
    return $this->current_game_id;
  }

  public function get_platform_id() {
    return $this->platform_id;
  }

  public function get_encryption_key() {
    return $this->encryption_key;
  }

}
