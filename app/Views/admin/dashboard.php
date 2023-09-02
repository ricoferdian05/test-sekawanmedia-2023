<?= $this->extend('templates/templates') ?>

<?= $this->section('content') ?>

<?= $this->include('templates//admin/navbar') ?>

<div class="container-fluid">
    <div class="row rounded-3 shadow m-3 p-3 bg-body-secondary">
        <div class="col">
            <h4>Grafik Riwayat Pemakaian Kendaraan</h4>
            <hr>
            <div>
                <canvas id="myChart" height="40%"></canvas>
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