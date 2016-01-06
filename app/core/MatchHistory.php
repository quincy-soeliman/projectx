<?php

class MatchHistory extends Summoner {

  private $matches, $matches_id;

  public function get_matches() {
    $user = $this->get_summoner_id();
    $region = "euw";

    if ( $user ) {
      $data = BASE_URL . "/api/lol/" . $region . "/v2.2/matchlist/by-summoner/" . $user . API_KEY;
      $req = file_get_contents( $data );
      $res = json_decode( $req, true );

      foreach( $res as $r ) {
        $matches = $r['matches'];
      }

      var_dump( $matches );
    }

    return false;
  }

  public function get_shop() {
    $user = $this->get_summoner_id();

    if ( $user ) {
      $data = BASE_URL . "/api/lol/{region}/v2.2/match/{matchId}" . API_KEY;
      $req = file_get_contents( $data );
      $res = json_decode( $req );


    }

    return false;
  }

  public function get_champion() {
    $user = $this->get_summoner_id();

    if ( $user ) {

    }

    return false;
  }

  public function get_stats() {
    $user = $this->get_summoner_id();

    if ( $user ) {

    }

    return false;
  }

}
