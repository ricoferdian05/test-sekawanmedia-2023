<?php
$file_name = 'riwayat-pemakaian-kendaraan.xls';

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$file_name}");
?>

<center>
    <h1>Rekapan Riwayat Pemakaian Kendaraan</h1>
</center>

<div class="row mt-3">
    <div class="col">
        <table class="table table-transaksi caption-top" border="1" cellpadding="5">
            <thead class="border-bottom">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Transaksi</th>
                    <th scope="col">ID Kendaraan</th>
                    <th scope="col">Nama Kendaraan</th>
                    <th scope="col">ID Driver</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">No Hp Pemesan</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalProfit = 0;
                if (count($transaksi) > 0) {
                    $nomor = 0;
                    for ($i = 0; $i < count($transaksi); $i++) { ?>
                        <tr>
                            <th><?= $nomor += 1; ?></th>
                            <td><?= $transaksi[$i]['transaksi_id']; ?></td>
                            <td><?= $transaksi[$i]['kendaraan_id']; ?></td>
                            <td><?= $transaksi[$i]['kendaraan']; ?></td>
                            <td><?= $transaksi[$i]['driver_id']; ?></td>
                            <td><?= $transaksi[$i]['driver']; ?></td>
                            <td><?= $transaksi[$i]['nama_pemesan']; ?></td>
                            <td><?= $transaksi[$i]['hp_pemesan']; ?></td>
                            <td><?= $transaksi[$i]['tanggal_pemesanan']; ?></td>
                            <td><?= $transaksi[$i]['tanggal_kembali']; ?></td>
                            <td><?= $transaksi[$i]['status']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        if (count($transaksi) === 0) {
            echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
        }
        ?>
    </div>
</div>