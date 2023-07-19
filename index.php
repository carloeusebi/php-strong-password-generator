<?php
$hello = 'hello world';
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
    <form action="" method="GET">
      <!-- PWD LENGTH -->
      <div>
        <label for="pwd_length">Desired length of password (8-26):</label>
        <input type="num" id="pwd_length" name="pwd_length" value="<?= $pwd_length ?? 8 ?>">
      </div>
      <!-- SUBMIT BUTTON -->
      <div>
        <button class="btn btn-primary" type="submit">Generate</button>
      </div>
    </form>
  </div>
</body>

</html>