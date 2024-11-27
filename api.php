<?php
require 'function.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Methods, Authorization");

// Ambil metode request
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            // Ambil data produk berdasarkan ID
            $id = intval($_GET['id']);
            $result = query("SELECT * FROM produk WHERE id = $id");
        } else {
            // Ambil semua data produk
            $result = query("SELECT * FROM produk");
        }
        echo json_encode($result);
        break;

    case 'POST':
        // Ambil data dari body (dalam format JSON atau form)
        $data = json_decode(file_get_contents("php://input"), true);
        
        // Cek apakah data dikirim via URL parameters atau JSON body
        if (!$data) {
            $data = [
                "nama" => $_POST['nama'] ?? null,
                "harga" => $_POST['harga'] ?? null,
                "deskripsi" => $_POST['deskripsi'] ?? null,
                "jadwal" => $_POST['jadwal'] ?? null
            ];
        }
        
        // Validasi input
        if (!isset($data['nama'], $data['harga'], $data['deskripsi'], $data['jadwal'])) {
            echo json_encode([
                "message" => "Input tidak lengkap. Pastikan 'nama', 'harga', 'deskripsi', dan 'jadwal' dikirim."
            ]);
            exit;
        }
        
        // Proses penambahan data
        if (tambah($data) > 0) {
            echo json_encode(["message" => "Produk berhasil ditambahkan"]);
        } else {
            echo json_encode(["message" => "Gagal menambahkan produk"]);
        }
        break;

    case 'PUT':
        // Ambil data dari body
        $data = json_decode(file_get_contents("php://input"), true);
        if (update($data) > 0) {
            echo json_encode(["message" => "Produk berhasil diperbarui"]);
        } else {
            echo json_encode(["message" => "Gagal memperbarui produk"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            if (hapus($id) > 0) {
                echo json_encode(["message" => "Produk berhasil dihapus"]);
            } else {
                echo json_encode(["message" => "Gagal menghapus produk"]);
            }
        } else {
            echo json_encode(["message" => "ID tidak ditemukan"]);
        }
        break;

    default:
        echo json_encode(["message" => "Metode tidak diizinkan"]);
        break;
}
?>
