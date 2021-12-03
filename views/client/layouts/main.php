<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php include_once './views/client/layouts/styles.php'?>
</head>
<body>
  <?php include_once "./views/client/layouts/header.php"?>
  <div id="root">
    <?php include_once $businessView?>
  </div>
  <?php include_once "./views/client/layouts/footer.php"?>
</body>
</html>