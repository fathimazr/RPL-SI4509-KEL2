<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="flex h-full items-center justify-between">
            <form id="search-form" class="w-[500px] rounded-full">   
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search-input" class="rounded-full block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Area" required />
                </div>
            </form>
            <button class="bg-[#12A2BD] hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                <a href="/maps">
                    Turn off Status View
                </a>
            </button>
        </div>
        <div id="map" class="rounded-xl h-[500px] shadow-lg"></div>
    </div>

    {{-- Leaflet Script Set --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/bundle.min.js"></script>
    <script>
        var map = L.map('map', {
            maxZoom: 20,
            minZoom: 6,
            zoomControl: false
        }).setView([-7.0610, 107.5000], 12);

        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const provider = new GeoSearch.OpenStreetMapProvider();

        const searchControl = new GeoSearch.GeoSearchControl({
            provider: provider,
            style: 'bar',
            autoComplete: true,
            autoCompleteDelay: 250,
        });

        // Add the GeoSearch control to the map
        map.addControl(searchControl);

        // Listen for the search event
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const query = document.getElementById('search-input').value;
            provider.search({ query: query }).then(function(result) {
                if (result && result.length > 0) {
                    const { x, y } = result[0].bounds[0];
                    map.setView([y, x], 10);
                }
            });
        });
    </script>

    @foreach ($data_trafo as $dt)
    <script>
        var marker = L.marker([{{ $dt->latitude }}, {{ $dt->longitude }}]).addTo(map);

        // pewarnaan marker berdasarkan kondisi trafo
        @if($latestPerformance = $dt->trafo_performance()->latest()->first())
        @if($latestPerformance->status == 'Normal')
            marker._icon.classList.add("greenchange");
        @elseif($latestPerformance->status == 'Warning')
            marker._icon.classList.add("yellowchange");
        @elseif($latestPerformance->status == 'Error')
            marker._icon.classList.add("redchange");
        @elseif($latestPerformance->status == '')
            marker._icon.classList.add("bluechange");
        @endif
        @endif
        marker.bindPopup(`
            Trafo ID    : {{ $dt->trafo_id }}<br>
            City        : {{ $dt->city }}<br>
            Lat         : {{ $dt->latitude }}<br>
            Long        : {{ $dt->longitude }}<br>
            Status      : {{$dt->trafo_performance()->latest()->first()->status ?? 'N/A' }}<br>
            <br>
            <a href="/trafo/{{$dt->id}}">View Data</a>
        `);
    </script>
    @endforeach

</x-app-layout>
