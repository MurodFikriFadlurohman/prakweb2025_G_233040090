<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h1>Detail Profil Pengguna</h1>
    <div class="profile-card">
      <h1>Selamat datang, <?= htmlspecialchars($user['name']) ?></h1>
      <p>Email: <?= htmlspecialchars($user['email']) ?></p>
      <a href="index.php" class="btn">Kembali ke daftar</a>
    </div>
</body>

</html>