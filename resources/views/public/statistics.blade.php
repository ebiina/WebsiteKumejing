@extends('layouts.public')

@section('content')
<!-- Page Header -->
<section class="relative py-24 text-white bg-village-primary overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/header-bg.jpg') }}" class="w-full h-full object-cover" alt="Header Background">
        <div class="absolute inset-0 bg-village-primary/60"></div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10">
        <h1 class="text-5xl font-bold mb-4">Data Kependudukan</h1>
        <div class="flex justify-center items-center gap-2 text-village-light">
            <a href="{{ route('home') }}" class="hover:text-village-accent">Beranda</a>
            <span>/</span>
            <span class="text-white">Statistik Penduduk</span>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Main Stats Summary -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @foreach($generalData as $stat)
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-200 border-b-8 border-b-village-primary hover:transform hover:-translate-y-2 transition duration-300">
                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">{{ $stat->label }}</div>
                <div class="text-4xl font-medium text-village-primary">{{ number_format($stat->count) }}</div>
            </div>
            @endforeach
            @foreach($familyData as $stat)
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-200 border-b-8 border-b-village-accent hover:transform hover:-translate-y-2 transition duration-300">
                <div class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">{{ $stat->label }}</div>
                <div class="text-4xl font-medium text-village-accent">{{ number_format($stat->count) }}</div>
            </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Gender Chart -->
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-village-light">
                <h2 class="text-2xl font-bold text-village-primary mb-8 border-l-4 border-village-accent pl-6 uppercase" style="padding-left: 1.5rem;">Distribusi Jenis Kelamin</h2>
                <div class="h-80">
                    <canvas id="genderChart"></canvas>
                </div>
                <div class="mt-8 flex flex-col gap-3">
                    @foreach($genderData as $stat)
                    <div class="flex items-center gap-3">
                        <div class="w-4 h-4 rounded-full {{ $stat->label == 'Laki-laki' ? 'bg-blue-500' : 'bg-pink-500' }}"></div>
                        <span class="text-gray-600 font-medium">{{ $stat->label }}: <span class="font-bold text-gray-900">{{ number_format($stat->count) }}</span></span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Age Groups Chart -->
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-village-light">
                <h2 class="text-2xl font-bold text-village-primary mb-8 border-l-4 border-village-accent pl-6 uppercase" style="padding-left: 1.5rem;">Kelompok Umur</h2>
                <div class="h-80">
                    <canvas id="ageChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Household Breakdown Section (Sunburst) -->
        <div class="mt-16">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-village-primary mb-2">Detail Kepala Keluarga</h2>
                <div class="h-1 w-20 bg-village-accent mx-auto"></div>
                <p class="text-gray-500 mt-4">Klik pada bagian grafik untuk melihat detail distribusi kepala keluarga.</p>
            </div>
            
                <div class="bg-white p-10 rounded-3xl shadow-sm border border-village-light mt-10">
                <div id="sunburstChart" style="width: 100%; height: 500px;"></div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts for Charts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
<script>
    // Gender Chart (Chart.js)
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($genderData->pluck('label')) !!},
            datasets: [{
                data: {!! json_encode($genderData->pluck('count')) !!},
                backgroundColor: ['#3B82F6', '#EC4899'],
                borderWidth: 5,
                borderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Age Chart (Chart.js)
    const ageCtx = document.getElementById('ageChart').getContext('2d');
    new Chart(ageCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($ageData->pluck('label')) !!},
            datasets: [{
                label: 'Jumlah Penduduk',
                data: {!! json_encode($ageData->pluck('count')) !!},
                backgroundColor: '#429EBD',
                borderRadius: 10,
                barThickness: 30
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Household Sunburst Chart (ECharts)
    const sunburstDom = document.getElementById('sunburstChart');
    const sunburstChart = echarts.init(sunburstDom);
    
    @php
        $totalKKCount = $generalData->where('label', 'Total Kepala Keluarga')->first()?->count ?? 0;
        $kkMale = $familyData->where('label', 'Kepala Keluarga Laki-laki')->first()?->count ?? 0;
        $kkFemale = $familyData->where('label', 'Kepala Keluarga Perempuan')->first()?->count ?? 0;
    @endphp

    const sunburstData = [{
        name: 'Total\nKepala Keluarga',
        value: {{ $totalKKCount }},
        itemStyle: { color: '#053F5C' },
        label: { fontWeight: 'normal' },
        children: [
            {
                name: 'Laki-laki',
                value: {{ $kkMale }},
                itemStyle: { color: '#3B82F6' }
            },
            {
                name: 'Perempuan',
                value: {{ $kkFemale }},
                itemStyle: { color: '#EC4899' }
            }
        ]
    }];

    const sunburstOption = {
        tooltip: {
            trigger: 'item',
            formatter: '{b}: <b>{c} Keluarga</b>'
        },
        series: {
            type: 'sunburst',
            data: sunburstData,
            radius: [0, '90%'],
            sort: null,
            emphasis: {
                focus: 'ancestor'
            },
            levels: [
                {},
                {
                    r0: '0%',
                    r: '45%',
                    itemStyle: {
                        borderWidth: 2
                    },
                    label: {
                        rotate: 'tangential',
                        fontSize: 14,
                        color: '#fff',
                        fontWeight: 'normal'
                    }
                },
                {
                    r0: '45%',
                    r: '85%',
                    label: {
                        fontSize: 13,
                        color: '#fff',
                        fontWeight: 'normal',
                        minAngle: 5
                    }
                }
            ]
        }
    };

    sunburstChart.setOption(sunburstOption);

    // Resize chart on window resize
    window.addEventListener('resize', function() {
        sunburstChart.resize();
    });
</script>
@endsection
