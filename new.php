<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_kampus";

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel mahasiswa
$sql = "SELECT * FROM mahasiswa";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['nama']}</td>
                      </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data mahasiswa</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Tutup koneksi
$conn->close();
?>