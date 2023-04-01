<?php 
include ("koneksi.php");

// Query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        table, td, th{
            border: 1px solid;
            padding: 5px;
        }
        table {
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <a href="tambah.php">Tambah Barang</a>
        <br><br>
        <div class="main">
            <table  >
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if($result) : ?>
                    <?php while ($row = mysqli_fetch_array ($result)) : ?>
                        <tr>
                        <td><img src="gambar/<?php echo $row["gambar"]; ?>" alt="<?php echo $row["nama"]; ?> "></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["kategori"]; ?></td>
                        <td><?= $row["harga_beli"]; ?></td>
                        <td><?= $row["harga_jual"]; ?></td>
                        <td><?= $row["stok"]; ?></td>
                        <td>
                            <a href="ubah.php?id_barang=<?= $row["id_barang"]; ?> " width="50">Ubah | </a>
                            <a href="hapus.php?id_barang=<?= $row["id_barang"]; ?>" onclick="return confirm('yakin ingin menghapus data?')";>Hapus</a>
                        </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr>
                            <td colspan="7">Belum ada data</td>
                        </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>