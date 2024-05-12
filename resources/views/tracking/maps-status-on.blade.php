<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="self-end">
            <button class="bg-[#12A2BD] hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                <a href="/maps">
                    Turn off Status View
                </a>
            </button>
        </div>
        <div id="map" class="rounded-xl h-[500px] shadow-lg"></div>
    </div>

    {{-- Leaflet Script Set --}}
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

    @foreach ($data_trafo as $dt)
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
    @endforeach
</script>

</x-app-layout>
