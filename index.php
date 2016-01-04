<?php
require_once 'app/init.php';
include_once 'templates/header.php';


$region = 'euw';
$summoner = 'itanimulli';
$url = BASE_URL . '/api/lol/' . $region .'/v1.4/summoner/by-name/' . $summoner . '?api_key=' . API_KEY;
$request = file_get_contents($url);

$data = json_decode($request);
?>

<div class="row">
  <!-- Content -->
  <?php
  var_dump($data);
  ?>
</div>

<?php include_once 'templates/footer.php'; ?>
