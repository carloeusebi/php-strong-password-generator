<?php

session_start();
require_once __DIR__ . '/functions.php';

$RESULT_FILE = 'result_page.php';


$pwd_length = $_GET['pwd_length'] ?? NULL;

if ($pwd_length >= 8) {
  $_SESSION['password'] = generate_password($pwd_length);
  header("Location: $RESULT_FILE");
} else {
  //todo 
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/includes/layouts/head.php' ?>

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
      </div>
    </form>
  </div>
</body>

</html>