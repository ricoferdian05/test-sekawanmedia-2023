<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<?= $this->include('templates/admin/navbar') ?>

<div class="container-fluid p-3">
    <div class="row mb-3">
        <div class="col">
            <h2 class="text-center">Form Pemesanan Kendaraan</h2>
        </div>
    </div>
    <?php
    if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php
    } elseif (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php
    }
    ?>
    <hr>
    <div class="row">
        <div class="col">
            <form action="<?= base_url('pemesanan/tambah') ?>" method="post">
                <div class="mb-3 row">
                    <label for="namaPemesan" class="col-sm-2 col-form-label">Nama Pemesan</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_pemesan" class="form-control" id="namaPemesan" placeholder="Masukkan Nama Pemesan">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputKendaraan" class="col-sm-2 col-form-label">Kendaraan</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="kendaraan">
                            <option selected disabled>-- Pilih Kendaraan --</option>
                            <?php
                            for ($i = 0; $i < count($kendaraan); $i++) { ?>
                                <option value="<?= $kendaraan[$i]['kendaraan_id'] ?>"><?= $kendaraan[$i]['nama_kendaraan'] ?> | <?= $kendaraan[$i]['jenis_kendaraan'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputDriver" class="col-sm-2 col-form-label">Driver</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="driver">
                            <option selected disabled>-- Pilih Driver --</option>
                            <?php
                            for ($i = 0; $i < count($driver); $i++) { ?>
                                <option value="<?= $driver[$i]['driver_id'] ?>"><?= $driver[$i]['nama_driver'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputHpPemesan" class="col-sm-2 col-form-label">No Hp Pemesan</label>
                    <div class="col-sm-10">
                        <input type="text" name="hp_pemesan" class="form-control" id="inputHpPemesan" placeholder="contoh : 082123456789">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTanggalPemesanan" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal_pemesanan" class="form-control" id="inputTanggalPemesanan">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTanggalKembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal_kembali" class="form-control" id="inputTanggalKembali">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success w-100">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;
        $('#inputTanggalPemesanan').attr('min', maxDate);
        $('#inputTanggalKembali').attr('min', maxDate);
    });
</script>

<?= $this->endSection() ?>