<?php
include("koneksi.php");
require 'header.php';

// Query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>


<body>
    <div class="tabel-container">
        <h1>Data Barang</h1>

        <div class="tabel">
            <table>
                <tr>
                    <th>Label</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if ($result) : ?>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td><img src="gambar/<?php echo $row["gambar"]; ?>" alt="<?php echo $row["nama"]; ?> "></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["kategori"]; ?></td>
                            <td><?= $row["harga_beli"]; ?></td>
                            <td><?= $row["harga_jual"]; ?></td>
                            <td><?= $row["stok"]; ?></td>
                            <td>
                                <a href="ubah.php?id_barang=<?= $row["id_barang"]; ?> " width="50">Ubah</a>
                                <span>|</span>
                                <a href="hapus.php?id_barang=<?= $row["id_barang"]; ?>" onclick="return confirm('yakin ingin menghapus data?')" ;>Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        <a href="tambah.php" class="tambah">Tambah Barang</a>
    </div>
    <?php require 'footer.php' ?>