<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>

  <div class="main-content">
    <div class="container">
      <?php
        if (isset($_GET['msg'])) {
          $msg = $_GET['msg'];

          if (isset($_GET['msg_type'])) {
            $msg_type = $_GET['msg_type'];

            switch ($msg_type) {
              case 'success':
                print '<div class="alert alert-success" role="alert">' . $msg . '</div>';
                break;
              case 'error':
                print '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
                break;
              default:
                print '<div class="alert alert-info" role="alert">' . $msg . '</div>';
            }
          } else {
            print '<div class="alert alert-info">' . $msg . '</div>';
          }
        }
      ?>
