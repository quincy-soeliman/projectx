<?php
require_once 'app/init.php';
include_once 'templates/header.php';

$match_history = new MatchHistory($summoner);
$match_history->get_matches();
?>

<!-- Content -->

<?php include_once 'templates/footer.php'; ?>
