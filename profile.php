<?php
require_once 'app/init.php';
include_once 'templates/header.php';

if (isset($_POST['summoner-name']) && !empty($_POST['summoner-name'])) {
  $summoner_name = $_POST['summoner-name'];
  $summoner = new Profile($summoner_name);
} else {
  header('Location: index.php');
}
?>

<div class="search">
  <div class="row">
    <form action="profile.php" method="POST">
      <div class="form-group">
        <input type="text" name="summoner-name" class="form-control" placeholder="Summoner" required>
      </div>
    </form>
  </div>
</div>

<div class="profile-header">
  <div class="row">
    <?php print 'ID: ' . $summoner->get_summoner_id(); ?>

    <?php if ($summoner->get_profile_icon_id() > 0): ?>
      <div class="summoner-icon">
        <?php print $summoner->get_profile_icon(); ?>
      </div>
    <?php endif; ?>

    <?php if ($summoner->get_summoner_id() > 0): ?>
      <div class="summoner-info">
        <h2><?php print $summoner->get_summoner_name(); ?></h2>
        <p>Lvl: <?php print $summoner->get_summoner_level(); ?></p>
      </div>
    <?php endif; ?>

    <?php print $summoner->get_ranked_solo_5x5_form(); ?>
  </div>
</div>

<?php include_once 'templates/footer.php'; ?>
