<x-app-layout>
    <div class="flex flex-col gap-6 p-6 rounded-xl bg-white mt-6">
        <div class="self-end">
            <button class="bg-[#12A2BD] hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
                <a href="/trafo">
                    Turn on Status View
                </a>
            </button>
        </div>
        <div id="map" class=" rounded-xl h-[500px] shadow-lg"></div>
    </div>

    {{-- Leaflet Script Set --}}
    <script>
        var map = L.map('map', {
            maxZoom: 20,
            minZoom: 6,
            zoomControl: false
        }).setView([-6.9861,107.6049], 13);
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([-6.966776, 107.656769]).addTo(map);
        marker.openPopup().bindPopup(`
            Trafo ID    : 1101<br>
            City        : CIPAGALO<br>
            Lat         : -6.966776<br>
            Long        : 107.656769<br>
            Status      : Error<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);

        var marker = L.marker([-6.962190, 107.572324]).addTo(map);
        marker.openPopup().bindPopup(`
            Trafo ID    : 1102<br>
            City        : MARGAHAYU<br>
            Lat         : -6.962190<br>
            Long        : 107.572324<br>
            Status      : Error<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-6.977094, 107.612429]).addTo(map);
        marker.openPopup().bindPopup(`
            Trafo ID    : 1103<br>
            City        : DAYEUHKOLOT<br>
            Lat         : -6.977094<br>
            Long        : 107.612429<br>
            Status      : Error<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-6.9922,107.5457]).addTo(map);
        marker.openPopup().bindPopup(`
            Trafo ID    : 1104<br>
            City        : KOPO<br>
            Lat         : -6.9922<br>
            Long        : 107.5457<br>
            Status      : Error<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-7.0116,107.5905]).addTo(map);
        marker.openPopup().bindPopup(`
            Trafo ID    : 1105<br>
            City        : SUKASARI<br>
            Lat         : -7.0116<br>
            Long        : 107.5905<br>
            Status      : Error<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
        var marker = L.marker([-7.0106,107.6640]).addTo(map);
        marker.openPopup().bindPopup(`
            Trafo ID    : 1106<br>
            City        : BOJONGSARI<br>
            Lat         : -7.0106<br>
            Long        : 107.6640<br>
            Status      : Error<br>
            <br>
            <a href="/trafo/view-performance">View Data</a>
        `);
    </script>
    
</x-app-layout>