<?= $this->extend('component/app') ?>
<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p class="mt-3 text-center">Penjualan | Hari Ini</p>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $infoA = []; // Definisikan variabel $infoA di luar blok if
        $infoB = []; // Definisikan variabel $infoB di luar blok if
        $infoC = []; // Definisikan variabel $infoC di luar blok if

        $hasilA = isset($hasilA) ? $hasilA : [];
        $hasilB = isset($hasilB) ? $hasilB : [];
        $hasilC = isset($hasilC) ? $hasilC : [];

        if (!empty($cekPenjualan1Hari)) :
            foreach ($grafik1hariA as $key => $value) {
                $infoA[] = $value['jammenit'];
                $hasilA[] = $value['jumlah'];
            }
            foreach ($grafik1hariB as $key => $value) {
                $infoB[] = $value['jammenit'];
                $hasilB[] = $value['total'];
            }
            foreach ($grafik1hariC as $key => $value) {
                $infoC[] = $value['nama'];
                $hasilC[] = $value['jumlah'];
            }
        ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Produk Yang Terjual</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="myChart-1hari-A" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <div class="ykiri">
                                <h6>Total Produk Terjual <?= number_format($Qty1hari->jumlah, 0, ',', '.'); ?> Pcs</h6>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Produk Yang Terjual Hari Ini</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="myChart-1hari-C" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Pendapatan</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="myChart-1hari-B" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <div class="ykanan">
                                <h6>Total Pendapatan Rp <?= number_format($Rp1hari->total, 0, ',', '.'); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-info" role="alert">
                Belum ada produk terjual hari ini.
            </div>
        <?php endif; ?>


        <?= $this->section('chartJS') ?>
        <script>
            $(function() {
                /* ChartJS
                 * -------
                 * Here we will create a few charts using ChartJS
                 */

                //----------------------
                //- BAR CHART 1HARI-A -
                //----------------------

                const ctxa1hariA = document.getElementById('myChart-1hari-A');
                new Chart(ctxa1hariA, {
                    type: 'bar',
                    data: {
                        labels: <?= json_encode($infoA); ?>,
                        datasets: [{
                            label: 'Produk Yang Terjual',
                            data: <?= json_encode($hasilA); ?>,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                //----------------------
                //- LINE CHART 1HARI-B -
                //----------------------

                const ctxa1hariB = document.getElementById('myChart-1hari-B');
                new Chart(ctxa1hariB, {
                    type: 'line',
                    data: {
                        labels: <?= json_encode($infoB); ?>,
                        datasets: [{
                            label: 'Pendapatan',
                            data: <?= json_encode($hasilB); ?>,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                //----------------------
                //- PIE CHART 1HARI-C -
                //----------------------

                const ctxa1hariC = document.getElementById('myChart-1hari-C');
                new Chart(ctxa1hariC, {
                    type: 'pie',
                    data: {
                        labels: <?= json_encode($infoC); ?>,
                        datasets: [{
                            label: 'Produk Yang Terjual Hari Ini',
                            data: <?= json_encode($hasilC); ?>,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        </script>
        <?= $this->endSection() ?>
    </div>
</section>
<?= $this->endSection() ?>