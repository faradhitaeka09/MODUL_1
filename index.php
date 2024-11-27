<?php  
require 'function.php'; 
$produk = query("SELECT * FROM produk");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Bus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            background-color: #444;
            padding: 10px 0;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
        }
        nav a:hover {
            color: #ffd700;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #333;
            color: #fff;
        }
        table td {
            background-color: #f9f9f9;
        }
        table tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        .showcase {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 40px;
        }
        .showcase-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            margin-bottom: 20px;
        }
        .showcase-item h3 {
            color: #333;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .showcase-item p {
            font-size: 16px;
            color: #555;
        }
        .showcase-item .btn {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .showcase-item .btn:hover {
            background-color: #ffd700;
        }
        .btn-add {
            display: inline-block;
            margin-top: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-add:hover {
            background-color: #ffd700;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            text-align: center;
        }
        .modal-content button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }
        .modal-content button:hover {
            background-color: #ffd700;
        }
    </style>
</head>
<body>

<header>
    <h1>Pemesanan Tiket Bus</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="showcase.php">Jadwal Tiket Bus</a>
    <a href="tambah.php">Tambah Produk</a>
</nav>

<div class="container">
    <h1>Daftar Produk Tiket Bus</h1>

    <a href="tambah.php" class="btn-add">Tambah Produk</a>

    <table>
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Jadwal</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($produk as $row) : ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><a href="ubah.php?id=<?= $row["id"] ?>">Ubah</a> |
                <a href="javascript:void(0)" onclick="confirmDelete(<?= $row["id"] ?>)">Hapus</a>
            </td>
            <td><?php echo $row["nama"] ?></td>
            <td><?php echo $row["harga"] ?></td>
            <td><?php echo $row["deskripsi"] ?></td>
            <td><?php echo $row["jadwal"] ?></td>
        </tr>
        <?php $i++ ?>
        <?php endforeach; ?>
    </table>

</div>

<!-- Modal for confirmation -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3>Apakah Anda yakin ingin menghapus produk ini?</h3>
        <button onclick="deleteProduct()">Ya, Hapus</button>
        <button onclick="closeModal()">Tidak</button>
    </div>
</div>

<script>
    let productIdToDelete = null;

    function confirmDelete(productId) {
        productIdToDelete = productId;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('deleteModal').style.display = 'none';
    }

    function deleteProduct() {
        if (productIdToDelete) {
            window.location.href = `hapus.php?id=${productIdToDelete}`;
        }
    }
</script>

</body>
</html>
