<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bus_ticket_db");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    // Validasi input
    if (!isset($data['nama'], $data['harga'], $data['deskripsi'], $data['jadwal'])) {
        return 0; // Gagal jika input tidak lengkap
    }

    // Escape data untuk menghindari SQL Injection
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $jadwal = htmlspecialchars($data["jadwal"]);

    // Query insert data
    $query = "INSERT INTO produk (nama, harga, deskripsi, jadwal) 
              VALUES ('$nama', '$harga', '$deskripsi', '$jadwal')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    // Ambil data dari form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $jadwal = htmlspecialchars($data["jadwal"]);

    // Query update data
    $query = "UPDATE produk SET 
              nama = '$nama', harga = '$harga', deskripsi = '$deskripsi', jadwal = '$jadwal' 
              WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
