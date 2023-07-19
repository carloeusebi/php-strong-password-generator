<?php

require_once __DIR__ . '/functions.php';

if (isset($_GET['reset'])) {
  unset($_GET);
}

$pwd_length = $_GET['pwd_length'] ?? NULL;

if ($pwd_length >= 8) {
  $password = generate_password($pwd_length);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css' integrity='sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==' crossorigin='anonymous' />
</head>

<body>
  <div class="container mt-5">
    <form action="" method="GET" class="mb-5">
      <!-- PWD LENGTH -->
      <div>
        <label for="pwd_length">Desired length of password (min 8):</label>
        <input type="number" id="pwd_length" name="pwd_length" min="8" value="<?= $pwd_length ?? 8 ?>">
      </div>
      <!-- SUBMIT BUTTON -->
      <div>
        <button class="btn btn-primary" type="submit">Generate</button>
        <button class="btn btn-secondary" type="submit" name="reset">Reset</button>

      </div>
    </form>
    <?php if (isset($password)) : ?>
      <h2>Your generated password is:</h2>
      <div class="h2"><?= $password ?></div>
    <?php endif ?>
  </div>
</body>

</html>