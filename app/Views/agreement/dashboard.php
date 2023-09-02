<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<?= $this->include('templates/agreement/navbar') ?>

<div class="container-fluid">
    <div class="row rounded-3 shadow m-3 p-3 bg-body-secondary mb-3">
        <div class="col">
            <h4>Grafik Riwayat Pemakaian Kendaraan</h4>
            <hr>
            <div>
                <canvas id="myChart" height="40%"></canvas>
            </div>
        </div>
    </div>
    <div class="row rounded-3 shadow m-3 p-3 bg-body-secondary">
        <div class="col">
            <h4>Riwayat Semua Pesanan</h4>
            <a href="<?= base_url('transaksi/cetak') ?>" class="btn btn-primary" target="_blank"><i class="bi bi-printer"></i> Cetak</a>
            <hr>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 0 + (10 * ($urutan - 1));
                    for ($i = 0; $i < count($pemesanan); $i++) {  ?>
                        <tr>
                            <th class="align-middle" scope="row"><?= $nomor += 1 ?></th>
                            <td class="align-middle"><?= $pemesanan[$i]['kendaraan'] ?></td>
                            <td class="align-middle"><?= $pemesanan[$i]['driver'] ?></td>
                            <td class="align-middle"><?= $pemesanan[$i]['nama_pemesan'] ?></td>
                            <td class="align-middle"><?= $pemesanan[$i]['hp_pemesan'] ?> km/liter</td>
                            <td class="align-middle"><?= date_format(date_create($pemesanan[$i]['tanggal_pemesanan']), 'd-m-Y') ?></td>
                            <td class="align-middle"><?= date_format(date_create($pemesanan[$i]['tanggal_kembali']), 'd-m-Y') ?></td>
                            <td class="align-middle">
                                <?php
                                if ($pemesanan[$i]['status'] === '1') { ?>
                                    <div class="btn btn-outline-danger">Belum Disetujui</div>
                                <?php
                                } elseif ($pemesanan[$i]['status'] === '2') { ?>
                                    <div class="btn btn-outline-warning">Disetujui Level 1</div>
                                <?php
                                } elseif ($pemesanan[$i]['status'] === '3') { ?>
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
            if (count($pemesanan) === 0) {
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

<script>
    const kendaraan = <?= json_encode($kendaraan) ?>;
    const transaksi = <?= json_encode($transaksi) ?>;

    const dataTransaksi = [];
    const labelKendaraan = [];

    kendaraan.forEach(elementKendaraan => {
        labelKendaraan.push(elementKendaraan['nama_kendaraan']);
        for (let index = 0; index < transaksi.length; index++) {
            if (elementKendaraan['kendaraan_id'] === transaksi[index]['kendaraan_id']) {
                dataTransaksi.push(parseInt(transaksi[index]['jumlah']));
                break;
            } else {
                if (index === transaksi.length - 1) {
                    dataTransaksi.push(0);
                }
            }

        }
    });

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelKendaraan,
            datasets: [{
                data: dataTransaksi,
                borderWidth: 1,
                borderRadius: 5,
            }]
        },
        options: {
            scales: {
                x: {
                    grid: {
                        drawOnChartArea: false,
                        display: false,
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1000,
                        color: '#707070',
                    },
                }
            },
            plugins: {
                legend: {
                    labels: {
                        boxWidth: 0,
                    },
                    display: false,
                },
                tooltip: {
                    enabled: true,
                    padding: 7,
                    position: 'nearest',
                    yAlign: 'bottom',
                    usePointStyle: true,
                    footerSpacing: 20,
                    titleAlign: 'center',
                    bodyAlignL: 'center',
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || ' Jumlah : ';
                            label += context.parsed.y;
                            return label;
                        }
                    }
                },
            },
        }
    });
</script>

<?= $this->endSection() ?>