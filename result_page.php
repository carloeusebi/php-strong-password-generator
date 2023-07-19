<?php
session_start();

$password = $_SESSION['password'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/includes/layouts/head.php' ?>

<body>

</body>
<div class="container mt-5">
  <a href="index.php">Indietro</a>
  <?php if (isset($password)) : ?>
    <h2>Your generated password is:</h2>
    <div class=" h2"><?= $password ?>
    </div>
  <?php endif ?>
</div>

</html>