<?php

session_start();
require_once __DIR__ . '/functions.php';

$RESULT_FILE = 'result_page.php';

$errors = [];

$pwd_length = $_GET['pwd_length'] ?? NULL;
$allow_char_repeat = $_GET['allow_char_repeat'] ?? true;

if ($pwd_length) {
  if ($pwd_length >= 8 && $pwd_length <= 52) {
    $_SESSION['password'] = generate_password($pwd_length);
    header("Location: $RESULT_FILE");
  } else {
    $errors['invalid-length'] = 'Password length should be a value between 8 and 52';
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include __DIR__ . '/includes/layouts/head.php' ?>

<body>
  <div class="container mt-5">

    <header class="my-5">
      <h1>STRONG PASSWORD GENERATOR</h1>
    </header>

    <?php if (!empty($errors)) : ?>
      <div class="alert alert-warning">
        <?php foreach ($errors as $error)
          echo $error;
        ?>
      </div>
    <?php endif ?>

    <form action="" method="GET" class="mb-5" novalidate>
      <!-- PWD LENGTH -->
      <div class="mb-3">
        <label for="pwd_length">Desired length of password (min 8; max 52):</label>
        <input type="number" id="pwd_length" name="pwd_length" min="8" max="52" value="<?= $pwd_length ?? 8 ?>">
      </div>
      <div class="mb-3">
        <div>
          <div>Allow characters repetition</div>
          <input type="radio" name="allow_char_repeat" id="allow_char_repeat_yes" value="1" <?= $allow_char_repeat ? 'checked' : '' ?>>
          <label for="allow_char_repeat_yes">YES</label>
        </div>
        <div>
          <input type="radio" name="allow_char_repeat" id="allow_char_repeat_no" value="0" <?= $allow_char_repeat ? '' : 'checked' ?>>
          <label for="allow_char_repeat_no">NO</label>
        </div>
      </div>
      <!-- SUBMIT BUTTON -->
      <div>
        <button class="btn btn-primary" type="submit">Generate</button>
      </div>
    </form>
  </div>
</body>

</html>