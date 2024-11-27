<?php
require 'function.php';
$produk = query("SELECT * FROM produk");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showcase Jadwal Tiket Bus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav {
            background-color: #444;
            padding: 12px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #ffd700;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            justify-items: center;
            margin-top: 30px;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .card .price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .card .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .card .btn:hover {
            background-color: #ffd700;
        }
    </style>
</head>

<body>

    <header>
        <h1>Showcase Jadwal Tiket Bus</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="showcase.php">Jadwal Tiket Bus</a>
        <a href="tambah.php">Tambah Produk</a>
    </nav>

    <div class="container">
        <h1>Jadwal Tiket Bus</h1>

        <div class="card-container">
            <?php foreach ($produk as $row) : ?>
                <div class="card">
                    <h3><?php echo $row["nama"]; ?></h3>
                    <p><strong>Deskripsi:</strong> <?php echo $row["deskripsi"]; ?></p>
                    <p><strong>Jadwal:</strong> <?php echo $row["jadwal"]; ?></p>
                    <p class="price">Harga: Rp <?php echo number_format($row["harga"], 0, ',', '.'); ?></p>
                    <a href="" class="btn">Pesan Tiket</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>