<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengguna</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <h1>Daftar Pengguna</h1>
    <table class=>"user-table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
              <a href="detail.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn-small">Lihat Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>

</html>

</body>

</html>