<?php
require_once 'app/init.php';
include_once 'templates/header.php';
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

<!-- Content -->

<?php include_once 'templates/footer.php'; ?>
