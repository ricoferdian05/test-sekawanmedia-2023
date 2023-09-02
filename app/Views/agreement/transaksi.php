<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>
<?= $this->include('templates/agreement/navbar') ?>

<div class="container-fluid p-3">
    <div class="row mb-3">
        <div class="col">
            <h2>Riwayat Pemesanan</h2>
        </div>
    </div>
    <?php
    if (session()->getFlashdata('success_setuju')) { ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success_setuju') ?>
        </div>
    <?php
    } elseif (session()->getFlashdata('success_tolak')) { ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('success_tolak') ?>
        </div>
    <?php
    }
    ?>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kendaraan</th>
                        <th scope="col">Driver</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">No Hp Pemesan</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
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
                            <td class="align-middle"><?= $transaksi[$i]['hp_pemesan'] ?></td>
                            <td class="align-middle"><?= date_format(date_create($transaksi[$i]['tanggal_pemesanan']), 'd-m-Y') ?></td>
                            <td class="align-middle"><?= date_format(date_create($transaksi[$i]['tanggal_kembali']), 'd-m-Y') ?></td>
                            <td class="align-middle">
                                <?php
                                if ($transaksi[$i]['status'] === '1') { ?>
                                    <div href="<?= base_url('transaksi/update/' . $transaksi[$i]['transaksi_id']) ?>" class="btn btn-outline-danger">Belum Disetujui</div>
                                <?php
                                } elseif ($transaksi[$i]['status'] === '2') { ?>
                                    <div class="btn btn-outline-warning">Disetujui Level 1</div>
                                <?php
                                } elseif ($transaksi[$i]['status'] === '3') { ?>
                                    <div class="btn btn-outline-success">Selesai</div>
                                <?php
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <a href="<?= base_url('transaksi/setuju/' . $transaksi[$i]['transaksi_id']) ?>" class="btn btn-success">Setujui</a>
                                <a href="<?= base_url('transaksi/tolak/' . $transaksi[$i]['transaksi_id']) ?>" class="btn btn-danger">Ditolak</a>
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
                    <?= $pager->links('pemesanan', 'custom_pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>