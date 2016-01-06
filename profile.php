<?php
require_once 'app/init.php';
include_once 'templates/header.php';

if (isset($_POST['summoner-name'])) {
  $summoner_name = $_POST['summoner-name'];
  $summoner = new Profile($summoner_name);
} else {
  header('Location: index.php');
}
?>

<div class="profile-header">
  <div class="row">
    <div class="summoner-icon">
      <?php print $summoner->get_profile_icon(); ?>
    </div>

    <div class="summoner-info">
      <h2><?php print $summoner->get_summoner_name(); ?></h2>

      <p>Lvl: <?php print $summoner->get_summoner_level(); ?></p>
    </div>
  </div>
</div>

<?php include_once 'templates/footer.php'; ?>
