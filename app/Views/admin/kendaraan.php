<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<?= $this->include('templates/admin/navbar') ?>

<div class="container-fluid p-3">
    <div class="row mb-3">
        <div class="col">
            <h2>Data Kendaraan</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Plat Nomor</th>
                        <th scope="col">Jenis Kendaraan</th>
                        <th scope="col">Nama Kendaraan</th>
                        <th scope="col">Konsumsi BBM (km/l)</th>
                        <th scope="col">Jadwal Service</th>
                        <th scope="col">Pemilik</th>
                        <th scope="col">Gambar Kendaraan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 0 + (10 * ($urutan - 1));
                    for ($i = 0; $i < count($kendaraan); $i++) {  ?>
                        <tr>
                            <th class="align-middle" scope="row"><?= $nomor += 1 ?></th>
                            <td class="align-middle"><?= $kendaraan[$i]['plat_nomor'] ?></td>
                            <td class="align-middle"><?= $kendaraan[$i]['jenis_kendaraan'] ?></td>
                            <td class="align-middle"><?= $kendaraan[$i]['nama_kendaraan'] ?></td>
                            <td class="align-middle"><?= $kendaraan[$i]['bbm'] ?> km/liter</td>
                            <td class="align-middle"><?= date_format(date_create($kendaraan[$i]['jadwal_service']), 'd-m-Y') ?></td>
                            <td class="align-middle"><?= $kendaraan[$i]['pemilik'] ?></td>
                            <td class="align-middle"><img class="rounded-3" src="<?= base_url($kendaraan[$i]['gambar_kendaraan']) ?>" alt="gambar_kendaraan" width="150"></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (count($kendaraan) === 0) {
                echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
            }
            ?>
            <!-- ANCHOR PAGINATION -->
            <div class="row">
                <div class="col mt-2">
                    <?= $pager->links('kendaraan', 'custom_pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>