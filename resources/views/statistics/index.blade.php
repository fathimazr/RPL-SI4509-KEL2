<x-app-layout>
    <div class="w-full flex flex-col gap-10 p-10 mb-10">
        <div class="flex justify-between mx-10 gap-7">

            <div class="w-full p-10 bg-gradient-to-r from-cyan-500 to-blue-500 items-center rounded-3xl shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font-bold tracking-tight text-white">Alerting</h1>
                    <h1 class="text-[50px] font-bold tracking-tight text-white">{{ $alertingCount }}</h1>                </div>
                
                <div class="">
                    <img src="/images/info.png" alt="">
                </div>
                
            </div>

            <div class="w-full p-10 bg-gradient-to-r from-cyan-500 to-blue-500 items-center rounded-3xl shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font-bold tracking-tight text-white">Maintenance</h1>
                    <h1 class="text-[50px] font-bold tracking-tight text-white">{{ $maintenanceCount }}</h1>                </div>
                
                <div class="">
                    <img src="/images/antenna.png" alt="">
                </div>
                
            </div>

            <div class="w-full p-10 bg-gradient-to-r from-cyan-500 to-blue-500 items-center rounded-3xl shadow-lg shadow-blue-400 flex justify-between">
                
                <div class="flex flex-col gap-5">
                    <h1 class="text-2xl font-bold tracking-tight text-white">Maintenance <br> Punctuality</h1>
                    <h1 class="text-[50px] font-bold tracking-tight text-white">{{ number_format($maintenancePunctuality, 2) }}%</h1>
                </div>
                
                <div class="">
                    <img src="images/notes.png" alt="">
                </div>
                
            </div>
        </div>

        <div class="flex items-center justify-center gap-40 mx-10 mt-10">
            <div class="flex flex-col gap-10 w-[400px]">
            <!-- <a href="{{ route('statistics.index', ['maintenance' => true]) }}">Maintenance</a> -->

                <a href="/stats" class="bg-[#12A2BD] hover:bg-[#15677B] focus:bg-[#15677B] shadow-xl text-white font-bold py-2 px-4 rounded-3xl text-center">
                    <button class="text-white text-xl font-bold py-2 px-4 rounded">
                        Alerting
                    </button>
                </a>

                <a href="{{ route('statistics.maintanance', ['maintenance' => true]) }}" class="bg-[#12A2BD] hover:bg-[#15677B] focus:bg-[#15677B] shadow-xl text-white font-bold py-2 px-4 rounded-3xl text-center">
                    <button class="text-white text-xl font-bold py-2 px-4 rounded">
                        Maintenance
                    </button>
                </a>

                <a href="/mp" class="bg-[#12A2BD] hover:bg-[#15677B] focus:bg-[#15677B] shadow-xl text-white font-bold py-2 px-4 rounded-3xl text-center">
                    <button class="text-white text-xl font-bold py-2 px-4 rounded">
                        Maintenance Punctuality
                    </button>
                </a>
            </div>

            <div class="w-[700px] rounded-xl">
                
                <div class=" bg-gradient-to-b from-[#39e1ff] to-white rounded-xl shadow-lg shadow-cyan-100 p-10 pb-4">
                    <div class="flex justify-between pb-4 mb-4 items-center">
                        <div class="flex items-center pt-2">
                            <h1 class="leading-none text-2xl font-extrabold">Alerting Growth</h1>
                        </div>
                        <div class="flex gap-3">
                            
                                <button id="monthly-button" class="bg-[#12A2BD] hover:bg-[#15677B] text-white font-bold py-1 px-3 rounded-full text-center">
                                    Monthly
                                </button>
                            

                            
                                <button id="weekly-button" class="bg-[#12A2BD] hover:bg-[#15677B] text-white font-bold py-1 px-3 rounded-full text-cente">
                                    Weekly
                                </button>
                            
                        </div>    
                    </div>

                    <div id="column-chart"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data untuk Monthly
        const monthlyData = <?php echo json_encode($monthlyDataAlerting); ?>;

        // Data untuk Weekly
        const weeklyData = <?php echo json_encode($weeklyDataAlerting); ?>;
        // 
        //     { x: "Week 1", y: 30 },
        //     { x: "Week 2", y: 40 },
        //     { x: "Week 3", y: 35 },
        //     { x: "Week 4", y: 50 },
            
        // ];

        const options = {
            colors: ["#12A2BD", "#7EAEBC"],
            series: [{
                name: "Amount",
                data: monthlyData,
            }],
            chart: {
                type: "bar",
                height: "320px",
                fontFamily: "Inter, sans-serif",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "70%",
                    borderRadiusApplication: "end",
                    borderRadius: 8,
                    distributed: true,
                },
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            states: {
                hover: {
                    filter: {
                        type: "darken",
                        value: 1,
                    },
                },
            },
            stroke: {
                show: true,
                width: 0,
                colors: ["transparent"],
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -14
                },
            },
            dataLabels: {
                enabled: false,
            },
            legend: {
                show: false,
            },
            xaxis: {
                floating: false,
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
            
        };

        const chart = new ApexCharts(document.getElementById("column-chart"), options);
        chart.render();

        // Fungsi untuk memperbarui data chart
        function updateChartData(data) {
            chart.updateSeries([{
                name: 'Amount',
                data: data,
            }]);
        }

        // Event listeners untuk tombol
        document.getElementById('weekly-button').addEventListener('click', function() {
            updateChartData(weeklyData);
        });

        document.getElementById('monthly-button').addEventListener('click', function() {
            updateChartData(monthlyData);
        });
    </script>
</x-app-layout>