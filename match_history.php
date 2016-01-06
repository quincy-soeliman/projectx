<?php
require_once 'app/init.php';
include_once 'templates/header.php';

if (isset($_POST['summoner-name']) && !empty($_POST['summoner-name'])) {
  $summoner_name = $_POST['summoner-name'];
  $match_history = new MatchHistory($summoner_name);
}
?>

<div class="search">
  <div class="row">
    <form action="match_history.php" method="POST">
      <div class="form-group">
        <input type="text" name="summoner-name" class="form-control" placeholder="Summoner" required>
      </div>
    </form>
  </div>
</div>

<!-- Content -->

<?php include_once 'templates/footer.php'; ?>
