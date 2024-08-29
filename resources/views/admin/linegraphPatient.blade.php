{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<section class="content>">
<div class="row">
    <div class="col-md-6">
        <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Oxirgi 1 haftadagi bemorlar qo'shilish statistikasi</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="patientsChartWeek" width="400" height="200"></canvas>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box box-info">
                    <div class="box-header">
                      <h3 class="box-title">Ushbu yilda bemorlar qo'shilish statistikasi</h3>
                    </div>
                    <div class="box-body">
                        <canvas id="patientsChartYear" width="400" height="200"></canvas>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
    </div>
</div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Haftalik chart
        var chartDataWeek = {!! json_encode($chartDataWeek) !!};
        var daysWeek = chartDataWeek.map(function(e) {
            return e.day;
        });
        var countsWeek = chartDataWeek.map(function(e) {
            return e.count;
        });

        var ctxWeek = document.getElementById('patientsChartWeek').getContext('2d');
        var patientsChartWeek = new Chart(ctxWeek, {
            type: 'line',
            data: {
                labels: daysWeek,
                datasets: [{
                    label: 'Qo\'shilgan bemorlar (Hafta)',
                    data: countsWeek,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Bemorlar soni'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Hafta kunlari'
                        }
                    }
                }
            }
        });

        // Yillik chart
        var chartDataYear = {!! json_encode($chartDataYear) !!};
        var monthsYear = chartDataYear.map(function(e) {
            return e.month;
        });
        var countsYear = chartDataYear.map(function(e) {
            return e.count;
        });

        var ctxYear = document.getElementById('patientsChartYear').getContext('2d');
        var patientsChartYear = new Chart(ctxYear, {
            type: 'line',
            data: {
                labels: monthsYear,
                datasets: [{
                    label: 'Qo\'shilgan bemorlar (Yil)',
                    data: countsYear,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Bemorlar soni'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Oylar'
                        }
                    }
                }
            }
        });
    });
</script>