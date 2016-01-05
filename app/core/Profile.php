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

  public function render_form() {
    $form = '<div class="profile-form">';

    $form .= '';
    $form .= '';
    $form .= '';

    $form .= '</div>';

    return $form;
  }

}
