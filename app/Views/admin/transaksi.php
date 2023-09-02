<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<?= $this->include('templates/admin/navbar') ?>

<div class="container-fluid p-3">
    <div class="row mb-3">
        <div class="col">
            <h2>Riwayat Pemesanan</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kendaraan</th>
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
                    $nomor = 0 + (10 * ($urutan - 1));
                    for ($i = 0; $i < count($transaksi); $i++) {  ?>
                        <tr>
                            <th class="align-middle" scope="row"><?= $nomor += 1 ?></th>
                            <td class="align-middle"><?= $transaksi[$i]['kendaraan'] ?></td>
                            <td class="align-middle"><?= $transaksi[$i]['driver'] ?></td>
                            <td class="align-middle"><?= $transaksi[$i]['nama_pemesan'] ?></td>
                            <td class="align-middle"><?= $transaksi[$i]['hp_pemesan'] ?> km/liter</td>
                            <td class="align-middle"><?= date_format(date_create($transaksi[$i]['tanggal_pemesanan']), 'd-m-Y') ?></td>
                            <td class="align-middle"><?= date_format(date_create($transaksi[$i]['tanggal_kembali']), 'd-m-Y') ?></td>
                            <td class="align-middle">
                                <?php
                                if ($transaksi[$i]['status'] === '0') { ?>
                                    <div class="btn btn-outline-danger">Belum Disetujui</div>
                                <?php
                                } elseif ($transaksi[$i]['status'] === '1') { ?>
                                    <div class="btn btn-outline-warning">Disetujui Level 1</div>
                                <?php
                                } elseif ($transaksi[$i]['status'] === '2') { ?>
                                    <div class="btn btn-outline-success">Selesai</div>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (count($transaksi) === 0) {
                echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
            }
            ?>
            <!-- ANCHOR PAGINATION -->
            <div class="row">
                <div class="col mt-2">
                    <?= $pager->links('transaksi', 'custom_pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>