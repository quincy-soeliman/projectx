<?php

class Profile extends Summoner {

  // Ranked Solo 5x5 variables
  private $ranked_solo_5x5_name, $ranked_solo_5x5_tier,
    $ranked_solo_5x5_division, $ranked_solo_5x5_lp, $ranked_solo_5x5_wins,
    $ranked_solo_5x5_losses, $ranked_solo_5x5_is_hot_streak, $ranked_solo_5x5_is_veteran,
    $ranked_solo_5x5_is_fresh_blood, $ranked_solo_5x5_is_inactive, $ranked_solo_5x5_total_games;

  // Ranked Team 5x5 variables
  // -

  // Ranked Team 3x3 variables
  // -

  public function __construct($summoner) {
    parent::__construct($summoner);
  }

  public function get_profile_icon() {
    $profile_icon_id = $this->get_profile_icon_id();

    if ($profile_icon_id) {
      $profile_icon_format = '.png';
      $profile_icon_url = DD_BASE_URL . '/cdn/5.24.2/img/profileicon/' . $profile_icon_id . $profile_icon_format;

      $profile_icon = '<img src="' . $profile_icon_url . '" class="profile-icon">';

      return $profile_icon;
    }

    return false;
  }

  public function get_tier_icon($tier, $division) {
    $tier_icon_format = '.png';
    $tier = strtolower($tier);
    $division = strtolower($division);

    if ($tier == 'challenger' || $tier == 'master') {
      $tier_icon_url = '/images/tier-icons/base_icons/' . $tier . $tier_icon_format;
    } else {
      $tier_icon_url = '/images/tier-icons/tier_icons/' . $tier . '_' . $division . $tier_icon_format;
    }

    $tier_icon = '<img src="' . $tier_icon_url . '" class="tier-icon">';

    return $tier_icon;
  }

  public function calculate_total_games($wins, $losses) {
    $total_games = $wins + $losses;

    return $total_games;
  }

  public function search_queue($array, $queue_name) {
    foreach ($array as $data) {
      if ($data['queue'] == $queue_name) {
        return $data;
      }
    }

    return false;
  }

  public function get_ranked_solo_5x5_info() {
    $summoner_id = $this->get_summoner_id();
    $summoner_lvl = $this->get_summoner_level();

    if ($summoner_id && $summoner_lvl == 30) {
      $url = BASE_URL . '/api/lol/euw/v2.5/league/by-summoner/' . $summoner_id . '/entry' . '?api_key=' . API_KEY;
      $request = file_get_contents($url);

      $data = json_decode($request, true);

      if ($data) {
        $data = $this->search_queue($data[$summoner_id], 'RANKED_SOLO_5x5');

        $this->ranked_solo_5x5_name = $data['name'];
        $this->ranked_solo_5x5_tier = $data['tier'];
        $this->ranked_solo_5x5_division = $data['entries'][0]['division'];
        $this->ranked_solo_5x5_lp = $data['entries'][0]['leaguePoints'];
        $this->ranked_solo_5x5_wins = $data['entries'][0]['wins'];
        $this->ranked_solo_5x5_losses = $data['entries'][0]['losses'];
        $this->ranked_solo_5x5_is_hot_streak = $data['entries'][0]['isHotStreak'];
        $this->ranked_solo_5x5_is_veteran = $data['entries'][0]['isVeteran'];
        $this->ranked_solo_5x5_is_fresh_blood = $data['entries'][0]['isFreshBlood'];
        $this->ranked_solo_5x5_is_inactive = $data['entries'][0]['isInactive'];

        $this->ranked_solo_5x5_total_games = $this->calculate_total_games(
          $this->ranked_solo_5x5_wins, $this->ranked_solo_5x5_losses);

        return true;
      }
    }

    return false;
  }

  public function get_ranked_solo_5x5_form() {
    if ($this->get_ranked_solo_5x5_info()) {
      $form = $this->render_ranked_solo_5x5_form();

      return $form;
    }

    return false;
  }

  public function render_ranked_solo_5x5_form() {
    $form = '<div class="ranked_solo_5x5_form">';

    $form .= '<h2>' . $this->ranked_solo_5x5_name . '</h2>';
    $form .= $this->get_tier_icon($this->ranked_solo_5x5_tier, $this->ranked_solo_5x5_division);
    $form .= '<p>' . $this->ranked_solo_5x5_tier . ' ' . $this->ranked_solo_5x5_division . '</p>';
    $form .= '<p>LP: ' . $this->ranked_solo_5x5_lp . '</p>';
    $form .= '<p>Total games: ' . $this->ranked_solo_5x5_total_games . '</p>';
    $form .= '<p>Wins: ' . $this->ranked_solo_5x5_wins . ' Losses: ' . $this->ranked_solo_5x5_losses . '</p>';

    $form .= '</div>';

    return $form;
  }

  public function get_ranked_team_5x5_info() {}

  public function get_ranked_team_3x3_info() {}
}
