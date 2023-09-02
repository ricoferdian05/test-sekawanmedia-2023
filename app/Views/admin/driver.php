<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<?= $this->include('templates/admin/navbar') ?>

<div class="container-fluid p-3">
    <div class="row mb-3">
        <div class="col">
            <h2>Data Driver</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Driver</th>
                        <th scope="col">Nomor Hp Driver</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 0 + (10 * ($urutan - 1));
                    for ($i = 0; $i < count($driver); $i++) {  ?>
                        <tr>
                            <th class="align-middle" scope="row"><?= $nomor += 1 ?></th>
                            <td class="align-middle"><?= $driver[$i]['nama_driver'] ?></td>
                            <td class="align-middle"><?= $driver[$i]['hp_driver'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (count($driver) === 0) {
                echo "<div class='alert alert-danger alert-data-kosong text-center' role='alert'>Data Tidak Ditemukan !!!</div>";
            }
            ?>
            <!-- ANCHOR PAGINATION -->
            <div class="row">
                <div class="col mt-2">
                    <?= $pager->links('driver', 'custom_pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>