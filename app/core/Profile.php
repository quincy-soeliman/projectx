<?php

class Profile extends Summoner {

  public function __construct($summoner) {
    parent::__construct($summoner);
  }

  public function get_profile_icon() {
    $profile_icon_id = $this->get_profile_icon_id();
    $profile_icon_format = '.png';
    $profile_icon_url = DD_BASE_URL . '/cdn/5.24.2/img/profileicon/' . $profile_icon_id . $profile_icon_format;

    $profile_icon = '<img src="' . $profile_icon_url . '" class="profile-icon">';

    return $profile_icon;
  }

  public function get_ranked_info() {
    $summoner_id = $this->get_summoner_id();
    $url = BASE_URL . '/api/lol/euw/v2.5/league/by-summoner/' . $summoner_id . '/entry' . API_KEY;
    $request = file_get_contents($url);
    $data = json_decode($request, true);

    foreach ($data[$summoner_id] as $key => $value) {
      //
    }

    return $data;
  }

  public function render_form() {
    $form = '<div class="profile-form">';

    $form .= '';
    $form .= '';
    $form .= '';

    $form .= '</div>';

    return $form;
  }

}
