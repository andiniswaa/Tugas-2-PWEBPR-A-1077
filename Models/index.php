<?php
require_once 'database.php';
require_once 'models.php';

$database = new Database();
$db = $database->getConnection();

$cat = new Cat($db);
$cats = $cat->readAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Halaman Utama</title>
</head>
<body>
    <div class="container mx-auto p-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Warna</th>
                    <th class="border px-4 py-2">Ras</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $cats->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['color']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['breed']); ?></td>
                    <td class="border px-4 py-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
