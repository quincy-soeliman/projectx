<?php
require_once 'app/init.php';
include_once 'templates/header.php';

if (isset($_POST['summoner-name'])) {
  $summoner_name = $_POST['summoner-name'];

  $summoner = new Summoner($summoner_name);
  $summoner_name = $summoner->get_name();
  $summoner_id = $summoner->get_id();

  print $summoner_name;
  print $summoner_id;
}
?>

<div class="row">
  <form method="POST">
    <div class="form-group">
      <input type="text" name="summoner-name" class="form-control" placeholder="Summoner" required>
    </div>
  </form>
</div>

<?php include_once 'templates/footer.php'; ?>
