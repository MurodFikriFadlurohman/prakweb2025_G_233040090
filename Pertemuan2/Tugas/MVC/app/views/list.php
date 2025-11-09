<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title>Daftar Pengguna</title>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
  <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-center mb-6">Daftar Pengguna</h1>

    <?php Flasher::flash(); ?>

    <!-- Bagian Cari & Tambah -->
    <div class="flex justify-between items-center mb-6 gap-3">
      <form action="index.php?action=cari" method="post" class="flex w-full gap-3">
        <input type="text" name="keyword" id="keyword" placeholder="Cari pengguna..."
          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-blue-400 outline-none">
        <button type="submit"
          class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition">Cari</button>
      </form>
      <button onclick="openModal()" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md transition">+
        Tambah</button>
    </div>

    <!-- Tabel Daftar Pengguna -->
    <table class="w-full border border-gray-200 rounded-md overflow-hidden">
      <thead class="bg-gray-100">
        <tr>
          <th class="text-left px-4 py-2 border-b">Nama</th>
          <th class="text-left px-4 py-2 border-b">Email</th>
          <th class="text-center px-4 py-2 border-b w-32">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border-b"><?= htmlspecialchars($user['name']); ?></td>
          <td class="px-4 py-2 border-b"><?= htmlspecialchars($user['email']); ?></td>
          <td class="px-4 py-2 border-b text-center space-x-1">
            <a href="index.php?id=<?= $user['id']; ?>" class="text-blue-500 hover:underline text-sm">Detail</a>
            <button
              onclick="openEditModal(<?= $user['id']; ?>, '<?= htmlspecialchars($user['name']); ?>', '<?= htmlspecialchars($user['email']); ?>')"
              class="text-green-500 hover:underline text-sm">Edit</button>
            <a href="index.php?action=hapus&id=<?= $user['id']; ?>"
              class="text-red-500 hover:underline text-sm">Hapus</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Tambah -->
  <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50 p-4">
    <div class="bg-white p-6 rounded-md w-full max-w-sm">
      <h2 class="text-lg font-semibold mb-4 text-center">Tambah Pengguna</h2>
      <form action="index.php?action=tambah" method="POST" class="flex flex-col gap-3">
        <input type="text" id="name" name="name" placeholder="Nama Lengkap" required
          class="border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-green-400 outline-none" />
        <input type="email" id="email" name="email" placeholder="Email" required
          class="border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-green-400 outline-none" />
        <div class="flex justify-end gap-2 mt-4">
          <button type="button" onclick="closeModal()"
            class="px-4 py-2 rounded-md bg-gray-300 hover:bg-gray-400">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-md bg-green-500 hover:bg-green-600 text-white">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit -->
  <div id="editUserModal" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50 p-4">
    <div class="bg-white p-6 rounded-md w-full max-w-sm">
      <h2 class="text-lg font-semibold mb-4 text-center">Edit Pengguna</h2>
      <form action="index.php?action=ubah" method="POST" class="flex flex-col gap-3">
        <input type="hidden" id="edit_id" name="id">
        <input type="text" id="edit_name" name="name" placeholder="Nama Lengkap" required
          class="border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-green-400 outline-none" />
        <input type="email" id="edit_email" name="email" placeholder="Email" required
          class="border border-gray-300 rounded-md px-3 py-2 focus:ring-1 focus:ring-green-400 outline-none" />
        <div class="flex justify-end gap-2 mt-4">
          <button type="button" onclick="closeEditModal()"
            class="px-4 py-2 rounded-md bg-gray-300 hover:bg-gray-400">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-md bg-green-500 hover:bg-green-600 text-white">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
  function openModal() {
    document.getElementById('addUserModal').classList.remove('hidden');
  }

  function closeModal() {
    document.getElementById('addUserModal').classList.add('hidden');
  }

  function openEditModal(id, name, email) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('editUserModal').classList.remove('hidden');
  }

  function closeEditModal() {
    document.getElementById('editUserModal').classList.add('hidden');
  }
  </script>
</body>

</html>