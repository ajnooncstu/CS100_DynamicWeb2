<?php
session_start(); // enables $_SESSION

if (!isset($_SESSION['entries'])) {
  $_SESSION['entries'] = []; // init once per session
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name  = trim($_POST['name']  ?? '');
  $email = trim($_POST['email'] ?? '');
  $city  = trim($_POST['city']  ?? '');

  if ($name === '' || $email === '' || $city === '') {
    $errors[] = 'Please fill in all fields!';
  } else {
    $_SESSION['entries'][] = [
      'name'  => $name,
      'email' => $email,
      'city'  => $city
    ];
    // clear posted values so inputs appear empty
    $_POST = [];
  }
}
function h($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>PHP Registration Form with no data persistence</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow-sm p-4">
    <h3 class="mb-4 text-primary">Registration Form</h3>

    <?php if ($errors): ?>
      <div class="alert alert-warning"><?= h(implode(' ', $errors)) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control" id="name" name="name" value="<?= h($_POST['name'] ?? '') ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" id="email" name="email" type="email" value="<?= h($_POST['email'] ?? '') ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="city">City</label>
        <input class="form-control" id="city" name="city" value="<?= h($_POST['city'] ?? '') ?>">
      </div>
      <button class="btn btn-primary w-100" type="submit">Submit</button>
    </form>

    <div class="mt-4">
      <h5>Submitted Data (this session only):</h5>
      <div id="output">
        <?php if (empty($_SESSION['entries'])): ?>
          <div class="text-muted">No entries yet.</div>
        <?php else: foreach ($_SESSION['entries'] as $r): ?>
          <div class="border p-3 bg-white rounded mb-2">
            <strong>Name:</strong> <?= h($r['name']) ?><br>
            <strong>Email:</strong> <?= h($r['email']) ?><br>
            <strong>City:</strong> <?= h($r['city']) ?>
          </div>
        <?php endforeach; endif; ?>
      </div>
    </div>

  </div>
</div>
</body>
</html>
