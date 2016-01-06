<?php

class Spectator extends Current_Match {

  public function launch_spectator_client() {
    $command = '"C:\Riot Games\League of Legends\RADS\solutions\lol_game_client_sln\releases\0.0.1.74\
      deploy\League of Legends.exe" ' . '"8394" ' . '"LoLLauncher.exe" ' . '"" ' . '"spectator spectator.euw1.lol.riotgames.com:80 ' .
      $this->get_encryption_key() . ' ' . $this->get_current_game_id() . ' ' . $this->get_platform_id() . '"';

    print $command;

    exec($command . ' 2>&1');
  }

}
