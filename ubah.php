<?php  
require 'function.php';
$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (update($_POST) > 0) {
        $message = "Data berhasil diubah"; // Success message
    } else {
        $message = "Data gagal diubah"; // Failure message
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Produk Tiket Bus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"], textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ffd700;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
            text-decoration: none;
        }

        a:hover {
            color: #ffd700;
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
                margin: 20px auto;
            }

            input[type="text"], textarea {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }
        }

        .alert {
            padding: 20px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            color: #fff;
        }

        .success {
            background-color: #4CAF50;
        }

        .error {
            background-color: #f44336;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Ubah Produk Tiket Bus</h2>

    <?php if (isset($message)) : ?>
        <div class="alert <?php echo strpos($message, 'berhasil') !== false ? 'success' : 'error'; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $produk["id"] ?>">
        
        <label for="nama">Nama Produk:</label>
        <input type="text" id="nama" name="nama" value="<?= $produk["nama"] ?>" required>

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" value="<?= $produk["harga"] ?>" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required><?= $produk["deskripsi"] ?></textarea>

        <label for="jadwal">Jadwal:</label>
        <input type="text" id="jadwal" name="jadwal" value="<?= $produk["jadwal"] ?>" required>

        <input type="submit" name="submit" value="Ubah Produk">
    </form>
    
    <a href="index.php">Kembali</a>
</div>

<script>
    // Menunggu hingga form selesai diproses
    <?php if (isset($message)) : ?>
        setTimeout(function() {
            // Pesan hilang setelah 3 detik
            document.querySelector('.alert').style.display = 'none';
        }, 3000);
    <?php endif; ?>
</script>

</body>
</html>
