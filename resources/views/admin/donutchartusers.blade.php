{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .chart-container {
        position: relative;
        margin: auto;
        height: 300px; /* Kichikroq balandlik */
        width: 300px; /* Kichikroq kenglik */
    }
</style>
<section class="content>">
<div class="row">
    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header" >
              <h3 class="box-title">Foydalanuvchilar statistikasi</h3>
            </div>

            <div class="box-body" >
                
                    <canvas id="donutChart" width="400" height="200" ></canvas>
                
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <div class="col-md-6">
        <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Eng ko'p qabulga ega shifokorlar</h3>
            </div>

            <div class="box-body" >
                <canvas id="periodChart" width="400" height="200"></canvas>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('donutChart').getContext('2d');
       
        var labels = {!! json_encode($labels) !!}; // role_id lar
        var data = {!! json_encode($data) !!}; // har bir role_id bo'yicha sonlar
        
        var donutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Foydalanuvchilar Rollari',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Aspect ratio saqlanmaydi
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom', // Legend pastda ko'rsatiladi
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    });
    const topUsers = @json($topUsers); // PHP dan JavaScript ga ma'lumotlarni o'tkazish

        const labels = topUsers.map(user => user.name);
        const counts = topUsers.map(user => user.periods_count);

        // Barchart yaratish
        const ctx = document.getElementById('periodChart').getContext('2d');
        const periodChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Qabullar soni',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    hoverBackgroundColor: 'rgba(75, 192, 192, 0.8)',
                    hoverBorderColor: 'rgba(75, 192, 192, 1)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: '',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: '#333'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Qabullar soni',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: '#333'
                        },
                        ticks: {
                            color: '#333',
                            beginAtZero: true
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#333',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
</script>
<style>
   
    canvas {
        padding: 10px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 5px;
    }
   
</style>